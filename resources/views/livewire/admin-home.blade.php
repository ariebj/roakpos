<div class="container-fluid d-flex px-0">
    @if (session()->has('message'))
    <div class="alert alert-success" style="position:absolute;top:50px;left:0;z-index:2;">
        {{ session('message') }}
        <button type="button" class="text-danger close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif
    <div class="card border-0 visible-xs" style="width:100%;">
        <div class="card-header font-weight-bold text-center bg-white text-secondary">
            Transaksi Hari Ini <i type="button" class="fas fa-eye ml-1" data-bs-toggle="collapse" data-bs-target="#summary" aria-expanded="false" aria-controls="collapseExample"></i><br>
            <small><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{date('d/m/Y', strtotime(now()))}}</small>&nbsp;
            <small><i class="fas fa-clock"></i></small>&nbsp;<div class="text-secondary" wire:poll.1000ms>{{date('H:i:s', strtotime(now()))}}</div>
        </div>
        <div class="card-body px-0 py-0 bg-white text-secondary">
            @if($todayTransactions)
            <ul class="list-group collapse" id="summary">
                <li class="list-group-item justify-content-between align-items-center bg-white text-secondary font-weigh-bold">
                    Jumlah Transaksi
                    <span class="badge bg-info rounded-pill">{{$todayTransactions->count()}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-white text-secondary font-weigh-bold">
                    Total
                    <span class="badge bg-info rounded-pill">Rp.{{$todayTransactions->sum('total')}}</span>
                </li>
            </ul>
            @endif
        </div>
        <div class="card-body px-0 py-0 border-0 mb-5" style="max-height:70vh;overflow-y:auto;">
            @if($todayTransactions)
            @foreach($todayTransactions as $key=>$value)
            <ul type="button" class="list-group d-flex border-0 px-0" data-bs-toggle="collapse" data-bs-target="#transaction{{$value->id}}" aria-expanded="false" aria-controls="collapseExample">
                <li class="list-group-item d-flex justify-content-between align-items-center text-secondary px-0" style="border-radius:0;border-bottom:.5px;">
                    <div class="col-sm-6">
                        <span><strong>{{ $value->invoice_number }}</strong></span><br>
                        <span><small>Total : <strong>Rp.{{ $value->total }}</strong></small><span>
                    </div>
                    <div class="col-sm">
                        @if($value->status == 'Pending')
                        <small class="text-secondary"><i class="fas fa-check-double"></i> {{$value->status}}</small>
                        @endif
                        @if($value->status == 'On-Hold')
                        <small class="text-warning"><i class="fa fa-hand-stop-o"></i> {{$value->status}}</small>
                        @endif
                        @if($value->status == 'Cancelled')
                        <small class="text-danger" style="opacity:0.7;"><i class="fa fa-window-close"></i> {{$value->status}}</small>
                        @endif
                        @if($value->status == 'Processing')
                        <small class="text-success" style="opacity:0.7;"><i class="fa fa-spinner fa-spin"></i> {{$value->status}}</small>
                        @endif
                        @if($value->status == 'Completed')
                        <small class="text-success"><i class="fas fa-check-double"></i> {{$value->status}}</small><br>
                        <small><i class="fas fa-clock"></i> Last Update : {{date('d/m/Y H:i:s', strtotime($value->updated_at))}}</small>
                        @endif
                    </div>
                </li>
            </ul>
            <ul id="transaction{{$value->id}}" class="list-group list-group-horizontal collapse" style="border-radius:0;">
                <div class="card px-0" style="width:100%;">
                    <div class="card-header bg-dark text-white" style="opacity:0.8;">
                        <h6 class="card-title text-center"><i class="fas fa-receipt"></i> {{$value->invoice_number}}</h6>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div wire:ignore.self id="{{$value->invoice_number}}" class="card printSection">
                            <div class="card-header text-center bg-white" style="line-height:1em;">
                                <strong>ROAKRAK KOFI</strong><br>
                                <small>Jl.Ahmad Yani No.35, Majalengka 45411</small><br>
                                <small><i class="fas fa-phone"></i> 02338291701 &nbsp;&nbsp;&nbsp;<i class="fas fa-envelope"></i> cafe@roakrak.co.id</small>
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr style="line-height:.5em;">
                                        <td colspan="4" class="text-center">
                                            <small><i class="fa fa-receipt"></i> {{$value->invoice_number}}</small>&nbsp;&nbsp;&nbsp;
                                            <small><i class="fa fa-calendar-check" aria-hidden="true"></i> {{date('d/m/Y', strtotime($value->created_at))}}</small>&nbsp;&nbsp;&nbsp;
                                            <small><i class="fas fa-clock"></i> {{date('H:i:s', strtotime($value->created_at))}}</small>
                                        </td>
                                    </tr>
                                    <tr style="line-height:.5em;">
                                        <td colspan="4" class="text-center">
                                            <small><i class="fa fa-cash-register" aria-hidden="true"></i> {{Auth::user()->name}}</small>&nbsp;&nbsp;&nbsp;
                                            @if($value->status == 'Pending')
                                            <small class="text-secondary"><i class="fas fa-check-double"></i> {{$value->status}}</small>
                                            @endif
                                            @if($value->status == 'On-Hold')
                                            <small class="text-warning"><i class="fa fa-hand-stop-o"></i> {{$value->status}}</small>
                                            @endif
                                            @if($value->status == 'Cancelled')
                                            <small class="text-danger" style="opacity:0.7;"><i class="fa fa-window-close"></i> {{$value->status}}</small>
                                            @endif
                                            @if($value->status == 'Processing')
                                            <small class="text-success" style="opacity:0.7;"><i class="fa fa-spinner fa-spin"></i> {{$value->status}}</small>
                                            @endif
                                            @if($value->status == 'Completed')
                                            <small class="text-success"><i class="fas fa-check-double"></i> {{$value->status}}</small>
                                            @endif
                                            &nbsp;&nbsp;<small><i class="fa fa-history" aria-hidden="true"></i> {{date('H:i:s', strtotime($value->updated_at))}}</small>
                                        </td>
                                    </tr>

                                    <tr class="bg-light text-center" style="line-height:.5em;">
                                        <td colspan="4"><small>CUSTOMER <i type="button" class="fas fa-info-circle ml-2" data-bs-toggle="collapse" data-bs-target="#customer{{$value->invoice_number}}" aria-expanded="false" aria-controls="collapseExample"></i></small></td>
                                    </tr>
                                    <tr style="line-height:.5em;" class="collapse" id="customer{{$value->invoice_number}}">
                                        <td colspan="4">
                                            @foreach($users as $user)
                                            @if($user->id == $value->user_id)
                                            <small><i class="fas fa-user"></i>&nbsp;<strong>{{$user->name}}</strong>&nbsp;&nbsp;</small>
                                            <small>{{$user->email}}<br><br></small>
                                            @endif
                                            @endforeach
                                            @foreach($address as $uad)
                                            @if($uad->user_id == $value->user_id)
                                            <small><i class="fas fa-map-marked    "></i> Alamat :<br><br></small>
                                            <small>{{$uad->alamat_1}},{{$uad->alamat_2}}<br><br>{{$uad->kabupaten}}-{{$uad->provinsi}}&nbsp;{{$uad->kode_pos}}<br><br></small>
                                            <small><i class="fas fa-phone-square"></i> {{$uad->telepon}}</small>
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr class="bg-light text-center" style="line-height:.5em;">
                                        <td colspan="4"><small>ITEM PESANAN</small></td>
                                    </tr>
                                    <tr class="bg-light text-dark" style="line-height:.5em;">
                                        <td><small>No</small></td>
                                        <td><small>Item</small></td>
                                        <td><small>Qty</small></td>
                                        <td><small>Harga</small></td>
                                    </tr>
                                    @foreach($value->product as $key=>$row)
                                    <tr style="line-height:.5em;">
                                        <td>
                                            <small>
                                                @if($row->order_method == 'Dine In')
                                                <i class="fas fa-utensils" style="font-size:10px;"></i>
                                                @endif
                                                @if($row->order_method == 'Take Away')
                                                <i class="fas fa-shopping-bag" style="font-size:10px;"></i>
                                                @endif
                                                {{$key+1}}
                                            </small>
                                        </td>
                                        <td><small><strong>{{$row->product_name}}</strong>-{{$row->product_option}}</small></td>
                                        <td><small>{{$row->qty}}</small></td>
                                        <td><small>Rp.{{$row->product_price}}</small></td>
                                    </tr>
                                    @endforeach
                                    <tr class="bg-light" style="line-height:0.5em;">
                                        <td colspan="3" class="text-right"><small>Ppn 10%</small></td>
                                        <td colspan="1"><small>Rp.0,</small></td>
                                    </tr>
                                    <tr class="bg-light" style="line-height:0.5em;">
                                        <td colspan="3" class="text-right"><small><strong>TOTAL</strong></small></td>
                                        <td colspan="1"><small><strong>Rp.{{$value->total}}</strong></small></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-footer text-center bg-white" style="line-height:1em;">
                                <small>Terima Kasih Atas Kunjungan Anda</small><br>
                                <small><strong>www.roakrak.co.id</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer px-0 py-0">
                        @if($value->status == 'Completed')
                        <button class="btn btn-outline-secondary btn-sm btn-block" onclick="PrintReceipt('{{$value->invoice_number}}')">
                            <i class="fas fa-print"></i>
                        </button>
                        @else
                        <div class="btn-group btn-group-sm d-flex">
                            <button wire:click="updateStatusOnhold({{ $value->id}})" class="btn btn-warning btn-xs"><i class="fa fa-hand-stop-o" aria-hidden="true"></i></button>
                            <button wire:click="updateStatusCancelled({{ $value->id}})" class="btn btn-danger btn-xs" style="opacity:0.7;"><i class="fa fa-window-close"></i></button>
                            <button wire:click="updateStatusProcessing({{ $value->id}})" class="btn btn-success btn-xs" style="opacity:0.7;"><i class="fa fa-spinner"></i></button>
                            <button wire:click="updateStatusCompleted({{ $value->id}})" class="btn btn-success btn-xs"><i class="fas fa-check-double"></i></button>
                            <button wire:click="deleteTransaction({{ $value->id}})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                        </div>
                        @endif
                    </div>
                </div>
            </ul>
            @endforeach
            @endif
        </div>
    </div>
    <div class="col-lg-6 py-1 hidden-xs">
        <div class="card">
            <div class="card-header font-weight-bold text-center bg-white text-secondary">
                Transaksi Hari Ini <i type="button" class="fas fa-eye ml-1" data-bs-toggle="collapse" data-bs-target="#summary" aria-expanded="false" aria-controls="collapseExample"></i><br>
                <small><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{date('d/m/Y', strtotime(now()))}}</small>&nbsp;
                <small><i class="fas fa-clock"></i></small>&nbsp;<small id="time"></small>
            </div>
            <div class="card-body px-0 py-0 bg-white text-secondary">
                @if($todayTransactions)
                <ul class="list-group collapse" id="summary">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-white text-secondary font-weigh-bold">
                        Jumlah Transaksi
                        <span class="badge bg-info rounded-pill">{{$todayTransactions->count()}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-white text-secondary font-weigh-bold">
                        Total
                        <span class="badge bg-info rounded-pill">Rp.{{$todayTransactions->sum('total')}}</span>
                    </li>
                </ul>
                @endif
            </div>
            <div class="col-md d-flex px-0" style="overflow-x:scroll;">
                @if($todayTransactions)
                @foreach($todayTransactions as $key=>$value)
                <div class="col-sm d-flex px-1">
                    <div class="card" style="width:21rem;">
                        <div class="card-header bg-dark text-white" style="opacity:0.8;">
                            <h6 class="card-title text-center"><i class="fas fa-receipt"></i> {{$value->invoice_number}}</h6>
                        </div>
                        <div class="card-body px-0 py-0" style="height:50vh;overflow-y:scroll;">
                            <div wire:ignore.self id="{{$value->invoice_number}}" class="card printSection">
                                <div class="card-header text-center bg-white" style="line-height:1em;">
                                    <strong>ROAKRAK KOFI</strong><br>
                                    <small>Jl.Ahmad Yani No.35, Majalengka 45411</small><br>
                                    <small><i class="fas fa-phone"></i> 02338291701 &nbsp;&nbsp;&nbsp;<i class="fas fa-envelope"></i> cafe@roakrak.co.id</small>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr style="line-height:.5em;">
                                            <td colspan="4" class="text-center">
                                                <small><i class="fa fa-receipt"></i> {{$value->invoice_number}}</small>&nbsp;&nbsp;&nbsp;
                                                <small><i class="fa fa-calendar-check" aria-hidden="true"></i> {{date('d/m/Y', strtotime($value->created_at))}}</small>&nbsp;&nbsp;&nbsp;
                                                <small><i class="fas fa-clock"></i> {{date('H:i:s', strtotime($value->created_at))}}</small>
                                            </td>
                                        </tr>
                                        <tr style="line-height:.5em;">
                                            <td colspan="4" class="text-center">
                                                <small><i class="fa fa-cash-register" aria-hidden="true"></i> {{Auth::user()->name}}</small>&nbsp;&nbsp;&nbsp;
                                                @if($value->status == 'Pending')
                                                <small class="text-secondary"><i class="fas fa-check-double"></i> {{$value->status}}</small>
                                                @endif
                                                @if($value->status == 'On-Hold')
                                                <small class="text-warning"><i class="fa fa-hand-stop-o"></i> {{$value->status}}</small>
                                                @endif
                                                @if($value->status == 'Cancelled')
                                                <small class="text-danger" style="opacity:0.7;"><i class="fa fa-window-close"></i> {{$value->status}}</small>
                                                @endif
                                                @if($value->status == 'Processing')
                                                <small class="text-success" style="opacity:0.7;"><i class="fa fa-spinner fa-spin"></i> {{$value->status}}</small>
                                                @endif
                                                @if($value->status == 'Completed')
                                                <small class="text-success"><i class="fas fa-check-double"></i> {{$value->status}}</small>
                                                @endif
                                                &nbsp;&nbsp;<small><i class="fa fa-history" aria-hidden="true"></i> {{date('H:i:s', strtotime($value->updated_at))}}</small>
                                            </td>
                                        </tr>

                                        <tr class="bg-light text-center" style="line-height:.5em;">
                                            <td colspan="4"><small>CUSTOMER <i type="button" class="fas fa-info-circle ml-2" data-bs-toggle="collapse" data-bs-target="#customer{{$value->invoice_number}}" aria-expanded="false" aria-controls="collapseExample"></i></small></td>
                                        </tr>
                                        <tr style="line-height:.5em;" class="collapse" id="customer{{$value->invoice_number}}">
                                            <td colspan="4">
                                                @foreach($users as $user)
                                                @if($user->id == $value->user_id)
                                                <small><i class="fas fa-user"></i>&nbsp;<strong>{{$user->name}}</strong>&nbsp;&nbsp;</small>
                                                <small>{{$user->email}}<br><br></small>
                                                @endif
                                                @endforeach
                                                @foreach($address as $uad)
                                                @if($uad->user_id == $value->user_id)
                                                <small><i class="fas fa-map-marked    "></i> Alamat :<br><br></small>
                                                <small>{{$uad->alamat_1}},{{$uad->alamat_2}}<br><br>{{$uad->kabupaten}}-{{$uad->provinsi}}&nbsp;{{$uad->kode_pos}}<br><br></small>
                                                <small><i class="fas fa-phone-square"></i> {{$uad->telepon}}</small>
                                                @endif
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr class="bg-light text-center" style="line-height:.5em;">
                                            <td colspan="4"><small>ITEM PESANAN</small></td>
                                        </tr>
                                        <tr class="bg-light text-dark" style="line-height:.5em;">
                                            <td><small>No</small></td>
                                            <td><small>Item</small></td>
                                            <td><small>Qty</small></td>
                                            <td><small>Harga</small></td>
                                        </tr>
                                        @foreach($value->product as $key=>$row)
                                        <tr style="line-height:.5em;">
                                            <td>
                                                <small>
                                                    @if($row->order_method == 'Dine In')
                                                    <i class="fas fa-utensils" style="font-size:10px;"></i>
                                                    @endif
                                                    @if($row->order_method == 'Take Away')
                                                    <i class="fas fa-shopping-bag" style="font-size:10px;"></i>
                                                    @endif
                                                    {{$key+1}}
                                                </small>
                                            </td>
                                            <td><small><strong>{{$row->product_name}}</strong>-{{$row->product_option}}</small></td>
                                            <td><small>{{$row->qty}}</small></td>
                                            <td><small>Rp.{{$row->product_price}}</small></td>
                                        </tr>
                                        @endforeach
                                        <tr class="bg-light" style="line-height:0.5em;">
                                            <td colspan="3" class="text-right"><small>Ppn 10%</small></td>
                                            <td colspan="1"><small>Rp.0,</small></td>
                                        </tr>
                                        <tr class="bg-light" style="line-height:0.5em;">
                                            <td colspan="3" class="text-right"><small><strong>TOTAL</strong></small></td>
                                            <td colspan="1"><small><strong>Rp.{{$value->total}}</strong></small></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer text-center bg-white" style="line-height:1em;">
                                    <small>Terima Kasih Atas Kunjungan Anda</small><br>
                                    <small><strong>www.roakrak.co.id</strong></small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer px-0 py-0">
                            @if($value->status == 'Completed')
                            <div class="btn-group btn-group-sm d-flex">
                                <button disable class="btn btn-success btn-xs">Transaksi Selesai! Terima Kasih</button>
                            </div>
                            @else
                            <div class="btn-group btn-group-sm d-flex">
                                <button wire:click="updateStatusOnhold({{ $value->id}})" class="btn btn-warning btn-xs"><i class="fa fa-hand-stop-o" aria-hidden="true"></i></button>
                                <button wire:click="updateStatusCancelled({{ $value->id}})" class="btn btn-danger btn-xs" style="opacity:0.7;"><i class="fa fa-window-close"></i></button>
                                <button wire:click="updateStatusProcessing({{ $value->id}})" class="btn btn-success btn-xs" style="opacity:0.7;"><i class="fa fa-spinner"></i></button>
                                <button wire:click="updateStatusCompleted({{ $value->id}})" class="btn btn-success btn-xs"><i class="fas fa-check-double"></i></button>
                                <button wire:click="deleteTransaction({{ $value->id}})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-6 py-1 hidden-xs">
        <div class="card">
            <div class="card-header font-weight-bold text-center bg-white text-secondary">
                <i class="fas fa-print"></i> Print <br>
                <small>**Transaksi harus selesai</small>
            </div>
            <div class="col-md d-flex px-0 bg-white" style="overflow-x:scroll;">
                @if($todayTransactions)
                @foreach($todayTransactions as $key=>$value)
                @if($value->status == 'Completed')
                <div class="col-sm d-flex px-1">
                    <div class="card" style="width:21rem;">
                        <div class="card-header bg-dark text-white" style="opacity:0.8;">
                            <h6 class="card-title text-center"><i class="fas fa-receipt"></i> {{$value->invoice_number}}</h6>
                        </div>
                        <div class="card-body px-0 py-0" style="height:50vh;overflow-y:scroll;">
                            <div wire:ignore.self id="{{$value->invoice_number}}" class="card printSection">
                                <div class="card-header text-center bg-white" style="line-height:1em;">
                                    <strong>ROAKRAK KOFI</strong><br>
                                    <small>Jl.Ahmad Yani No.35, Majalengka 45411</small><br>
                                    <small><i class="fas fa-phone"></i> 02338291701 &nbsp;&nbsp;&nbsp;<i class="fas fa-envelope"></i> cafe@roakrak.co.id</small>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr style="line-height:.5em;">
                                            <td colspan="4" class="text-center">
                                                <small><i class="fa fa-receipt"></i> {{$value->invoice_number}}</small>&nbsp;&nbsp;&nbsp;
                                                <small><i class="fa fa-calendar-check" aria-hidden="true"></i> {{date('d/m/Y', strtotime($value->created_at))}}</small>&nbsp;&nbsp;&nbsp;
                                                <small><i class="fas fa-clock"></i> {{date('H:i:s', strtotime($value->created_at))}}</small>
                                            </td>
                                        </tr>
                                        <tr style="line-height:.5em;">
                                            <td colspan="4" class="text-center">
                                                <small><i class="fa fa-cash-register" aria-hidden="true"></i> {{Auth::user()->name}}</small>&nbsp;&nbsp;&nbsp;
                                                <small><i class="fas fa-check-double"></i> {{$value->status}}</small>&nbsp;&nbsp;
                                                &nbsp;&nbsp;<small><i class="fa fa-history" aria-hidden="true"></i> {{date('H:i:s', strtotime($value->updated_at))}}</small>
                                            </td>
                                        </tr>

                                        <tr class="bg-light text-center" style="line-height:.5em;">
                                            <td colspan="4"><small>CUSTOMER <i type="button" class="fas fa-info-circle ml-1" data-bs-toggle="collapse" data-bs-target="#customer{{$value->invoice_number}}" aria-expanded="false" aria-controls="collapseExample"></i></small></td>
                                        </tr>
                                        <tr style="line-height:.5em;" class="collapse" id="customer{{$value->invoice_number}}">
                                            <td colspan="4">
                                                @foreach($users as $user)
                                                @if($user->id == $value->user_id)
                                                <small><i class="fas fa-user"></i>&nbsp;<strong>{{$user->name}}</strong>&nbsp;&nbsp;</small>
                                                <small>{{$user->email}}<br><br></small>
                                                @endif
                                                @endforeach
                                                @foreach($address as $uad)
                                                @if($uad->user_id == $value->user_id)
                                                <small><i class="fas fa-map-marked    "></i> Alamat :<br><br></small>
                                                <small>{{$uad->alamat_1}},{{$uad->alamat_2}}<br><br>{{$uad->kabupaten}}-{{$uad->provinsi}}&nbsp;{{$uad->kode_pos}}<br><br></small>
                                                <small><i class="fas fa-phone-square"></i> {{$uad->telepon}}</small>
                                                @endif
                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr class="bg-light text-center" style="line-height:.5em;">
                                            <td colspan="4"><small>ITEM PESANAN</small></td>
                                        </tr>
                                        <tr class="bg-light text-dark" style="line-height:.5em;">
                                            <td><small>No</small></td>
                                            <td><small>Item</small></td>
                                            <td><small>Qty</small></td>
                                            <td><small>Harga</small></td>
                                        </tr>
                                        @foreach($value->product as $key=>$row)
                                        <tr style="line-height:.5em;">
                                            <td>
                                                <small>
                                                    @if($row->order_method == 'Dine In')
                                                    <i class="fas fa-utensils" style="font-size:10px;"></i>
                                                    @endif
                                                    @if($row->order_method == 'Take Away')
                                                    <i class="fas fa-shopping-bag" style="font-size:10px;"></i>
                                                    @endif
                                                    {{$key+1}}
                                                </small>
                                            </td>
                                            <td><small><strong>{{$row->product_name}}</strong>-{{$row->product_option}}</small></td>
                                            <td><small>{{$row->qty}}</small></td>
                                            <td><small>Rp.{{$row->product_price}}</small></td>
                                        </tr>
                                        @endforeach
                                        <tr class="bg-light" style="line-height:0.5em;">
                                            <td colspan="3" class="text-right"><small>Ppn 10%</small></td>
                                            <td colspan="1"><small>Rp.0,</small></td>
                                        </tr>
                                        <tr class="bg-light" style="line-height:0.5em;">
                                            <td colspan="3" class="text-right"><small><strong>TOTAL</strong></small></td>
                                            <td colspan="1"><small><strong>Rp.{{$value->total}}</strong></small></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer text-center bg-white" style="line-height:1em;">
                                    <small>Terima Kasih Atas Kunjungan Anda</small><br>
                                    <small><strong>www.roakrak.co.id</strong></small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer px-0 py-0 bg-white text-secondary">

                            <button class="btn btn-outline-secondary btn-sm btn-block" onclick="PrintReceipt('{{$value->invoice_number}}')">
                                <i class="fas fa-print"></i>
                            </button>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer fixed-bottom px-0 py-0 text-center bg-white text-secondary">
        <div class="input-group input-group-md">
            <a href="{{route('admin-home')}}" class="btn btn-outline-secondary"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i></a>
            <input wire:model="search" type="search" class="form-control form-control-md" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ketik pencarian...">
        </div>
    </div>
</div>
@push('scripts')
<script>
    //PrintBill
    function PrintReceipt(el) {
        var data = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">' +
            '<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />';
        data += document.getElementById(el).innerHTML;
        myReceipt = window.open("", "myWin", "left=512, top=64, width=340, height=500");
        myReceipt.screenX = 0;
        myReceipt.screenY = 0;
        myReceipt.document.write(data);
        myReceipt.document.title = 'ROAKPOS';
        myReceipt.focus();
        setTimeout(() => {
            myReceipt.close();
        }, 240000);
    }
</script>
@endpush