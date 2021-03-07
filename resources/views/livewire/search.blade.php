<div class="px-0 py-0">
    <div class="input-group input-group-md">
        <a href="{{route('cart')}}" class="input-group-text bg-success text-white" id="inputGroup-sizing-md">
            <i class="fa fa-cutlery"></i>
        </a>
        <input wire:model="search" type="search" list="data-kategori" id="kategori" class="form-control form-control-md hidden-xs" placeholder="Kategori">
        <datalist id="data-kategori" class="hidden-xs">
            @foreach($categories as $key => $category)
            <option value="{{$category->name}}">
                @endforeach
        </datalist>
        <select wire:model="search" class="form-control form-control-md visible-xs">
            <option value="" disable>Kategori</option>
            @foreach($categories as $key => $category)
            <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select>
        <!--<a type="button" wire:click="clearSearch" class="input-group-text bg-white text-dark" id="inputGroup-sizing-md">
            <i class="fa fa-refresh fa-spin"></i>
        </a>-->
        <button type="button" class="btn btn-outline-secondary visible-xs" data-toggle="modal" data-target="#cartModal" id="inputGroup-sizing-md">
            <span class="badge badge-pill bg-warning text-white ml-2 mt-1" style="position:absolute;padding:2px;">
                @if($carts)
                {{$carts->count()}}
                @else
                0
                @endif
            </span>
            <i class="fa fa-shopping-cart"></i>
        </button>
        <input wire:model="search" type="search" list="data-opsi" id="opsi" class="form-control form-control-md hidden-xs" placeholder="Opsi Menu">
        <datalist id="data-opsi" class="hidden-xs">
            @foreach($options as $key => $option)
            <option value="{{$option->name}}">{{$option->name}}</option>
            @endforeach
        </datalist>
        <select wire:model="search" class="form-control form-control-md visible-xs">
            <option value="" disable>Opsi Menu</option>
            @foreach($options as $key => $option)
            <option value="{{$option->name}}">{{$option->name}}</option>
            @endforeach
        </select>
        <a href="{{route('takeaway')}}" class="input-group-text bg-danger text-white" id="inputGroup-sizing-md">
            <i class="fa fa-shopping-bag"></i>
        </a>
    </div>
</div>
