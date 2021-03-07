@if (Route::has('login'))
@auth
<div class="px-0 py-0">
    <!-- Modal Side Bar -->
    <div wire:ignore.self class="modal left fade" id="adminSideBar" tabindex="-1" aria-labelledby="adminSideBarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius:0;">
                <div class="modal-header justify-content-center  text-secondary" style="border-radius:0;">
                    <ul class="list-group" style="border-radius:0;border:0;">
                        <li class="list-group-item text-secondary text-center" style="border-radius:0;border:0;">
                            <img src="{{asset('storage/avatars/'.Auth::user()->avatar)}}" class="img-responsive py-0 px-0" alt="avatar" style="border-radius:50%;height:40px;"><br>
                            <small>{{ Auth::user()->name }}</small><br>
                            <small>{{ Auth::user()->email }}</small>
                        </li>
                    </ul>
                </div>
                <div class="modal-body px-0 py-0">
                    <ul class="list-group text-secondary" style="border-radius:0;">
                        <a href="{{ route('home') }}" class="list-group-item list-group-item-action"><i class="fa fa-tachometer mr-2" aria-hidden="true"></i>Dasbor</a>
                        <a href="{{ route('cart') }}" class="list-group-item list-group-item-action"><i class="fa fa-cash-register mr-2" aria-hidden="true"></i>Kasir</a>
                        <li type="button" class="list-group-item" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-user mr-2"></i>Akun</li>
                        <ul class="list-group collapse" id="account" style="border-radius:0;border:0;">
                            <a href="{{ route('profile') }}" class="list-group-item list-group-item-action pl-4">Profile</a>
                        </ul>
                        @if (Auth::user()->role == 'admin')
                        <li type="button" class="list-group-item" data-bs-toggle="collapse" data-bs-target="#produk" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-boxes mr-2"></i>Produk</li>
                        <ul class="list-group collapse" id="produk" style="border-radius:0;border:0;">
                            <a href="{{ route('products') }}" class="list-group-item list-group-item-action pl-4">Produk</a>
                            <a href="{{ route('categories') }}" class="list-group-item list-group-item-action pl-4">Kategori</a>
                            <a href="{{ route('options') }}" class="list-group-item list-group-item-action pl-4">Opsi</a>
                        </ul>
                        <li type="button" class="list-group-item" data-bs-toggle="collapse" data-bs-target="#method" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-file-invoice mr-2"></i> Pemesanan</li>
                        <ul class="list-group collapse" id="method" style="border-radius:0;border:0;">
                            <a href="{{ route('ordermethods') }}" class="list-group-item list-group-item-action pl-4">Metode Pesan</a>
                        </ul>
                        <li type="button" class="list-group-item" data-bs-toggle="collapse" data-bs-target="#reports" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-chart-line mr-2"></i> Laporan</li>
                        <ul class="list-group collapse" id="reports" style="border-radius:0;border:0;">
                            <a href="{{ route('reports') }}" class="list-group-item list-group-item-action pl-4">Laporan Transaksi</a>
                        </ul>
                        @endif
                    </ul>
                </div>
                <div class="modal-footer py-0" style="border-radius:0;">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close"><i class="fa fa-chevron-left"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal End-->
</div>
@endauth
@endif