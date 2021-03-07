<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">{{Auth::user()->name}}</h5>
                    <p class="card-text text-center">
                        {{Auth::user()->email}}
                    </p>
                </div>
                <div class="card-img text-center bg-dark">
                    <img src="{{asset('storage/avatars/'.Auth::user()->avatar)}}" class="img-fluid bg-white" alt="avatar" style="border-radius:50%;">
                    <form>
                        @if($avatar)
                        <img src="{{$avatar->temporaryUrl()}}" class="img-fluid bg-white" alt="Preview Image">
                        @endif
                        <div class="input-group input-group-sm">
                            <button wire:click.prevent="updateAvatar()" class="btn btn-secondary"><i class="fa fa-user-circle" aria-hidden="true"></i> Update</button>
                            <div class="custom-file">
                                <label class="custom-file-label text-left" for="customFile">Update Foto</label>
                                <input wire:model="avatar" type="file" class="form-control" id="customFile" />
                                @error('avatar')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                        </div>
                    </form>
                </div>
                @if(isset($address))
                <div class="card-body">
                    <p class="card-text">Alamat:<br>
                        <strong>{{$address->nama_depan}} {{$address->nama_belakang}}</strong><br>
                        {{$address->alamat_1}},{{$address->alamat_2}}<br>
                        {{$address->kelurahan}}, {{$address->kecamatan}}<br>
                        {{$address->provinsi}}-{{$address->kode_pos}}<br>
                        Telp: {{$address->telepon}}
                    </p>
                    <div class="btn-group btn-group-sm d-flex">
                        <button wire:click="edit({{$address->id}})" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#updateAddressForm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                        <button wire:click="deleteAddress({{$address->id}})" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                </div>
                @else
                <button class="btn btn-xs btn-success btn-block" data-toggle="modal" data-target="#createAddressForm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Alamat</button>
                @endif

                @if($updateMode)
                @include('livewire.address-update')
                @else
                @include('livewire.address-create')
                @endif
                <div class="card-footer">
                    <p class="card-text text-center">
                        Status : {{Auth::user()->role}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>