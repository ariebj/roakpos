<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Product as ProductModel;
use App\Models\Category;
use App\Models\Option;
use App\Models\OrderMethod;
use Livewire\WithPagination;

class Search extends Component
{

    public function render()
    {

        return view('livewire.search');
    }
}
