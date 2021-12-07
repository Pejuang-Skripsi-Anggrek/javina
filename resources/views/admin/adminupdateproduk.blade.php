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
                    Update Produk
                </h3>
            </div>
        </div>
        <div class="row c-pro">
            <div class="col-md-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form class="form-box px-3" method="POST" action="/admin/updateproduk">
                            @method('PUT')
                            @csrf
                            <input type="text" name="id" value="{{ $produkid }}" hidden>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}" alt="Image Profile"
                                        class="mb-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-input">
                                        <h6>Nama Produk</h6>
                                        <input id="namaproduk" type="text" name="namaproduk"
                                            value="{{$produkname}}" tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <h6>Deskripsi Produk</h6>
                                        <input id="deskripsiproduk" type="text" name="deskripsiproduk"
                                            value="{{$produkdesc}}" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6>Harga Produk</h6>
                                        <input id="hargaproduk" type="text" name="hargaproduk"
                                            value="{{$produkharga}}" tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <h6>Katalog Produk: </h6>{{$produkkatalog}}
                                        <select class="custom-select" name="katalogproduk">
                                        @foreach($catalog as $c)
                                            <option value="{{ $c['id']}}">{{$c['name'] }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-input">
                                        <h6>Tinggi Produk</h6>
                                        <input id="tinggiproduk" type="text" name="tinggiproduk"
                                            value="{{$produktinggi}}" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6>Berat Produk</h6>
                                        <input id="beratproduk" type="text" name="beratproduk"
                                            value="{{$produkberat}}" tabindex="10" required>
                                    </div>
                                    <div class="form-input">
                                        <h6>Warna Produk</h6>
                                        <input id="warnaproduk" type="text" name="warnaproduk"
                                            value="{{$produkwarna}}" tabindex="10">
                                    </div>
                                    <div class="form-input">
                                        <h6>Jenis Produk</h6>
                                        <input id="jenisproduk" type="text" name="jenisproduk"
                                            value="{{$produkjenis}}" tabindex="10">
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
