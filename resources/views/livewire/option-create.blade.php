<!-- Modal Update -->
<div wire:ignore.self class="modal modal-sm fade" id="createOptionForm" tabindex="-1" aria-labelledby="createOptionFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOptionFormLabel">Add Product Option</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <label>Option Name</label>
                            <input wire:model="name" type="text" class="form-control" id="createOptionInput1" required autocomplete="createOptionInput1">
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Option Description</label>
                            <textarea wire:model="description" type="text" class="form-control" id="createOptionInput2" required autocomplete="createOptionInput2"></textarea>
                            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click.prevent="store()" class="btn btn-primary btn-block">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>