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
                                    <img id="createProductImage" src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}"
                                        alt="Image Profile" class="mb-4">
                                    <input id="createProductImageInput" type="file" name="image" required>
                                </div>
                                <div class="col-md-4 diff">
                                    <div class="form-input">
                                        <h6>Nama Produk</h6>
                                        <input id="namaproduk" type="text" name="namaproduk" placeholder="Nama Produk"
                                            tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <h6>Kode SKU</h6>
                                        <input id="skuproduk" type="text" name="skuproduk" placeholder="Kode SKU"
                                            tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <h6>Diskon Produk</h6>
                                        <input id="diskonproduk" type="text" name="diskonproduk"
                                            placeholder="Diskon Produk (%)" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6>Berat Produk</h6>
                                        <input id="beratproduk" type="text" name="beratproduk"
                                            placeholder="Berat Produk (Kg)" tabindex="10" required>
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
                                    <div class="form-input">
                                        <h6>Katalog Produk</h6>
                                        <select id="katalogproduk" class="custom-select" name="katalogproduk">
                                            @foreach ($catalog as $c)
                                            <option value="{{ $c['id'] }}" selected>{{ $c['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-input">
                                        <a id="addnewcatalog" class="btn btn-warning">Tambahkan katalog baru</a>
                                        <div id="addnewcatalogcontainer"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4>Spesifikasi Produk</h4>
                                    <div class="form-input">
                                        <h6>Kondisi Produk</h6>
                                        <input id="kondisiproduk" type="text" name="kondisiproduk"
                                            placeholder="Seedling" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6>Tinggi Produk</h6>
                                        <input id="tinggiproduk" type="text" name="tinggiproduk"
                                            placeholder="Ukuran Daun 5 cm" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6>Harga Produk</h6>
                                        <input id="hargaproduk" type="text" name="hargaproduk"
                                            placeholder="10000" tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <a id="addspecsopt" class="btn btn-warning"><i class="bi bi-arrow-down"></i>
                                            Tambahkan Spesifikasi Lain</a>
                                        <a id="gajadiaddspecsopt" class="btn btn-warning"><i class="bi bi-arrow-up"></i>
                                            Kembali</a>
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titlekondisiproduk2">Kondisi Produk 2 (Optional)</h6>
                                        <input id="kondisiproduk2" type="text" name="kondisiproduk2"
                                            placeholder="Kondisi Produk 2 (Optional)" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titletinggiproduk2">Tinggi Produk 2 (Optional)</h6>
                                        <input id="tinggiproduk2" type="text" name="tinggiproduk2"
                                            placeholder="Tinggi Produk 2 (Optional)" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titlehargaproduk2">Harga Produk 2 (Optional)</h6>
                                        <input id="hargaproduk2" type="text" name="hargaproduk2"
                                            placeholder="Harga Produk 2 (Optional)" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titlekondisiproduk3">Kondisi Produk 3 (Optional)</h6>
                                        <input id="kondisiproduk3" type="text" name="kondisiproduk3"
                                            placeholder="Kondisi Produk 3 (Optional)" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titletinggiproduk3">Tinggi Produk 3 (Optional)</h6>
                                        <input id="tinggiproduk3" type="text" name="tinggiproduk3"
                                            placeholder="Tinggi Produk 3 (Optional)" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titlehargaproduk3">Harga Produk 3 (Optional)</h6>
                                        <input id="hargaproduk3" type="text" name="hargaproduk3"
                                            placeholder="Harga Produk 3 (Optional)" tabindex="10">
                                    </div>
                                    <div class="divide"></div>
                                    <h4>Informasi Produk</h4>
                                    <div class="form-input">
                                        <h6 id="titleinfo1">Informasi Produk 1</h6>
                                        <div id="titleinfo1input"></div>
                                        <input id="valueinfoproduk1" type="text" name="valueinfoproduk1"
                                            placeholder="Jangan Terkena Cahaya Terlalu Banyak" tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titleinfo2">Informasi Produk 2</h6>
                                        <div id="titleinfo2input"></div>
                                        <input id="valueinfoproduk2" type="text" name="valueinfoproduk2"
                                            placeholder="Jangan Terkena Air Terlalu Banyak" tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <h6 id="titleinfo3">Informasi Produk 3</h6>
                                        <div id="titleinfo3input"></div>
                                        <input id="valueinfoproduk3" type="text" name="valueinfoproduk3"
                                            placeholder="Suka Suhu Udara Lembab" tabindex="10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row specs">
                                <div class="col-md-12">
                                    <div class="form-input">
                                        <h6>Deskripsi Produk</h6>
                                        <textarea row="3" col="50" wrap="hard" class="textarea" id="deskripsiproduk"
                                            name="deskripsiproduk" placeholder="Deskripsi Produk"
                                            tabindex="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btnadd">
                                submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
