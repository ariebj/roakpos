<!-- Modal -->
<div wire:ignore.self class="modal fade" tabindex="-1" id="imageProductForm" aria-labelledby="imageProductFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageProductFormLabel">Update Foto Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="card">
                        <div class="card-header">
                            <input wire:model="product_id" type="hidden">
                            <div class="input-group input-group-sm mb-3">
                                <input wire:model="image" type="file" class="form-control" id="imgInp" onchange="readProdURL(this)" />
                                @error('image')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                        <div class="card-body">
                            <div wire:loading wire:target="image">
                                <div class="d-flex align-items-center text-secondary m-2">
                                    <strong>Uploading...</strong>
                                    <div class="spinner-grow spinner-grow-sm ms-auto" role="status" aria-hidden="true"></div>
                                </div>
                            </div>
                            @if($image)
                            <img wire:ignore.self id="previewImg" src="#" class="img-fluid">
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="button" wire:click.prevent="updateProductImage()" class="btn btn-secondary btn-block">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>