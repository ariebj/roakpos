<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use App\Models\Category;
use App\Models\Option;
use App\Models\OrderMethod;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;
    //PRODUCT DATA
    public $name, $category, $option, $order_method, $image, $status, $description, $stock, $price, $product_id;
    public $updateMode = false;
    public $search;

    //UTILITY
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['editProduct', 'createProduct'];

    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->get();
        $options = Option::where('name', 'like', '%' . $this->search . '%')->get();
        $ordermethods = OrderMethod::where('name', 'like', '%' . $this->search . '%')->get();
        $products = ProductModel::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('category', 'like', '%' . $this->search . '%')
            ->orWhere('option', 'like', '%' . $this->search . '%')
            ->orWhere('order_method', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orWhere('price', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('stock', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->get();
        return view('livewire.products', compact('products', 'categories', 'options', 'ordermethods'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->product_id = null;
        $this->name = null;
        $this->category = null;
        $this->option = null;
        $this->order_method = null;
        $this->image = null;
        $this->stock = null;
        $this->price = null;
        $this->status = null;
        $this->description = null;
    }

    public function previewImage()
    {
        $this->validate([
            'image' => 'image|max:2048|required'
        ]);
    }

    public function store()
    {
        $this->validate([
            'image' => 'image|max:2048|required',
            'name' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'option' => 'required|string|max:100',
            'order_method' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required|string|max:50'
        ]);
        $imageName = $this->image->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->image, $imageName);

        ProductModel::create([
            'name' => $this->name,
            'category' => $this->category,
            'option' => $this->option,
            'order_method' => $this->order_method,
            'stock' => $this->stock,
            'price' => $this->price,
            'description' => $this->description,
            'status' => $this->status,
            'image' => $imageName,
        ]);
        session()->flash('message', 'Product Created Successfully.');
        $this->resetInput();
        $this->resetPage();
        return $this->redirectRoute('products');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $product = ProductModel::with('category')->where('id', $id)->first();
        $this->product_id = $id;
        $this->name = $product->name;
        $this->category = $product->category;
        $this->option = $product->option;
        $this->order_method = $product->order_method;
        $this->stock = $product->stock;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->status = $product->status;
    }
    public function deleteProduct($id)
    {
        $product = ProductModel::with('category')->where('id', $id)->first();
        $this->product_id = $id;
        $this->name = $product->name;
        $this->category = $product->category;
        $this->option = $product->option;
        $this->order_method = $product->order_method;
        $this->stock = $product->stock;
        $this->price = $product->price;
        $this->status = $product->status;
        $this->description = $product->description;
    }


    public function editProductImage($id)
    {
        $this->updateMode = true;
        $product = ProductModel::with('category')->where('id', $id)->first();
        $this->product_id = $id;
        $this->image = $product->image;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'option' => 'required|string|max:100',
            'order_method' => 'required|string|max:100',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:50'
        ]);

        if ($this->product_id) {
            $product = ProductModel::find($this->product_id);
            $product->update([
                'name' => $this->name,
                'category' => $this->category,
                'option' => $this->option,
                'order_method' => $this->order_method,
                'stock' => $this->stock,
                'price' => $this->price,
                'description' => htmlspecialchars($this->description, ENT_HTML5),
                'status' => $this->status
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Product Updated Successfully.');
            $this->resetInput();
            return $this->redirectRoute('products');
        }
    }

    public function updateProductImage()
    {
        $this->validate([
            'image' => 'image|max:2048|required',
        ]);

        $imageName = $this->image->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->image, $imageName);

        if ($this->product_id) {
            $product = ProductModel::find($this->product_id);
            $product->update([
                'image' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Image Updated Successfully.');
            $this->resetInput();
            return $this->redirectRoute('products');
        }
    }

    public function delete($id)
    {
        if ($this->product_id) {
            ProductModel::find($this->product_id)->delete();
            session()->flash('message', 'Product Deleted Successfully.');
        }
    }
}
