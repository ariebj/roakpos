<div class="row justify-content-center">
    <div class="col-sm-3 mb-3">
        <div class="card">
            <div class="card-header text-white py-0" style="background:#3c280d;opacity:0.9;">
                <h6 class="card-title text-center pt-1">Transaksi Terakhir</h6>
            </div>
            @foreach($transactions as $key=>$value)
            @if($key == 0)
            <div class="card-body">
                <ul class="list-group px-0 py-0">
                    <li class="list-group-item bg-dark text-white text-center">ID : {{$value->invoice_number}}</li>
                    <li class="list-group-item">Tanggal : {{date('d/m/Y', strtotime($value->created_at))}} {{date('H:i:s', strtotime($value->created_at))}}</li>
                    <li class="list-group-item bg-dark text-white text-center">ITEMS</li>
                    @foreach($value->product as $key=>$row)
                    <li class="list-group-item">
                        <strong>{{$row->product_name}}</strong><br>
                        Harga : Rp.{{$row->product_price}}<br>
                        Qty : {{$row->qty}}
                    </li>
                    <li class="list-group-item bg-dark text-white text-center">Total : Rp.{{$value->total}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @endforeach
            <div class="card-footer text-white py-0 px-0">
                <a class="btn btn-outline-success btn-rounded d-block" href="{{ route('cart') }}">Kembali Ke Transaksi</a>
            </div>
        </div>
    </div>
    <div class="col-md-9" style="margin-bottom:50px;">
        @if($transactions)
        <div class="card">
            <div class="card-header text-white py-0" style="background:#3c280d;opacity:0.9;">
                <h6 class="card-title text-center pt-1">Riwayat Transaksi</h6>
            </div>
            <div class="col d-flex px-0" style="overflow-x:scroll;">
                @foreach($transactions as $key=>$value)
                <div class="col-sm-3 px-1">
                    <div class="card" style="width:15rem;">
                        <div class="card-header">
                            <h6 class="card-title text-center">ID : {{$value->invoice_number}}</h6>
                        </div>
                        <div class="card-body px-0 py-0" style="height:30vh;overflow-y:scroll;">
                            <ul class="list-group px-0 py-0">
                                <li class="list-group-item">Tgl : {{date('d/m/Y', strtotime($value->created_at))}} {{date('H:i:s', strtotime($value->created_at))}}</li>
                                <li class="list-group-item bg-dark text-white text-center">ITEMS</li>
                                @foreach($value->product as $key=>$row)
                                <li class="list-group-item">
                                    <strong>{{$row->product_name}}</strong><br>
                                    Harga : Rp.{{$row->product_price}}<br>
                                    Qty : {{$row->qty}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <h6 class="card-title text-center">Total : Rp.{{$value->total}}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-footer py-0 px-0">
                <a class="btn btn-outline-success btn-rounded d-block" href="{{ route('cart') }}">Kembali Ke Transaksi</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header text-white py-0 px-0" style="background:#3c280d;opacity:0.9;">
                        <h6 class="font-weight-bold text-center pt-1">{{__('Belum ada Transaksi')}}</h6>
                    </div>
                    <div class="card-body">
                        Seluruh riwayat transaksi anda akan tampil di halaman ini.
                    </div>
                    <div class="card-footer py-0 px-0">
                        <a class="btn btn-outline-success btn-rounded" href="{{ route('cart') }}">Mulai Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="card-footer fixed-bottom" style="background:#3c280d;">
        <div class="input-group input-group-sm">
            <span class="input-group-text bg-dark text-white"><i class="fa fa-search" aria-hidden="true"></i></span>
            <input wire:model="search" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Cari ID Transaksi...">
            <button wire:click="clearSearch" class="input-group-text bg-dark text-white" id="inputGroup-sizing-sm">
                <i class="fa fa-refresh fa-spin"></i>
            </button>
        </div>
    </div>
</div>