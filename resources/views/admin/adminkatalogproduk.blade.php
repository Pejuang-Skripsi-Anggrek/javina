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
            <div class="col-md">
                <div class="d-grid gap-2">
                    <a href="{{ url('/admin/tambahproduk') }}" type="submit" class="btn btn-primary mb-1">Tambah
                        Produk</a>
                </div>
            </div>
        </div>
        <div class="menu-produk"></div>
        <div class="row">
            <div class="col-md">
                <form action="/admin/filterkatalog">
                    <select name="filter" id="filter">
                        <option value="1">Semua Produk</option>
                        <option value="2">Produk By Katalog</option>
                    </select>
                    <button class="btn btn-outline-secondary btn-sm">Select</button>
                </form>
            </div>
            <div class="col-md-5">
                <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                    placeholder="Masukkan Nama Produk">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
        <div class="menu-produk"></div>
        <div class="row">
            <h3>Katalog Bunga</h3>
            @foreach($data1 as $p)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">
                            {{ $p['name']}}
                        </h5>
                        <p class="price-text">Rp. <span id="productprice"
                                class="productprice">{{ $p['spec'][0]['base_price']}}</span></p>
                    </div>
                    <div class="card-body">
                        <img class="img_produk" src="{{ $p['list_picture'][0]['url']}}" alt="Image Profile"
                            class="mb-4">
                        <p class="card-text">
                            {{ $p['desc']}}
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        <a class="btn-adm" href="/admin/detailproduk/{{$p['id']}}">
                            <span>Detail Produk</span>
                            <i class="bi bi-arrow-right-square ic_detail"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="menu-produk"></div>
        <div class="row">
            <h3>Katalog Bibit</h3>
            @foreach($data2 as $p)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">
                            {{ $p['name']}}
                        </h5>
                        <p class="price-text">Rp. <span id="productprice"
                                class="productprice">{{ $p['spec'][0]['base_price']}}</span></p>
                    </div>
                    <div class="card-body">
                        <img class="img_produk" src="{{ $p['list_picture'][0]['url']}}" alt="Image Profile"
                            class="mb-4">
                        <p class="card-text">
                            {{ $p['desc']}}
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        <a class="btn-adm" href="/admin/detailproduk/{{$p['id']}}">
                            <span>Detail Produk</span>
                            <i class="bi bi-arrow-right-square ic_detail"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="menu-produk"></div>
        <div class="row">
            <h3>Katalog Alat</h3>
            @foreach($data3 as $p)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">
                            {{ $p['name']}}
                        </h5>
                        <p class="price-text">Rp. <span id="productprice"
                                class="productprice">{{ $p['spec'][0]['base_price']}}</span></p>
                    </div>
                    <div class="card-body">
                        <img class="img_produk" src="{{ $p['list_picture'][0]['url']}}" alt="Image Profile"
                            class="mb-4">
                        <p class="card-text">
                            {{ $p['desc']}}
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        <a class="btn-adm" href="/admin/detailproduk/{{$p['id']}}">
                            <span>Detail Produk</span>
                            <i class="bi bi-arrow-right-square ic_detail"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="menu-produk"></div>
        <div class="row">
            <h3>Katalog Bahan</h3>
            @foreach($data4 as $p)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title">
                            {{ $p['name']}}
                        </h5>
                        <p class="price-text">Rp. <span id="productprice"
                                class="productprice">{{ $p['spec'][0]['base_price']}}</span></p>
                    </div>
                    <div class="card-body">
                        <img class="img_produk" src="{{ $p['list_picture'][0]['url']}}" alt="Image Profile"
                            class="mb-4">
                        <p class="card-text">
                            {{ $p['desc']}}
                        </p>
                    </div>
                    <div class="card-footer d-flex">
                        <a class="btn-adm" href="/admin/detailproduk/{{$p['id']}}">
                            <span>Detail Produk</span>
                            <i class="bi bi-arrow-right-square ic_detail"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="menu-produk"></div>
    </div>
</main>
@endsection
