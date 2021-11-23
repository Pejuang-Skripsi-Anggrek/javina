@extends('/admintemplate')
@section('header')
<link rel="stylesheet" href="{!! asset('assets/css/admin/css/setting.css') !!}">
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
        <a href="/admin/pengaturan" class="nav-link px-3 active">
            <span class="me-2"><i class="bi bi-gear"></i></span>
            <span>Pengaturan</span>
        </a>
        <a href="#" class="nav-link px-3" onclick="return confirm('Are you sure to logout?')">
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
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Pengaturan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="card">
                            <div class="card-header">
                                Akun Saya
                            </div>
                            <div class="card-body">
                                <h6 class="mb-4">
                                    Informasi Pengguna
                                </h6>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>Nama</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>: {{ $name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>: {{ $email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p>Alamat</p>
                                    </div>
                                    <div class="col-md-8">
                                        <p>: Jl. Tumapel Barat No.85, Kelurahan Pangetan, Kecamatan Singosari, Kabupaten Malang, Jatim, Indonesia.</p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-success" type="button">Ubah Pengaturan</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}" alt="Image Profile" class="mb-4">
                                <h5 class="text-align-center">
                                    Naufal Widhi
                                </h5>
                                <p class="paragraph-align-center">
                                    {{ $message }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection