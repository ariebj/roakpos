<div class="container-fluid px-0">
    <div class="card px-0 border-0 mb-4">
        <div class="card-header font-weight-bold text-center bg-white text-secondary">
            Laporan Transaksi <i type="button" class="fas fa-eye ml-1" data-bs-toggle="collapse" data-bs-target="#summary" aria-expanded="false" aria-controls="collapseExample"></i><br>
        </div>
        <div class="card-body px-0 py-0 bg-white text-secondary">
            @if($transactions)
            <ul class="list-group collapse" id="summary">
                <li class="list-group-item justify-content-between align-items-center bg-white text-secondary font-weigh-bold">
                    Jumlah Transaksi
                    <span class="badge bg-info rounded-pill">{{$transactions->count()}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center bg-white text-secondary font-weigh-bold">
                    Total
                    <span class="badge bg-info rounded-pill">Rp.{{$transactions->sum('total')}}</span>
                </li>
            </ul>
            @endif
        </div>
        <div class="card border-0 visible-xs" style="width:100%;">
            <div class="card-body px-0 py-0 border-0 mb-5" style="max-height:70vh;overflow-y:auto;">
                @if($transactions)
                @foreach($transactions as $key=>$transaction)
                <ul type="button" class="list-group d-flex border-0 px-0" data-bs-toggle="collapse" data-bs-target="#transaction{{$transaction->id}}" aria-expanded="false" aria-controls="collapseExample">
                    <li class="list-group-item d-flex justify-content-between align-items-center text-secondary px-0" style="border-radius:0;border-bottom:.5px;">
                        <div class="col-sm-6">
                            <span><strong>{{ $transaction->invoice_number }}</strong></span><br>
                            <span><small>Total : <strong>Rp.{{ $transaction->total }}</strong></small><span>
                        </div>
                        <div class="col-sm">
                            @if($transaction->status == 'Pending')
                            <small class="text-secondary"><i class="fas fa-check-double"></i> {{$transaction->status}}</small>
                            @endif
                            @if($transaction->status == 'On-Hold')
                            <small class="text-warning"><i class="fa fa-hand-stop-o"></i> {{$transaction->status}}</small>
                            @endif
                            @if($transaction->status == 'Cancelled')
                            <small class="text-danger" style="opacity:0.7;"><i class="fa fa-window-close"></i> {{$transaction->status}}</small>
                            @endif
                            @if($transaction->status == 'Processing')
                            <small class="text-success" style="opacity:0.7;"><i class="fa fa-spinner fa-spin"></i> {{$transaction->status}}</small>
                            @endif
                            @if($transaction->status == 'Completed')
                            <small class="text-success"><i class="fas fa-check-double"></i> {{$transaction->status}}</small><br>
                            <small><i class="fas fa-clock"></i> Last Update : {{date('d/m/Y H:i:s', strtotime($transaction->updated_at))}}</small>
                            @endif
                        </div>
                    </li>
                </ul>
                <ul id="transaction{{$transaction->id}}" class="list-group list-group-horizontal collapse" style="border-radius:0;">
                    <div class="card px-0" style="width:100%;">
                        <div class="card-header bg-dark text-white" style="opacity:0.8;">
                            <h6 class="card-title text-center"><i class="fas fa-receipt"></i> {{$transaction->invoice_number}}</h6>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div wire:ignore.self id="{{$transaction->invoice_number}}" class="card printSection">
                                <div class="card-header text-center bg-white" style="line-height:1em;">
                                    <strong>ROAKRAK KOFI</strong><br>
                                    <small>Jl.Ahmad Yani No.35, Majalengka 45411</small><br>
                                    <small><i class="fas fa-phone"></i> 02338291701 &nbsp;&nbsp;&nbsp;<i class="fas fa-envelope"></i> cafe@roakrak.co.id</small>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr style="line-height:.5em;">
                                            <td colspan="4" class="text-center">
                                                <small><i class="fa fa-receipt"></i> {{$transaction->invoice_number}}</small>&nbsp;&nbsp;&nbsp;
                                                <small><i class="fa fa-calendar-check" aria-hidden="true"></i> {{date('d/m/Y', strtotime($transaction->created_at))}}</small>&nbsp;&nbsp;&nbsp;
                                                <small><i class="fas fa-clock"></i> {{date('H:i:s', strtotime($transaction->created_at))}}</small>
                                            </td>
                                        </tr>
                                        <tr style="line-height:.5em;">
                                            <td colspan="4" class="text-center">
                                                <small><i class="fa fa-cash-register" aria-hidden="true"></i> {{Auth::user()->name}}</small>&nbsp;&nbsp;&nbsp;
                                                @if($transaction->status == 'Pending')
                                                <small class="text-secondary"><i class="fas fa-check-double"></i> {{$transaction->status}}</small>
                                                @endif
                                                @if($transaction->status == 'On-Hold')
                                                <small class="text-warning"><i class="fa fa-hand-stop-o"></i> {{$transaction->status}}</small>
                                                @endif
                                                @if($transaction->status == 'Cancelled')
                                                <small class="text-danger" style="opacity:0.7;"><i class="fa fa-window-close"></i> {{$transaction->status}}</small>
                                                @endif
                                                @if($transaction->status == 'Processing')
                                                <small class="text-success" style="opacity:0.7;"><i class="fa fa-spinner fa-spin"></i> {{$transaction->status}}</small>
                                                @endif
                                                @if($transaction->status == 'Completed')
                                                <small class="text-success"><i class="fas fa-check-double"></i> {{$transaction->status}}</small>
                                                @endif
                                                &nbsp;&nbsp;<small><i class="fa fa-history" aria-hidden="true"></i> {{date('H:i:s', strtotime($transaction->updated_at))}}</small>
                                            </td>
                                        </tr>

                                        <tr class="bg-light text-center" style="line-height:.5em;">
                                            <td colspan="4"><small>CUSTOMER <i type="button" class="fas fa-info-circle ml-2" data-bs-toggle="collapse" data-bs-target="#customer{{$transaction->invoice_number}}" aria-expanded="false" aria-controls="collapseExample"></i></small></td>
                                        </tr>
                                        <tr style="line-height:.5em;" class="collapse" id="customer{{$transaction->invoice_number}}">
                                            <td colspan="4">
                                                @foreach($users as $user)
                                                @if($user->id == $transaction->user_id)
                                                <small><i class="fas fa-user"></i>&nbsp;<strong>{{$user->name}}</strong>&nbsp;&nbsp;</small>
                                                <small>{{$user->email}}<br><br></small>
                                                @endif
                                                @endforeach
                                                @foreach($address as $uad)
                                                @if($uad->user_id == $transaction->user_id)
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
                                        @foreach($transaction->product as $key=>$row)
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
                                            <td colspan="1"><small><strong>Rp.{{$transaction->total}}</strong></small></td>
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
                            @if($transaction->status == 'Completed')
                            <button class="btn btn-outline-secondary btn-sm btn-block" onclick="PrintReceipt('{{$transaction->invoice_number}}')">
                                <i class="fas fa-print"></i>
                            </button>
                            @else
                            <div class="btn-group btn-group-sm d-flex">
                                <button wire:click="updateStatusOnhold({{ $transaction->id}})" class="btn btn-warning btn-xs"><i class="fa fa-hand-stop-o" aria-hidden="true"></i></button>
                                <button wire:click="updateStatusCancelled({{ $transaction->id}})" class="btn btn-danger btn-xs" style="opacity:0.7;"><i class="fa fa-window-close"></i></button>
                                <button wire:click="updateStatusProcessing({{ $transaction->id}})" class="btn btn-success btn-xs" style="opacity:0.7;"><i class="fa fa-spinner"></i></button>
                                <button wire:click="updateStatusCompleted({{ $transaction->id}})" class="btn btn-success btn-xs"><i class="fas fa-check-double"></i></button>
                                <button wire:click="deleteTransaction({{ $transaction->id}})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                            </div>
                            @endif
                        </div>
                    </div>
                </ul>
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm d-flex hidden-xs">
            <table class="table table-md hidden-xs text-secondary">
                <thead class="thead-light">
                    <tr>
                        <th class="font-weight-bold">ID</th>
                        <th class="font-weight-bold">Invoice No.</th>
                        <th class="font-weight-bold">Customer ID</th>
                        <th class="font-weight-bold">Total</th>
                        <th class="font-weight-bold">Dibuat</th>
                        <th class="font-weight-bold">Diperbarui</th>
                        <th class="font-weight-bold">Status</th>
                        <th class="font-weight-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $key=>$transaction)
                    <tr>
                        <td class=" font-weight-bold">{{ $transaction->id }}</td>
                        <td>{{ $transaction->invoice_number }}</td>
                        <td>{{ $transaction->user_id }}</td>
                        <td>{{ $transaction->total }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <button wire:click="updateStatusOnhold({{ $transaction->id}})" class="btn btn-warning btn-xs"><i class="fa fa-hand-stop-o" aria-hidden="true"></i></button>
                                <button wire:click="updateStatusCancelled({{ $transaction->id}})" class="btn btn-danger btn-xs" style="opacity:0.7;"><i class="fa fa-window-close"></i></button>
                                <button wire:click="updateStatusProcessing({{ $transaction->id}})" class="btn btn-success btn-xs" style="opacity:0.7;"><i class="fa fa-spinner"></i></button>
                                <button wire:click="updateStatusCompleted({{ $transaction->id}})" class="btn btn-success btn-xs"><i class="fas fa-check-double"></i></button>
                                <button wire:click="deleteTransaction({{ $transaction->id}})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer fixed-bottom px-0 py-0 text-center bg-white text-secondary">
            <div class="input-group input-group-md">
                <a href="{{route('reports')}}" class="btn btn-outline-secondary"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i></a>
                <input wire:model="search" type="search" class="form-control form-control-md" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ketik pencarian...">
            </div>
        </div>
    </div>
</div>