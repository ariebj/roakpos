<div class="container-fluid">
    <div class="card">
        <div class="card-header text-secondary">
            <h6 class="font-weight-bold mt-1">Metode Pesan</h6>
        </div>
        <div class="card-body">
            @if($updateMode)
            @include('livewire.ordermethod-update')
            @else
            @include('livewire.ordermethod-create')
            @endif
            <table class="table table-sm text-secondary">
                <thead>
                    <tr>
                        <th class="bg-light border-0">No</th>
                        <th class="bg-light border-0">ID</th>
                        <th class="bg-light border-0">Name</th>
                        <th class="bg-light border-0">Description</th>
                        <th class="bg-light border-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordermethods as $key=>$value)
                    <tr>
                        <td width="3%" class="font-weight-bold"> {{ $key+1 }} </td>
                        <td width="3%" class="font-weight-bold"> {{ $value->id}} </td>
                        <td> {{ $value->name }} </td>
                        <td> {{ $value->description }} </td>
                        <td width="5%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click="edit({{ $value->id }})" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updateOrdermethodForm"><i class="fas fa-edit"></i></button>
                                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer fixed-bottom px-0 py-0 text-center bg-white text-secondary">
            <div class="input-group input-group-md">
                <a href="{{route('ordermethods')}}" class="btn btn-outline-secondary"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i></a>
                <input wire:model="search" type="search" class="form-control form-control-md" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ketik pencarian...">
                <button class="btn btn-outline-success" data-toggle="modal" data-target="#createOrdermethodForm"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>