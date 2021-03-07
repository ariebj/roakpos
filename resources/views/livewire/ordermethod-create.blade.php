<!-- Modal Update -->
<div wire:ignore.self class="modal fade" id="createOrdermethodForm" tabindex="-1" aria-labelledby="createOrdermethodFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrdermethodFormLabel">Tambah Metode</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <label>Nama</label>
                            <input wire:model="name" type="text" class="form-control" id="createOrdermethodInput1" required autocomplete="createOrdermethodInput1">
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label>Deskripsi</label>
                            <textarea wire:model="description" type="text" class="form-control" id="createOrdermethodInput2" required autocomplete="createOrdermethodInput2"></textarea>
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