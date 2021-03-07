<!-- Modal -->
<div wire:ignore.self class="modal fade" tabindex="-1" id="createAddressForm" aria-labelledby="createAddressFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAddressFormLabel">Form Alamat</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">Tambah Alamat</h5>
                    </div>
                    <div class="card-body">
                        <form class="row g-3">
                            <input wire:model="user_id" type="hidden">
                            <div class=" col-md-6">
                                <input wire:model="nama_depan" type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" required autocomplete="nama_depan">
                                @error('nama_depan')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-6">
                                <input wire:model="nama_belakang" type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" required autocomplete="nama_belakang">
                                @error('nama_belakang')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-12 mt-3">
                                <input wire:model="alamat_1" type="text" class="form-control" id="alamat_1" name="alamat_1" placeholder="contoh:Jalan Ahmad Yani No.35" required autocomplete="alamat_1">
                                @error('alamat_1')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-12 mt-3">
                                <input wire:model="alamat_2" type="text" class="form-control" id="alamat_2" name="alamat_2" placeholder="Blok, Apartemen,.." required autocomplete="alamat_2">
                                @error('alamat_2')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-12 mt-3">
                                <input wire:model="telepon" type="tel" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon/Handphone" required autocomplete="telepon">
                                @error('telepon')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mt-3">
                                <input wire:model="kelurahan" class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="Kelurahan" required autocomplete="kelurahan">
                                @error('kelurahan')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-6 mt-3">
                                <input wire:model="kecamatan" class="form-control" type="text" id="kecamatan" name="kecamatan" placeholder="Kecamatan" required autocomplete="kecamatan">
                                @error('kecamatan')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class=" col-md-4 mt-3">
                                <input wire:model="kabupaten" class="form-control" type="text" list="data-kabupaten" id="kabupaten" name="kabupaten" placeholder="Kabupaten/Kota" required autocomplete="kabupaten">
                                <datalist id="data-kabupaten">
                                    @foreach ($cities as $key=>$city)
                                    <option value="{{ $city->name }}">
                                        @endforeach
                                </datalist>
                                @error('kabupaten')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <input wire:model="provinsi" class="form-control" list="data-provinsi" id="provinsi" name="provinsi" placeholder="Provinsi" required autocomplete="provinsi">
                                <datalist id="data-provinsi">
                                    @foreach ($provinces as $key=>$province)
                                    <option value="{{ $province->name }}">
                                        @endforeach
                                </datalist>
                                @error('provinsi')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-4 mt-3">
                                <input wire:model="kode_pos" class="form-control" type="text" id="kode_pos" name="kode_pos" placeholder="Kodepos" required autocomplete="kode_pos">
                                @error('kode_pos')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group btn-group-sm col-sm-12">
                            <button wire:click="address()" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Alamat</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>