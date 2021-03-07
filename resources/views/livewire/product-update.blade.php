<!-- Modal -->
<div wire:ignore.self class="modal fade" tabindex="-1" id="updateProductForm" aria-labelledby="updateProductFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProductFormLabel">Update Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <input wire:model="product_id" type="hidden">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-sm-3">Nama</span>
                        <input wire:model="name" type="text" class="form-control" id="updateProductInput1" autocomplete="updateProductInput1" placeholder="Nama Produk/Menu">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-sm-3">Stok</span>
                        <input wire:model="stock" type="number" class="form-control" id="updateProductInput2" autocomplete="updateProductInput2" placeholder="Stok Produk/Menu">
                        @error('stock')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-sm-3">Harga</span>
                        <input wire:model="price" type="number" class="form-control" id="updateProductInput3" autocomplete="updateProductInput3" placeholder="Harga Produk/Menu">
                        @error('price')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-sm-3">Kategori</span>
                        <input wire:model="category" type="search" class="form-control" list="data-category" id="updateProductInput4" autocomplete="updateProductInput4" placeholder="Kategori Produk/Menu">
                        <datalist id="data-category">
                            @foreach($categories as $category)
                            <option value="{{$category->name}}">
                                @endforeach
                        </datalist>
                        @error('category')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-sm-3">Opsi</span>
                        <input wire:model="option" type="search" class="form-control" list="data-option" id="updateProductInput5" autocomplete="updateProductInput5" placeholder="Opsi Produk/Menu">
                        <datalist id="data-option">
                            @foreach($options as $option)
                            <option value="{{$option->name}}">
                                @endforeach
                        </datalist>
                        @error('option')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text col-sm-3">Metode Pesan</span>
                        <input wire:model="order_method" type="search" class="form-control" list="data-ordermethod" id="updateProductInput6" autocomplete="updateProductInput6" placeholder="Metode Pesan Produk/Menu">
                        <datalist id="data-ordermethod">
                            @foreach($ordermethods as $ordermethod)
                            <option value="{{$ordermethod->name}}">
                                @endforeach
                        </datalist>
                        @error('order_method')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text col-sm-3">Status</span>
                        <input wire:model="status" type="search" class="form-control" list="data-status" id="updateProductInput7" autocomplete="updateProductInput7" placeholder="Status Produk/Menu">
                        <datalist id="data-status">
                            <option value="active">
                            <option value="inactive">
                        </datalist>
                        @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Deskripsi</label>
                        <textarea wire:model="description" type="text" class="form-control" id="updateProductInput8" autocomplete="updateProductInput8" placeholder="Deskripsi Produk/Menu"></textarea>
                        @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="update()" class="btn btn-secondary btn-block">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>