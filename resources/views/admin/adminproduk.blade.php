@extends('/admintemplate')
@section('header')
<link rel="stylesheet" href="{!! asset('assets/css/admin/css/produk.css') !!}">
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
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Produk
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                        placeholder="Masukkan Nama Produk">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>
        <div class="row pro">
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>
                            Anggrek Hitam Papua
                        </h5>
                    </div>
                    <div class="card-body">
                        <img src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}" alt="Image Profile" class="mb-4">
                        <p class="card-text">
                            Suku anggrek-anggrekan (bahasa Latin: Orchidaceae) merupakan satu suku tumbuhan berbunga
                            dengan anggota jenis terbanyak. Jenis-jenisnya tersebar luas dari daerah tropika basah
                            hingga wilayah sirkumpolar, meskipun sebagian besar anggotanya ditemukan di daerah tropika.
                            Kebanyakan anggota suku ini hidup sebagai epifit, terutama yang berasal dari daerah tropika
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        Harga Rp 2.000.000,-
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>
                            Anggrek Hitam Papua
                        </h5>
                    </div>
                    <div class="card-body">
                        <img src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}" alt="Image Profile" class="mb-4">
                        <p class="card-text">
                            Suku anggrek-anggrekan (bahasa Latin: Orchidaceae) merupakan satu suku tumbuhan berbunga
                            dengan anggota jenis terbanyak. Jenis-jenisnya tersebar luas dari daerah tropika basah
                            hingga wilayah sirkumpolar, meskipun sebagian besar anggotanya ditemukan di daerah tropika.
                            Kebanyakan anggota suku ini hidup sebagai epifit, terutama yang berasal dari daerah tropika
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        Harga Rp 2.000.000,-
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>
                            Anggrek Hitam Papua
                        </h5>
                    </div>
                    <div class="card-body">
                        <img src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}" alt="Image Profile" class="mb-4">
                        <p class="card-text">
                            Suku anggrek-anggrekan (bahasa Latin: Orchidaceae) merupakan satu suku tumbuhan berbunga
                            dengan anggota jenis terbanyak. Jenis-jenisnya tersebar luas dari daerah tropika basah
                            hingga wilayah sirkumpolar, meskipun sebagian besar anggotanya ditemukan di daerah tropika.
                            Kebanyakan anggota suku ini hidup sebagai epifit, terutama yang berasal dari daerah tropika
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        Harga Rp 2.000.000,-
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5>
                            Anggrek Hitam Papua
                        </h5>
                    </div>
                    <div class="card-body">
                        <img src="{!! asset('assets/img/admin/imagecontoh.jpg') !!}" alt="Image Profile" class="mb-4">
                        <p class="card-text">
                            Suku anggrek-anggrekan (bahasa Latin: Orchidaceae) merupakan satu suku tumbuhan berbunga
                            dengan anggota jenis terbanyak. Jenis-jenisnya tersebar luas dari daerah tropika basah
                            hingga wilayah sirkumpolar, meskipun sebagian besar anggotanya ditemukan di daerah tropika.
                            Kebanyakan anggota suku ini hidup sebagai epifit, terutama yang berasal dari daerah tropika
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        Harga Rp 2.000.000,-
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
