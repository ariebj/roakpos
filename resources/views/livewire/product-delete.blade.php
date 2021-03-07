<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="deleteProductForm" tabindex="-1" aria-labelledby="deleteProductFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductFormLabel">Hapus Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="card-text mt-2 text-center">Anda yakin ingin menghapus produk ini?</p>
                <form>
                    <div class="card px-0 py-0" style="border-radius:0;">
                        <div class="card-header d-flex px-0 py-0">
                            <div class="form-group d-flex text-secondary px-0 py-0 border-0">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">ID</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="product_id">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Status</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="status">
                            </div>
                        </div>
                        <div class="card-body d-flex px-0 py-0">
                            <div class="form-group col-sm-4 text-secondary px-0 py-0 border-0">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Nama</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="name">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Opsi Menu</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="option">
                            </div>
                            <div class="form-group col-sm-4 text-secondary px-0 py-0 border-0">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Kategori</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="category">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Stok</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="stock">
                            </div>
                            <div class="form-group col-sm-4 text-secondary px-0 py-0 border-0">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Harga</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="price">
                                <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Metode Pesan</span>
                                <input readonly type="text" style="border-radius:0;" class="form-control d-flex border-0 py-0 text-secondary" wire:model="order_method">
                            </div>
                        </div>
                        <span class="input-group-text border-0 bg-danger text-white" style="border-radius:0;">Deskripsi</span>
                        <div class="form-group d-flex text-secondary px-0 py-0 border-0">
                            <textarea readonly type="text" style="border-radius:0;" class="form-control border-0 py-0 text-secondary" wire:model="description"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button wire:click="delete({{$product_id}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>
        </div>
    </div>
</div>