<!-- Modal -->
<div wire:ignore.self class="modal fade" tabindex="-1" id="createProductForm" aria-labelledby="createProductFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card">
                        <div class="card-header">
                            Tambah Produk
                        </div>
                        <div class="card-body">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text col-sm-3">Nama</span>
                                <input wire:model="name" type="text" class="form-control" id="createProductInput1" autocomplete="createProductInput1" placeholder="Nama Produk/Menu">
                            </div>
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text col-sm-3">Stok</span>
                                <input wire:model="stock" type="text" class="form-control" id="createProductInput2" autocomplete="createProductInput2" placeholder="Stok Produk/Menu">
                            </div>
                            @error('stock')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text col-sm-3">Harga</span>
                                <input wire:model="price" type="text" class="form-control" id="createProductInput3" autocomplete="createProductInput3" placeholder="Harga Produk/Menu">
                            </div>
                            @error('price')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text col-sm-3">Kategori</span>
                                <select wire:model="category" class="form-control text-secondary" type="select">
                                    <option disable>--Pilih--</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text col-sm-3">Opsi Menu</span>
                                <select wire:model="option" class="form-control text-secondary" type="select">
                                    <option>--Pilih--</option>
                                    @foreach($options as $option)
                                    <option value="{{$option->name}}">{{$option->name}} - {{$option->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('option')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text col-sm-3">Metode Pesan</span>
                                <select wire:model="order_method" class="form-control text-secondary" type="select">
                                    <option value="">--Pilih--</option>
                                    @foreach($ordermethods as $ordermethod)
                                    <option value="{{$ordermethod->name}}">{{$ordermethod->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('order_method')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text col-sm-3">Status</span>
                                <input wire:model="status" type="text" class="form-control" list="data-status" id="createProductInput7" autocomplete="createProductInput7" placeholder="Status Produk/Menu">
                                <datalist id="data-status">
                                    <option value="active">
                                    <option value="inactive">
                                </datalist>
                            </div>
                            @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                            <div class="input-group input-group-sm">
                                <span class="input-group-text col-sm-3">Deskripsi</span>
                                <input wire:model="description" type="text" class="form-control" id="createProductInput8" autocomplete="createProductInput8" placeholder="Deskripsi Produk/Menu"><br>
                            </div>
                            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                            <small class="p-0 m-0" style="font-style:italic;font-size:11px;">Deskripsi singkat bisa di update kemudian.</small>
                            <div class="input-group input-group-sm mt-3">
                                <input wire:model="image" type="file" class="form-control" id="createProductInput9" />
                            </div>
                            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
                            <div wire:loading wire:target="image">
                                <div class="d-flex align-items-center text-secondary m-2">
                                    <strong>Uploading...</strong>
                                    <div class="spinner-grow spinner-grow-sm ms-auto" role="status" aria-hidden="true"></div>
                                </div>
                            </div>
                            @if($image)
                            <img src="{{$image->temporaryUrl()}}" class="img-fluid mt-2">
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="button" wire:click.prevent="store()" class="btn btn-success btn-block">CREATE PRODUCT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>