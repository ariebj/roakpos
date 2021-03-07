<!-- Modal Create -->
<div wire:ignore.self class="modal fade" id="createCategoryForm" tabindex="-1" aria-labelledby="createCategoryFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryFormLabel">Add Kategori</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <label>Category Name</label>
                            <input wire:model="name" type="text" class="form-control" id="createInput1">
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-label" for="customFile">Category Image</label>
                            <input wire:model="image" type="file" class="form-control" id="customFile" />
                            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
                            @if($image)
                            <img src="{{$image->temporaryUrl()}}" class="img-fluid" alt="Preview Image">
                            @endif
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Category Description</label>
                            <textarea wire:model="description" type="text" class="form-control" id="createInput3"></textarea>
                            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="store()" class="btn btn-primary btn-block">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>