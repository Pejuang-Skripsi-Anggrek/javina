@extends('/admintemplate')
@section('header')
    <link rel="stylesheet" href="{!! asset('assets/css/admin/css/addproduk.css') !!}">
@endsection
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
            <a href="/admin/transaksi" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-list"></i></span>
                <span>Transaksi</span>
            </a>
            <a href="/admin/produk" class="nav-link px-3 active">
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
                    <h3 class="h-pro">
                        Tambah Produk
                    </h3>
                </div>
            </div>
            <div class="row c-pro">
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <form class="form-box px-3" method="POST" action="/admin/addproduk"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <img id="createProductImage" src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}" alt="Image Profile"
                                            class="mb-4">
                                        <input id="createProductImageInput" type="file" name="image" required>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-input">
                                            <h6>Nama Produk</h6>
                                            <input id="namaproduk" type="text" name="namaproduk" placeholder="Nama Produk"
                                                tabindex="10" required>
                                        </div>
                                        <div class="form-input">
                                            <h6>Deskripsi Produk</h6>
                                            <input id="deskripsiproduk" type="text" name="deskripsiproduk"
                                                placeholder="Deskripsi Produk" tabindex="10">
                                        </div>
                                        <div class="form-input">
                                            <h6>Harga Produk</h6>
                                            <input id="hargaproduk" type="text" name="hargaproduk"
                                                placeholder="Harga Produk" tabindex="10" required>
                                        </div>
                                        <div class="form-input">
                                            <h6>Diskon Produk</h6>
                                            <input id="diskonproduk" type="text" name="diskonproduk"
                                                placeholder="Diskon Produk (%)" tabindex="10">
                                        </div>
                                        <div class="form-input">
                                            <h6>Katalog Produk</h6>
                                            <select class="custom-select" name="katalogproduk">
                                                @foreach ($catalog as $c)
                                                    <option value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-input">
                                            <h6>Tambah Katalog Produk</h6>
                                            <input id="tambahkatalog" type="text" name="tambahkatalog"
                                                placeholder="Tambahkan Katalog Produk" tabindex="10">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-input">
                                            <h6>Tinggi Produk</h6>
                                            <input id="tinggiproduk" type="text" name="tinggiproduk"
                                                placeholder="Tinggi Produk" tabindex="10">
                                        </div>
                                        <div class="form-input">
                                            <h6>Berat Produk</h6>
                                            <input id="beratproduk" type="text" name="beratproduk"
                                                placeholder="Berat Produk" tabindex="10" required>
                                        </div>
                                        <div class="form-input">
                                            <h6>Warna Produk</h6>
                                            <input id="warnaproduk" type="text" name="warnaproduk"
                                                placeholder="Warna Produk" tabindex="10">
                                        </div>
                                        <div class="form-input">
                                            <h6>Jenis Produk</h6>
                                            <input id="jenisproduk" type="text" name="jenisproduk"
                                                placeholder="Jenis Produk" tabindex="10">
                                        </div>
                                        <div class="form-input">
                                            <h6>Stok Produk</h6>
                                            <input id="stokproduk" type="text" name="stokproduk" placeholder="Stok Produk"
                                                tabindex="10" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btnadd">
                                        submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
