<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Address;

class AdminHome extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    //Transactions
    public $search;
    public function render()
    {
        $date = Carbon::today();
        $address = Address::all();
        $users = User::all();
        $transactions = Transactions::where('invoice_number', 'LIKE', '%' . $this->search . '%')
            ->where('status', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(10);
        $todayTransactions = Transactions::whereDate('created_at',  $date)
            ->where('invoice_number', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.admin-home', compact(
            'transactions',
            'todayTransactions',
            'address',
            'users',
            'date'
        ));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->status = null;
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
