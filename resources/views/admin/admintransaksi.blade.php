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
            <div class="col-md-12 mb-3">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="justify-content-center">Data Transaksi</h3>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped data-table" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Order Id</th>
                                        <th>Total Harga</th>
                                        <th>Status Pembayaran</th>
                                        <th>Jumlah Barang</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksi as $t)
                                    <tr>
                                        <td>{{$t['id']}}</td>
                                        <td>{{$t['user_name']}}</td>
                                        <td>{{$t['number']}}</td>
                                        <td class="productprice">{{$t['total_price']}}</td>
                                        @if($t['payment_status'] == 1)
                                        <td>Belum Dibayar</td>
                                        @elseif ($t['payment_status'] == 2)
                                        <td>Sudah Dibayar</td>
                                        @else
                                        <td>Pembayaran Gagal</td>
                                        @endif
                                        <td>{{count($t['list_product'])}}</td>
                                        <td><a href="/admin/detailtransaksi/{{$t['id']}}/{{$t['id_user']}}" class="bi bi-arrow-right"></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
