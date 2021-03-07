<!-- Modal Update -->
<div wire:ignore.self class="modal modal-sm fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="printModalLabel">Update Kategori</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach($todayTransactions as $key=>$value)
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title text-center"><i class="fas fa-receipt"></i> {{$value->invoice_number}}</h6>
                        <ul class="list-group px-0 py-0">
                            <li class="list-group-item text-center"><i class="fas fa-check-double"></i> {{$value->status}}</li>
                            <li class="list-group-item"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{date('d/m/Y', strtotime($value->created_at))}}</li>
                            <li class="list-group-item"><i class="fas fa-clock    "></i> {{date('H:i:s', strtotime($value->created_at))}}</li>
                            <li class="list-group-item bg-light font-weight-bold text-center">Customer</li>
                            <li class="list-group-item">
                                @foreach($users as $user)
                                @if($user->id == $value->user_id)
                                ID : {{$user->id}}<br>
                                Login : {{$user->name}}<br>
                                Email : {{$user->email}}<br>
                                Status : {{$user->role}}
                                <hr>
                                @endif
                                @endforeach
                                @foreach($address as $uad)
                                @if($uad->user_id == $value->user_id)
                                Alamat Tagihan :<br>
                                <strong>{{$uad->nama_depan}} {{$uad->nama_belakang}}</strong><br>
                                {{$uad->alamat_1}}<br>
                                {{$uad->kelurahan}}<br>
                                {{$uad->kecamatan}}<br>
                                {{$uad->kabupaten}}<br>
                                {{$uad->provinsi}}-{{$uad->kode_pos}}<br>
                                Telepon : {{$uad->telepon}}
                                @endif
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <div class="card-body px-0 py-0" style="height:30vh;overflow-y:scroll;">
                        <ul class="list-group px-0 py-0">
                            <li class="list-group-item bg-light font-weight-bold text-center">Detail Pesanan</li>
                        </ul>
                        <table class="table table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($value->product as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><strong>{{$row->product_name}}</strong></td>
                                    <td>{{$row->qty}}</td>
                                    <td>Rp.{{$row->product_price}}</td>
                                </tr>>
                                @endforeach
                                <tr>
                                    <td colspan="4">Total : Rp.{{$value->total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endfroeach
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark btn-xs"><i class="fas fa-print"></i></button>
            </div>
        </div>
    </div>
</div>