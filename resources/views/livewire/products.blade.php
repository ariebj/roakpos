<div class="container-fluid px-0">
    <div class="card px-0 border-0 mb-4">
        <div class="card-header text-center bg-white text-secondary">
            <h6 class="font-weight-bold mt-1">Produk</h6>
        </div>
        <div class="card-body px-0 py-0 border-0 visible-xs" style="max-height:72vh;overflow-y:auto;">
            @foreach($products as $key=>$product)
            <ul type="button" class="list-group border-0" data-bs-toggle="collapse" data-bs-target="#prod{{$product->id}}" aria-expanded="false" aria-controls="collapseExample">
                <li class="list-group-item d-flex justify-content-between align-items-center text-secondary px-0" style="border-radius:0;border-bottom:.5px;">
                    <div class="col-sm-6">
                        <span><strong>{{ $product->name }}</strong></span><br>
                        <span> <small>{{ $product->option }}</small><span>
                    </div>
                    <div class="col-sm">
                        <span>Rp.{{ $product->price }}</span><br>
                        <span>
                            @if($product->order_method == 'Dine In')
                            <small><i class="fas fa-utensils"></i></small>
                            @endif
                            @if($product->order_method == 'Take Away')
                            <small><i class="fas fa-shopping-bag"></i></small>
                            @endif
                            <small>Stok : {{ $product->stock }}</small>
                        </span>
                    </div>
                    <img type="button" wire:click.prevent="editProductImage({{$product->id}})" data-toggle="modal" data-target="#imageProductForm" src="{{asset('storage/uploads/'.$product->image)}}" alt="Image" class="img-fluid px-0 py-0" style="height:50px;">
                </li>
            </ul>
            <ul id="prod{{$product->id}}" class="list-group list-group-horizontal collapse" style="border-radius:0;">
                <li type="button" wire:click="edit({{$product->id}})" class="list-group-item flex-fill border-0 bg-secondary text-white text-center" style="border-radius:0;" data-toggle="modal" data-target="#updateProductForm"><i class="fas fa-edit"></i></li>
                <li type="button" wire:click="deleteProduct({{$product->id}})" class="list-group-item flex-fill border-0 bg-danger text-white text-center" data-toggle="modal" style="border-radius:0;" data-target="#deleteProductForm"><i class="fas fa-trash"></i></li>
            </ul>
            @endforeach
        </div>
        <div class="col-sm d-flex">
            <table class="table table-md hidden-xs">
                <thead class="thead-light">
                    <tr>
                        <th class="font-weight-bold">ID</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Kategori</th>
                        <th class="font-weight-bold">Opsi</th>
                        <th class="font-weight-bold">Pesan</th>
                        <th class="font-weight-bold">Stock</th>
                        <th class="font-weight-bold">Price</th>
                        <th class="font-weight-bold">Description</th>
                        <th class="font-weight-bold">Status</th>
                        <th class="font-weight-bold">Image</th>
                        <th class="font-weight-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                        <td class=" font-weight-bold">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->option }}</td>
                        <td>{{ $product->order_method }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{$product->description}}</td>
                        <td>{{ $product->status}}</td>
                        <td><img type="button" wire:click.prevent="editProductImage({{$product->id}})" data-toggle="modal" data-target="#imageProductForm" src="{{asset('storage/uploads/'.$product->image)}}" alt="Image" class="img-fluid" style="height:30px;"></td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <button wire:click="edit({{$product->id}})" class="btn btn-primary" data-toggle="modal" data-target="#updateProductForm"><i class="fas fa-edit"></i></button>
                                <button wire:click="deleteProduct({{$product->id}})" class="btn btn-danger" data-toggle="modal" data-target="#deleteProductForm"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @include('livewire.product-image')
                    @if($updateMode)
                    @include('livewire.product-update')
                    @else
                    @include('livewire.product-create')
                    @endif
                    @include('livewire.product-delete')
                </tbody>
            </table>
        </div>
        <div class="card-footer fixed-bottom px-0 py-0 text-center bg-white text-secondary">
            <div class="input-group input-group-md">
                <a href="{{route('products')}}" class="btn btn-outline-secondary"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i></a>
                <input wire:model="search" type="search" class="form-control form-control-md" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ketik pencarian...">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createProductForm"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    function readProdURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readProdURL(this);
    });
</script>
<script>
    window.addEventListener('editProduct', event => {
        $('#updateProductForm').modal('show');
    })
    window.addEventListener('createProduct', event => {
        $('#createProductForm').modal('show');
    })
</script>
@endpush