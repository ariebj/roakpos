<div class="container-fluid no-gutters">
    <div class="row">
        <div class="col-sm mt-1 px-0 menu">
            <div class="card">
                <div class="card-header text-secondary bg-white py-0 px-0">
                    <h6 class="text-center pt-1 title">TAKE AWAY <small><i class="fas fa-shopping-bag"></i></small></h6>
                    @include('livewire.search')
                </div>
                <div class="card-body px-0 py-0" style="max-width:100%;height:75vh;overflow-x:hidden;">
                    <div class="row px-3">
                        @foreach($products as $product)
                        @if($product->status == 'active' && $product->order_method == 'Take Away')
                        <div class="col-sm-3 px-0 py-0 dinein">
                            <div type="button" class="card px-0 py-0" wire:click="addItem({{$product->id}})">
                                <div class="card-header bg-dark d-flex px-1 py-1" style="opacity:0.8;">
                                    <div class="col-sm text-center text-white font-weight-bold justify-content-center prodprice">Rp.{{$product->price}}<br>
                                        <small class="prodstock">Stok : {{$product->stock}}</small>
                                    </div>
                                </div>
                                <div class="card-body px-0 py-0">
                                    <div class="ovl-container">
                                        <img src="{{asset('storage/uploads/'.$product->image)}}" alt="Product Image" class="img-fluid px-0 py-0">
                                        <div class="ovl">
                                            <i class="fa fa-shopping-cart ovl-icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-danger px-1 py-1">
                                    <div class="col-sm d-flex text-white font-weight-bold justify-content-center prodname">{{$product->name}}</div>
                                    <div class="col-sm-12 d-flex text-white justify-content-between px-2 prodname">
                                        @if($search == '')
                                        <small>{{$product->category}}</small>
                                        @else
                                        <small class="font-weight-bold text-warning">{{$product->category}}</small>
                                        @endif
                                        @if($search == '')
                                        <small>{{$product->option}}</small>
                                        @else
                                        <small class="font-weight-bold text-info">{{$product->option}}</small>
                                        @endif
                                        <small><i class="fas fa-shopping-bag"></i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-1 px-0 hidden-xs">
            <div class="card">
                <div class="card-header text-secondary bg-white py-0 px-0">
                    <h6 class="text-center font-weight-bold pt-1 title">TRANSAKSI</h6>
                </div>
                <div class="card-body px-0 py-0" style="overflow-y:scroll;height:42vh;">
                    <table class="table table-sm text-secondary">
                        <thead>
                            <tr>
                                <th class="bg-light border-0" style="top:0;">No</th>
                                <th class="bg-light border-0" style="top:0;">Nama</th>
                                <th class="bg-light border-0" style="top:0;">Qty</th>
                                <th class="bg-light border-0" style="top:0;">Harga</th>
                                <th class="bg-light border-0" style="top:0;">Subtotal</th>
                                <th class="bg-light border-0" style="top:0;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($carts as $key=>$cart)
                            <tr>
                                <td>
                                    <small>
                                        @if($cart['attributes']['order_method'] == 'Dine In')
                                        <i class="fas fa-utensils" style="font-size:10px;"></i>
                                        @endif
                                        @if($cart['attributes']['order_method'] == 'Take Away')
                                        <i class="fas fa-shopping-bag" style="font-size:10px;"></i>
                                        @endif
                                        {{$key+1}}
                                    </small>
                                </td>
                                <td><strong>{{$cart['name']}}</strong>&nbsp;<small>{{$cart['attributes']['option']}}</small><br></td>
                                <td>{{$cart['quantity']}}</td>
                                <td>Rp.{{number_format($cart['pricesingle'], 0)}}</td>
                                <td>Rp.{{number_format($cart['price'], 0)}}</td>
                                <td>
                                    <ul class="list-group list-group-horizontal py-0 px-0 border-0">
                                        <li class="list-group-item py-0 px-0 border-0"><button class="btn btn-outline-success px-0 py-0" type="button" wire:click="increaseItem('{{$cart['rowId']}}')"> <i class="fas fa-plus-square"></i> </button></li>
                                        <li class="list-group-item py-0 px-0 border-0"><button class="btn btn-outline-secondary px-0 py-0" type="button" wire:click="decreaseItem('{{$cart['rowId']}}')"> <i class="fas fa-minus-square"></i> </button></li>
                                        <li class="list-group-item py-0 px-0 border-0"><button class="btn btn-outline-danger px-0 py-0" type="button" wire:click="removeItem('{{$cart['rowId']}}')"> <i class="fas fa-trash-alt"></i> </button></li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary">
                                    <small>Menerima Pembayaran</small>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/logo-bca.svg" alt="BCA" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/logo-bni.png" alt="BNI" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/logo-dana.svg" alt="DANA" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/logo-gopay.png" alt="GOPAY" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/logo-ovo.png" alt="QRIS" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                                <td>
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/logo-linkaja.svg" alt="LINKAJA" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center text-secondary">
                                    <small>Pembayaran lainnya yang sudah di dukung :</small>
                                </td>
                                <td colspan="1" class="text-center text-secondary">
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/logo-gpn.png" alt="GPN" class="img-fluid px-0 py-0" style="height:24px;"><br>
                                </td>
                                <td colspan="1" class="text-center text-secondary">
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/QRIS.png" alt="QRIS" class="img-fluid px-0 py-0" style="height:24px;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-center text-secondary">
                                    <img src="https://pos.roakrak.co.id/roakpos/storage/app/public/logos/QRIS-DANA.png" alt="QRIS" class="img-fluid px-0 py-0 mt-2 mb-2" style="height:125px;">
                                </td>
                            </tr>
                            @endforelse
                            @if(session()->has('error'))
                            <tr>
                                <div class=" alert alert-danger">
                                    {{session('error')}}
                                    <button type="button" class="text-danger close" data-dismiss="alert" aria-hidden="true" style="position:absolute;right:0;top:0;">&times;</button>
                                </div>
                            </tr>
                            @endif
                            @if(session()->has('message'))
                            <div class="alert alert-success d-flex">
                                {{session('message')}}
                                <button type="button" class="text-danger close" data-dismiss="alert" aria-hidden="true" style="position:absolute;right:0;top:0;">&times;</button>
                            </div>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer px-0 py-0">
                    <button wire:click="clearCart" class="btn btn-danger btn-block title" style="border-radius:0;"><i class="fa fa-trash" aria-hidden="true"></i> KOSONGKAN KERANJANG</button>
                    <div class="input-group input-group-md">
                        <span class="input-group-text font-weight-bold col-6 title" id="inputGroup-sizing-lg">SUBTOTAL</span>
                        <input type="text" readonly class="form-control col-6 title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="Rp.{{number_format($summary['sub_total'],0)}}">
                        <span class="input-group-text font-weight-bold col-6  hidden-xs" id="inputGroup-sizing-lg">PPN 10%</span>
                        <input type="text" readonly class="form-control col-6 hidden-xs" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="Rp.{{number_format($summary['pajak'],0)}}">
                        <span class="input-group-text font-weight-bold col-6 title" id="inputGroup-sizing-lg">GRAND TOTAL</span>
                        <input type="text" readonly class="form-control col-6 title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="Rp.{{number_format($summary['total'],0)}}">
                    </div>
                    <div class="btn-group btn-block" role="group" aria-label="Basic mixed styles example">
                        <button wire:click="enableTax" class="btn btn-primary" style="border-radius:0;"><i class="fa fa-plus-square" aria-hidden="true"></i> PPN</button>
                        <button wire:click="disableTax" class="btn btn-secondary" style="border-radius:0;"><i class="fa fa-minus-square" aria-hidden="true"></i> NON PPN</button>
                    </div>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text font-weight-bold" id="inputGroup-sizing-lg"><i class="fa fa-money" aria-hidden="true"></i></span>
                        <input type="hidden" id="totalCart" value="{{$summary['total']}}">
                        <input wire:ignore.self wire:model="payment" id="payment" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>
                    <form wire:submit.prevent="handleSubmit">
                        <!--<div class="input-group input-group-lg">
                        <span class="input-group-text font-weight-bold col-lg-4">Pembayaran</span>
                        <span wire:ignore id="pembayaran" class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text font-weight-bold col-lg-4">Kembalian</span>
                            <span wire:ignore id="kembalian" class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                        </div>-->
                        <button wire:ignore id="saveButton" disable class="btn btn-lg btn-danger active btn-block" style="border-radius:0;"><i class="fa fa-money"></i> BAYAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cart -->
    <div wire:ignore.self class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header py-1 bg-danger text-white">
                    <h6 class="modal-title" id="cartModalLabel">TRANSAKSI</h6>
                    <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body py-1 px-1">
                    <div class="card-body px-0 py-0" style="overflow-y:scroll;height:40vh;">
                        <table class="table table-sm text-secondary" style="font-size:12px;">
                            <thead>
                                <tr>
                                    <th class="bg-light border-0" style="top:0;">No</th>
                                    <th class="bg-light border-0" style="top:0;">Nama</th>
                                    <th class="bg-light border-0" style="top:0;">Qty</th>
                                    <th class="bg-light border-0" style="top:0;">Harga</th>
                                    <th class="bg-light border-0" style="top:0;">Subtotal</th>
                                    <th class="bg-light border-0" style="top:0;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse($carts as $key=>$cart)
                                    <td>
                                        <small>
                                            @if($cart['attributes']['order_method'] == 'Dine In')
                                            <i class="fas fa-utensils" style="font-size:10px;"></i>
                                            @endif
                                            @if($cart['attributes']['order_method'] == 'Take Away')
                                            <i class="fas fa-shopping-bag" style="font-size:10px;"></i>
                                            @endif
                                            {{$key+1}}
                                        </small>
                                    </td>
                                    <td><strong>{{$cart['name']}}</strong>&nbsp;<small>{{$cart['attributes']['option']}}</small><br></td>
                                    <td>{{$cart['quantity']}}</td>
                                    <td>Rp.{{number_format($cart['pricesingle'], 0)}}</td>
                                    <td>Rp.{{number_format($cart['price'], 0)}}</td>
                                    <td>
                                        <ul class="list-group list-group-horizontal py-0 px-0 border-0">
                                            <li class="list-group-item py-0 px-0 border-0"><button class="btn btn-outline-success px-0 py-0" type="button" wire:click="increaseItem('{{$cart['rowId']}}')"> <i class="fas fa-plus-square"></i> </button></li>
                                            <li class="list-group-item py-0 px-0 border-0"><button class="btn btn-outline-secondary px-0 py-0" type="button" wire:click="decreaseItem('{{$cart['rowId']}}')"> <i class="fas fa-minus-square"></i> </button></li>
                                            <li class="list-group-item py-0 px-0 border-0"><button class="btn btn-outline-danger px-0 py-0" type="button" wire:click="removeItem('{{$cart['rowId']}}')"> <i class="fas fa-trash-alt"></i> </button></li>
                                        </ul>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="6">
                                    <h6 class="text-center font-weight-bold">Keranjang Kosong</h6>
                                </td>
                                @endforelse
                                @if(session()->has('error'))
                                <tr>
                                    <div class=" alert alert-danger">
                                        {{session('error')}}
                                        <button type="button" class="text-danger close" data-dismiss="alert" aria-hidden="true" style="position:absolute;right:0;top:0;">&times;</button>
                                    </div>
                                </tr>
                                @endif
                                @if(session()->has('message'))
                                <div class="alert alert-success d-flex">
                                    {{session('message')}}
                                    <button type="button" class="text-danger close" data-dismiss="alert" aria-hidden="true" style="position:absolute;right:0;top:0;">&times;</button>
                                </div>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer px-0 py-0">
                        <button wire:click="clearCart" class="btn btn-danger btn-block title" style="border-radius:0;"><i class="fa fa-trash" aria-hidden="true"></i> KOSONGKAN KERANJANG</button>
                        <div class="input-group input-group-md">
                            <span class="input-group-text font-weight-bold col-6 title" id="inputGroup-sizing-lg">SUBTOTAL</span>
                            <input type="text" readonly class="form-control col-6 title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="Rp.{{number_format($summary['sub_total'],0)}}">
                            <span class="input-group-text font-weight-bold col-6  hidden-xs" id="inputGroup-sizing-lg">PPN 10%</span>
                            <input type="text" readonly class="form-control col-6 hidden-xs" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="Rp.{{number_format($summary['pajak'],0)}}">
                            <span class="input-group-text font-weight-bold col-6 title" id="inputGroup-sizing-lg">GRAND TOTAL</span>
                            <input type="text" readonly class="form-control col-6 title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="Rp.{{number_format($summary['total'],0)}}">
                        </div>
                        <div class="btn-group btn-block hidden-xs" role="group" aria-label="Basic mixed styles example">
                            <button wire:click="enableTax" class="btn btn-primary" style="border-radius:0;"><i class="fa fa-plus-square" aria-hidden="true"></i> PPN</button>
                            <button wire:click="disableTax" class="btn btn-secondary" style="border-radius:0;"><i class="fa fa-minus-square" aria-hidden="true"></i> NON PPN</button>
                        </div>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text font-weight-bold" id="inputGroup-sizing-lg"><i class="fa fa-money" aria-hidden="true"></i></span>
                            <input type="hidden" id="totalCart" value="{{$summary['total']}}">
                            <input wire:ignore.self wire:model="payment" id="payment" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                        <form wire:submit.prevent="handleSubmit">
                            <!--<div class="input-group input-group-lg">
                                <span class="input-group-text font-weight-bold col-lg-4">Pembayaran</span>
                                <span wire:ignore id="pembayaran" class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                            </div>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text font-weight-bold col-lg-4">Kembalian</span>
                                <span wire:ignore id="kembalian" class="input-group-text font-weight-bold col-lg-8">Rp.0</span>
                            </div>-->
                            <button wire:ignore id="saveButton" disable class="btn btn-lg btn-danger active btn-block" style="border-radius:0;"><i class="fa fa-money"></i> BAYAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal End-->
</div>
@push('scripts')
<script>
    payment.oninput = () => {
        const pembayaran = document.getElementById("payment").value
        const totalCart = document.getElementById("totalCart").value

        const kembalian = pembayaran - totalCart

        document.getElementById("kembalian").innerHTML = `Rp.${rupiah(kembalian)}`
        document.getElementById("pembayaran").innerHTML = `Rp.${rupiah(pembayaran)}`

        const saveButton = document.getElementById("saveButton")

        if (kembalian < 0) {
            saveButton.disable = true
        } else {
            saveButton.disable = false
        }
    }
    const rupiah = (angka) => {
        const numberString = angka.toString()
        const split = numberString.split(',')
        const sisa = split[0].length % 3
        let rupiah = split[0].substr(0, sisa)
        const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)

        if (ribuan) {
            const separator = sisa ? ',' : ''
            rupiah += separator + ribuan.join(',')
        }
        return split[1] != undefined ? rupiah + ',' + split[1] : rupiah
    }
</script>
@endpush