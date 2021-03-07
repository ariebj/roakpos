<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="updateOrdermethodForm" tabindex="-1" aria-labelledby="updateOrdermethodFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateOrdermethodFormLabel">Update Metode Pesan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <input type="hidden" wire:model="ordermethod_id">
                            <label>Nama</label>
                            <input wire:model="name" type="text" class="form-control" id="updateOrdermethodInput1">
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Deskripsi</label>
                            <textarea wire:model="description" type="text" class="form-control" id="updateOrdermethodInput2"></textarea>
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