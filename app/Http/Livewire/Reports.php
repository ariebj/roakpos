<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Address;

class Reports extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    //Transactions
    public $clearSearch;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearchTransactions()
    {
        $this->search = '';
    }

    private function resetInput()
    {
        $this->status = null;
    }

    public function render()
    {
        $address = Address::all();
        $users = User::all();
        $transactions = Transactions::with('user')->where('invoice_number', 'LIKE', '%' . $this->search . '%')
            ->orWhere('status', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.reports')->with([
            'transactions' => $transactions,
            'address' => $address,
            'users' => $users
        ]);
    }

    public function updateStatusOnhold($id)
    {
        if ($id) {
            Transactions::where('id', $id)->update([
                'status' => 'On-Hold'
            ]);
            session()->flash('message', 'Status Transaksi On-Hold');
        }
    }
    public function updateStatusCancelled($id)
    {
        if ($id) {
            Transactions::where('id', $id)->update([
                'status' => 'Cancelled'
            ]);
            session()->flash('message', 'Status Transaksi Cancelled');
        }
    }
    public function updateStatusProcessing($id)
    {
        if ($id) {
            Transactions::where('id', $id)->update([
                'status' => 'Processing'
            ]);
            session()->flash('message', 'Status Transaksi Processing');
        }
    }
    public function updateStatusCompleted($id)
    {
        if ($id) {
            Transactions::where('id', $id)->update([
                'status' => 'Completed'
            ]);
            session()->flash('message', 'Status Transaksi Completed');
        }
    }

    public function deleteTransaction($id)
    {
        if ($id) {
            Transactions::where('id', $id)->delete();
            session()->flash('message', 'Transaksi telah dihapus.');
        }
    }
}
