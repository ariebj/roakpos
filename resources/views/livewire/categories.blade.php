<div class="container-fluid px-0">
    <div class="card px-0 border-0">
        <div class="card-header text-center bg-white text-secondary">
            <h6 class="font-weight-bold mt-1">Kategori</h6>
        </div>
        <div class="card-body px-0 py-0 border-0 visible-xs" style="max-height:72vh;overflow-y:auto;">
            @foreach($categories as $key=>$value)
            <ul type="button" class="list-group border-0" data-bs-toggle="collapse" data-bs-target="#category{{$value->id}}" aria-expanded="false" aria-controls="collapseExample">
                <li class="list-group-item d-flex justify-content-between align-items-center text-secondary px-0" style="border-radius:0;border-bottom:.5px;">
                    <div class="col-sm-6">
                        <span><strong>{{ $value->name }}</strong></span><br>
                    </div>
                    <div class="col-sm">
                        <span>{{ $value->description }}</span><br>
                    </div>
                    <img data-toggle="modal" data-target="#imageProductForm" src="{{asset('storage/uploads/'.$value->image)}}" alt="Image" class="img-fluid px-0 py-0" style="height:50px;">
                </li>
            </ul>
            <ul id="category{{$value->id}}" class="list-group list-group-horizontal collapse" style="border-radius:0;">
                <li type="button" wire:click="edit({{$value->id}})" class="list-group-item flex-fill border-0 bg-secondary text-white text-center" style="border-radius:0;" data-toggle="modal" data-target="#updateCategoryForm"><i class="fas fa-edit"></i></li>
                <li type="button" wire:click="delete({{$value->id}})" class="list-group-item flex-fill border-0 bg-danger text-white text-center" data-toggle="modal" style="border-radius:0;" data-target="#deleteCategoryForm"><i class="fas fa-trash"></i></li>
            </ul>
            @endforeach
        </div>
        <div class="col-sm d-flex">
            <table class="table table-sm text-secondary hidden-xs" style="max-height:75vh;overflow-y:auto;">
                <thead>
                    <tr>
                        <th class="bg-light border-0">No</th>
                        <th class="bg-light border-0">ID</th>
                        <th class="bg-light border-0">Name</th>
                        <th class="bg-light border-0">Description</th>
                        <th class="bg-light border-0">Image</th>
                        <th class="bg-light border-0">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=>$value)
                    <tr>
                        <td width="3%" class="font-weight-bold"> {{ $key+1 }} </td>
                        <td width="3%" class="font-weight-bold"> {{ $value->id}} </td>
                        <td> {{ $value->name }} </td>
                        <td> {{ $value->description }} </td>
                        <td width="5%"><img src="{{asset('storage/uploads/'.$value->image)}}" alt="Image" class="img-fluid"></td>
                        <td width="5%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click="edit({{ $value->id }})" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updateCategoryForm"><i class="fas fa-edit"></i></button>
                                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($updateMode)
                    @include('livewire.category-update')
                    @else
                    @include('livewire.category-create')
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer fixed-bottom px-0 py-0 text-center bg-white text-secondary">
            <div class="input-group input-group-md">
                <a href="{{route('categories')}}" class="btn btn-outline-secondary"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i></a>
                <input wire:model="search" type="search" class="form-control form-control-md" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ketik pencarian...">
                <span type="button" class="input-group-text bg-success text-white" data-toggle="modal" data-target="#createCategoryForm"><i class="fas fa-plus"></i></span>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewUpdateCategory').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#updateCategoryInput2").change(function() {
        readURL(this);
    });
</script>
@endpush