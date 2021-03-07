<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category as CategoryModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class Category extends Component
{
    use WithPagination;
    use WithFileUploads;
    //CATEGORY DATA
    public $image, $name, $description, $category_id;
    public $search;
    public $updateMode = false;
    //UTILITY
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = CategoryModel::where('name', 'like', '%' . $this->search . '%')->orderBy('id')->get();
        return view('livewire.categories', ['categories' => $categories]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->image = null;
        $this->description = null;
    }

    public function previewImage()
    {
        $this->validate([
            'image' => 'nullable|image|max:2048'
        ]);
    }

    public function store()
    {
        $this->validate([
            'image' => 'nullable|image|max:2048',
            'name' => 'required|string|unique:categories',
            'description' => 'required'
        ]);
        $imageName = $this->image->getClientOriginalName();

        Storage::putFileAs('public/uploads', $this->image, $imageName);

        CategoryModel::create([
            'name' => $this->name,
            'image' => $imageName,
            'description' => $this->description
        ]);
        session()->flash('message', 'Category Created Successfully.');
        $this->dispatchBrowserEvent('categoryStore');
        $this->resetInput();
        return $this->redirectRoute('categories');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $category = CategoryModel::where('id', $id)->first();
        $this->category_id = $id;
        $this->name = $category->name;
        $this->image = $category->image;
        $this->description = $category->description;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:50',
            'description' => 'required'
        ]);

        if ($this->category_id) {
            $category = CategoryModel::find($this->category_id);
            $category->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Category Updated Successfully.');
            $this->resetInput();
            return $this->redirectRoute('categories');
        }
    }

    public function updateCategoryImage()
    {
        $this->validate([
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = $this->image->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->image, $imageName);

        if ($this->category_id) {
            $category = CategoryModel::find($this->category_id);
            $category->update([
                'image' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Image Updated Successfully.');
            $this->resetInput();
            return $this->redirectRoute('categories');
        }
    }

    public function delete($id)
    {
        if ($id) {
            CategoryModel::where('id', $id)->delete();
            session()->flash('message', 'Category Deleted Successfully.');
        }
    }
}
