<!-- Modal Update -->
<div wire:ignore.self class="modal modal-sm fade" id="updateOptionForm" tabindex="-1" aria-labelledby="updateOptionFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateOptionFormLabel">Update Product Option</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <input type="hidden" wire:model="option_id">
                            <label>Option Name</label>
                            <input wire:model="name" type="text" class="form-control" id="updateOptionInput1">
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Option Description</label>
                            <textarea wire:model="description" type="text" class="form-control" id="updateOptionInput2"></textarea>
                            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="update()" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>