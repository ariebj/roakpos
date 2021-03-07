<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Option;
use Livewire\WithPagination;

class Options extends Component
{
    use WithPagination;
    public $name, $description, $option_id;
    public $search;
    public $updateMode = false;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $options = Option::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(8);
        return view('livewire.options', compact('options'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->option_id = null;
        $this->name = null;
        $this->description = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Option::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        session()->flash('message', 'Option Created Successfully.');
        $this->resetInput();
        return $this->redirectRoute('options');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $option = Option::where('id', $id)->first();
        $this->option_id = $id;
        $this->name = $option->name;
        $this->description = $option->description;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:50',
            'description' => 'required'
        ]);

        if ($this->option_id) {
            $option = Option::find($this->option_id);
            $option->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Option Updated Successfully.');
            $this->resetInput();
            return $this->redirectRoute('options');
        }
    }

    public function delete($id)
    {
        if ($id) {
            Option::where('id', $id)->delete();
            session()->flash('message', 'Option Deleted Successfully.');
        }
    }
}
