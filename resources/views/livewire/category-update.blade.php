<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="updateCategoryForm" tabindex="-1" aria-labelledby="updateCategoryFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCategoryFormLabel">Update Kategori</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <input type="hidden" wire:model="category_id">
                            <label>Nama</label>
                            <input wire:model="name" type="text" class="form-control" id="updateCategoryInput1">
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Deskripsi</label>
                            <textarea wire:model="description" type="text" class="form-control" id="updateCategoryInput3"></textarea>
                            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="update()" class="btn btn-secondary btn-block">Update Category</button>
                        </div>
                    </form>
                    <form>
                        <div class="form-group mt-2 mb-2">
                            <label class="form-label" for="updateCategoryInput6">Foto</label>
                            <input wire:model="image" type="file" class="form-control" id="updateCategoryInput2" onchange="readURL(this)" />
                            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
                            <div wire:loading wire:target="image">
                                <div class="d-flex align-items-center text-secondary m-2">
                                    <strong>Uploading...</strong>
                                    <div class="spinner-grow spinner-grow-sm ms-auto" role="status" aria-hidden="true"></div>
                                </div>
                            </div>
                            @if($image)
                            <img wire:ignore.self id="previewUpdateCategory" src="" class="img-fluid mb-2">
                            @endif
                        </div>
                        <button type="button" wire:click.prevent="updateCategoryImage()" class="btn btn-secondary btn-block">UPDATE FOTO</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>