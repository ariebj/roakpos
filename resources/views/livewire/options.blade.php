<div class="container-fluid px-0">
    <div class="card border-0 px-0">
        <div class="card-header text-center bg-white text-secondary">
            <h6 class="font-weight-bold mt-1">Opsi Menu</h6>
        </div>
        <div class="col-sm d-flex px-0">
            @if($updateMode)
            @include('livewire.option-update')
            @else
            @include('livewire.option-create')
            @endif
            <table class="table table-sm text-secondary" style="max-height:75vh;overflow-y:auto;">
                <thead class="thead-dark">
                    <tr>
                        <th class="font-weight-bold">No</th>
                        <th class="font-weight-bold">ID</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Description</th>
                        <th class="font-weight-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($options as $key=>$value)
                    <tr>
                        <td width="3%" class="font-weight-bold"> {{ $key+1 }} </td>
                        <td width="3%" class="font-weight-bold"> {{ $value->id}} </td>
                        <td> {{ $value->name }} </td>
                        <td> {{ $value->description }} </td>
                        <td width="5%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click="edit({{ $value->id }})" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updateOptionForm"><i class="fas fa-edit"></i></button>
                                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer bg-white py-0 px-0">
            {{$options->links()}}
        </div>
    </div>
</div>