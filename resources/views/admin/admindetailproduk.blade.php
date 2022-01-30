@extends('/admintemplate')
@section('header')
<link rel="stylesheet" href="{!! asset('assets/css/admin/css/detailproduk.css') !!}">
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
            <div class="col-lg-5 col-md-5">
                <img class="img_produk" src="{{$produkgambar}}" alt="Image Profile">
            </div>
            <div class="col-lg-7 col-md-7 contain">
                <h1>{{$produkname}}</h1>
                <div class="price_box">
                    <span id="price" class="current_price">Rp. {{$produkharga}}</span>
                </div>
                <table class="table table-responsive">
                    <tbody>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>{{$produkkatalog}}</td>
                        </tr>
                        <tr>
                            <td>Warna</td>
                            <td>:</td>
                            <td>{{$produkwarna}}</td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td>{{$produkjenis}}</td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td>{{$produkstok}}</td>
                        </tr>
                        <tr>
                            <td>Kode SKU</td>
                            <td>:</td>
                            <td>{{$produksku}}</td>
                        </tr>
                        <tr>
                            <td>QR Code</td>
                            <td>:</td>
                            <td><img src="{{$produksqrcode}}" alt="QR Code"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">Description</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                    aria-selected="false">Specification</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p class="product_content">{{$produkdesc}}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_d_table">
                                <table>
                                    <thead> <span class="title_spec"> Informasi Produk </span></thead>
                                    <tbody>
                                        <tr>
                                            <td class="first_child">Cahaya</td>
                                            <td>{{$produksinfovalue1}}</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Temperature</td>
                                            <td>{{$produksinfovalue2}}</td>
                                        </tr>
                                        <tr>
                                            <td class="first_child">Air</td>
                                            <td>{{$produksinfovalue3}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <thead> <span class="title_spec"> Spesifikasi Produk </span></thead>
                                    <tbody>
                                        <tr>
                                            <td class="first_child">Kondisi</td>
                                            <td class="first_child">Harga</td>
                                        </tr>
                                        @foreach($produksspec as $ps)
                                        <tr>
                                            <td>{{$ps['name_spec']}}</td>
                                            <td>Rp {{$ps['base_price']}}</td>
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
        <div class="row">
            <div class="col-md">
                <a href="/admin/deleteproduk/{{$produkid}}" onclick="return confirm('Apakah anda yakin ?')"
                    class="btn btn-danger btn-adm">Hapus</a>
                <a href="/admin/editproduk/{{$produkid}}" class="btn btn-warning btn-adm">Edit</a>
            </div>
        </div>
    </div>
</main>

@endsection
