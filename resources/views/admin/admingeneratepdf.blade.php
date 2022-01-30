<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{!! asset('assets/css/admin/css/bootstrap.min.css') !!}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{!! asset('assets/css/admin/css/dataTables.bootstrap5.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/admin/css/generatepdf.css') !!}" />
    <link rel="icon" href="{!! asset('assets/img/admin/logo.ico') !!}" type="image/x-icon">
    <title>BACKOFFICE ISITAMAN</title>
</head>

<body>
    <div class="container">
        @foreach($produk as $p)
        <div class="contain my-5 py-5">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <img style="margin-top: 10px; width: 450px; height: 450px;" class="img_produk" src="{{$p['list_picture'][0]['url']}}" alt="Image Profile">
                </div>
                <div class="col-lg-7 col-md-7 contain">
                    <h1>{{ $p['name']}}</h1>
                    <div class="price_box">
                        <span style="font-weight: 500; font-size: 24px; color: #79a206;" id="price" class="current_price">Rp. {{ $p['spec'][0]['base_price']}}</span>
                    </div>
                    <table class="table table-responsive">
                        <tbody>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td>{{$p['list_detail_catalog'][0]['name']}}</td>
                            </tr>
                            <tr>
                                <td>Warna</td>
                                <td>:</td>
                                <td>{{$p['warna']}}</td>
                            </tr>
                            <tr>
                                <td>Jenis</td>
                                <td>:</td>
                                <td>{{$p['jenis']}}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td>{{$p['stok']}}</td>
                            </tr>
                            <tr>
                                <td>Kode SKU</td>
                                <td>:</td>
                                <td>{{$p['sku_code']}}</td>
                            </tr>
                            <tr>
                                <td>QR Code</td>
                                <td>:</td>
                                <td><img id="qrcode" src="{{$p['qr']}}" alt="QR Code"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="col-md">
                        <h3>Deskripsi</h3>
                        <p>{{$p['desc']}}</p>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-responsive">
                            <thead> <h3> Informasi Produk </h3></thead>
                            <tbody>
                                @foreach($p['info'] as $i)
                                <tr>
                                    <td class="first_child">{{$i['parameter']}}</td>
                                    <td>:</td>
                                    <td>{{$i['value']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table class="table table-responsive">
                            <thead> <h3> Spesifikasi Produk </h3></thead>
                            <tbody>
                                <tr>
                                    <td class="first_child">Kondisi</td>
                                    <td class="first_child">Harga</td>
                                </tr>
                                @foreach($p['spec'] as $ps)
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
        @endforeach
    </div>

    <script src="{!! asset('assets/js/admin/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{!! asset('assets/js/admin/js/jquery-3.5.1.js') !!}"></script>
    <script src="{!! asset('assets/js/admin/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('assets/js/admin/js/dataTables.bootstrap5.min.js') !!}"></script>
    <script src="{!! asset('assets/js/admin/js/script.js') !!}"></script>
</body>

</html>
