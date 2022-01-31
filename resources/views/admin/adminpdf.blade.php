<!DOCTYPE html>
<html lang="en">

<head>
    <title>BACKOFFICE ISITAMAN</title>
</head>

<body>
    <div class="container">
        @foreach($produk as $p)

        <div class="card">
            <div class="card-body">
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
                            <td><img src="{{$p['qr']}}" alt=""></td>
                        </tr>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>
