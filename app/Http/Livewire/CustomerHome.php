<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use App\Models\Product as ProductModel;
use App\Models\Transactions;
use App\Models\User;
use App\Models\ProductTransactions;

class CustomerHome extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $clearSearch;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
    }

    public function render()
    {
        $user = Auth::id();
        $transactions = Transactions::with('product')->where('user_id', $user)->where('invoice_number', 'LIKE', '%' . $this->search . '%')->orderBy('invoice_number', 'desc')->get();
        return view('livewire.customer-home', compact('transactions'));
    }
}
