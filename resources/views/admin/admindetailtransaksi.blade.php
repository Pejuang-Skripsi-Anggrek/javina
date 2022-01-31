@extends('/admintemplate')
@section('sidenav')
<ul class="navbar-nav">
    <li>
        <div class="text-muted small fw-bold text-uppercase px-3">
            MENU
        </div>
    </li>
    <li>
        <a href="/admin/dashboard" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
            <span>Beranda</span>
        </a>
        <a href="/admin/transaksi" class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-list"></i></span>
            <span>Transaksi</span>
        </a>
        <a href="/admin/produk" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-cart"></i></span>
            <span>Produk</span>
        </a>
        <a href="/admin/pengguna" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-person"></i></span>
            <span>Pengguna</span>
        </a>
    </li>
    <li class="my-4">
        <hr class="dropdown-divider bg-light" />
    </li>
    <li>
        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
            Akun
        </div>
    </li>
    <li>
        <a href="/admin/pengaturan" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-gear"></i></span>
            <span>Pengaturan</span>
        </a>
        <a href="/admin/logout" class="nav-link px-3" onclick="return confirm('Are you sure to logout?')">
            <span class="me-2"><i class="bi bi-door-closed"></i></span>
            <span>Logout</span>
        </a>
    </li>
</ul>
@endsection
@section('content')
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>:</th>
                            <th>{{$detailtransaksi['number']}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Nama Pembeli</th>
                            <td>:</td>
                            <td>{{$detailtransaksi['user_name']}}</td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>:</td>
                            <td>Rp. {{$detailtransaksi['total_price']}}</td>
                        </tr>
                        <tr>
                            <th>Status Pembelian</th>
                            <td>:</td>
                            @if($detailtransaksi['payment_status'] == 1)
                            <td>Belum Dibayar</td>
                            @elseif ($detailtransaksi['payment_status'] == 2)
                            <td>Sudah Dibayar</td>
                            @else
                            <td>Pembayaran Gagal</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Jumlah Barang</th>
                            <td>:</td>
                            <td>{{count($detailtransaksi['list_product'])}}</td>
                        </tr>
                        <tr>
                            <th>Kurir</th>
                            <td>:</td>
                            <td>Cahyo Express</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>Jaksel Nih Bousz</td>
                        </tr>
                        <tr>
                            <th>Status Pengiriman</th>
                            <td>:</td>
                            <td>Sudah diambil kurir</td>
                        </tr>
                        <tr>
                            <th>No. Resi</th>
                            <td>:</td>
                            <td>0123</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Spesifikasi</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Kode SKU</th>
                                    <th>QR Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailtransaksi['list_product'] as $lp)
                                <tr>
                                    <td>{{$lp['id']}}</td>
                                    <td>{{$lp['name']}}</td>
                                    <td>{{$lp['diskon']}}</td>
                                    <td>Rp. {{$lp['diskon']}}</td>
                                    <td>{{$lp['qty']}}</td>
                                    <td>UC0001</td>
                                    <td>UC0001</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal"
                    data-bs-target="#tambahModal">Tambahkan No. Resi</button>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h6>Tambahkan No. Resi</h6>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Contoh : 0123"
                        aria-label="contoh" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Tambahkan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
