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
                    Atur Katalog
                </h3>
            </div>
        </div>
        <div class="row c-pro">
            @foreach($catalog as $c)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        {{$c['id']}}. {{$c['name']}}
                    </div>
                    <div class="card-footer">
                    <a href="/admin/deletekatalog/{{$c['id']}}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row c-pro">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form class="form-box px-3" method="POST" action="/admin/tambahkatalog">
                            @csrf
                            <div class="form-input">
                                <h6>Tambah Katalog</h6>
                                <input id="namakatalog" type="text" name="namakatalog" placeholder="Nama Katalog"
                                    tabindex="10" required>
                                <button type="submit" class="btn btn-primary">
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
