<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderMethod;

class Ordermethods extends Component
{
    public $name, $description, $ordermethod_id;
    public $search;
    public $updateMode = false;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $ordermethods = OrderMethod::where('name', 'like', '%' . $this->search . '%')->orderBy('id')->paginate(8);
        return view('livewire.ordermethods', compact('ordermethods'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->ordermethod_id = null;
        $this->name = null;
        $this->description = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:order_method',
            'description' => 'required|string|max:255',
        ]);

        OrderMethod::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        session()->flash('message', 'Order Method Created Successfully.');
        $this->resetInput();
        return $this->redirectRoute('ordermethods');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $ordermethod = OrderMethod::where('id', $id)->first();
        $this->ordermethod_id = $id;
        $this->name = $ordermethod->name;
        $this->description = $ordermethod->description;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:50',
            'description' => 'required'
        ]);

        if ($this->ordermethod_id) {
            $ordermethod = OrderMethod::find($this->ordermethod_id);
            $ordermethod->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Order Method Updated Successfully.');
            $this->resetInput();
            return $this->redirectRoute('ordermethods');
        }
    }

    public function delete($id)
    {
        if ($id) {
            OrderMethod::where('id', $id)->delete();
            session()->flash('message', 'Order Method Deleted Successfully.');
        }
    }
}
