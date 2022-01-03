<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function dashboard()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        // dd($token);
        if ($token != null) {

            $product = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/product');

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/users');

            $transaksi = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/transactions/all');

            $data['totalproduct'] = count($product['product']);
            $data['totalusers'] = count($user['users']);
            $data['totaltransaksi'] = count($transaksi['transaction']);

            return view('admin.admindashboard', $data);
        }
        return redirect('/admin/login');

        //================ GET DATA DASHBOARD DARI API ================\\

    }
    public function transaksi()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if ($token != null) {
            $transaksi = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/transactions/all');

            $data['transaksi'] = $transaksi["transaction"];
            // $data1['transaksi1'] = $transaksi["transaction"];
            // $user = Http::withHeaders([
            //     'Accept' => 'application/json',
            //     'X-Requested-With' => 'XMLHttpRequest',
            //     'Authorization' => "Bearer ".$token
            // ])->get('https://api.isitaman.com/api/users');

            return view('admin.admintransaksi', $data);
        }
        return redirect('/admin/login');

        //================ GET DATA DASHBOARD DARI API ================\\

    }
    public function produk()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if ($token != null) {

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/product');

            //======================= Array di dalam Array =======================\\
            // $noarr = count($response['product']);
            // for($arr = 0; $arr < $noarr; $arr++){
            //     $data1[$arr] = $response['product'][$arr]['detail_product'];
            // }
            // $data['produk'] = $data1;
            //======================= Array di dalam Array =======================\\
            
            $data['produk'] = $response['product'];
            return view('admin.adminproduk', $data);
        }
        return redirect('/admin/login');

        //================ GET DATA DASHBOARD DARI API ================\\

    }
    public function pengguna()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if ($token != null) {
            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/users');

            $data['user'] = $user["users"];
            return view('admin.adminuser', $data);
        }
        return redirect('/admin/login');

        //================ GET DATA DASHBOARD DARI API ================\\

    }
    public function pengaturan()
    {
        //================ CEK TOKEN ================\\
        $val = session()->get("coba");
        if ($val != null) {
            //================ GET DATA ================\\
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $val,
            ])->get('https://api.isitaman.com/api/user');
            //================ CEK RESPONSE ================\\
            $message = $response['message'];
            $name = $response['profile'];

            if ($message == "Unauthenticated.") {
                return redirect('/admin/login');
            }
            //================ IF SUCCESS ================\\
            $data['message'] = $message;
            $data['name'] = $name['name'];
            $data['email'] = $name['email'];
            // dd($data);
            return view('admin.adminsetting', $data);
        }
        return redirect('/admin/login');

        //================ GET DATA DASHBOARD DARI API ================\\
    }

    //================================ CRUD PRODUK ================================\\
    public function tambahproduk()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if ($token != null) {
            // $user = Http::withHeaders([
            //     'Accept' => 'application/json',
            //     'X-Requested-With' => 'XMLHttpRequest',
            //     'Authorization' => "Bearer ".$token
            // ])->get('https://api.isitaman.com/api/user');

            // $id_user = $user["profile"]["id"];

            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/catalogs');

            $data['catalog'] = $catalog["catalog"];
            return view('admin.admincreateproduk', $data);
        }
        return redirect('/admin/login');
    }

    public function addproduk(Request $request)
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if ($token != null) {
            $namaproduk = $request->namaproduk;
            $deskripsiproduk = $request->deskripsiproduk;
            $tinggiproduk = $request->tinggiproduk;
            $beratproduk = $request->beratproduk;
            $warnaproduk = $request->warnaproduk;
            $jenisproduk = $request->jenisproduk;
            $stokproduk = $request->stokproduk;
            $diskonproduk = $request->diskonproduk;
            $catalogproduk = $request->katalogproduk;
            $tambahkatalog = $request->tambahkatalog;

            //============== SKU =============\\
            $kodesku = $request->skuproduk;

            //============== Specs =============\\
            $namespec = $request->kondisiproduk;
            $hargaproduk = $request->hargaproduk;
            $namespec1 = $request->kondisiproduk2;
            $hargaproduk1 = $request->hargaproduk2;
            $namespec2 = $request->kondisiproduk3;
            $hargaproduk2 = $request->hargaproduk3;

            //============== Info =============\\
            $titleinfoproduk1 = $request->titleinfoproduk1;
            $valueinfoproduk1 = $request->valueinfoproduk1;
            $titleinfoproduk2 = $request->titleinfoproduk2;
            $valueinfoproduk2 = $request->valueinfoproduk2;
            $titleinfoproduk3 = $request->titleinfoproduk3;
            $valueinfoproduk3 = $request->valueinfoproduk3;

            //========== Foto ============\\
            $resource = $request->file('image');
            $nameresource = $resource->getClientOriginalName();
            $resource->move("images/", $nameresource);

            $publishproduk = $hargaproduk - ($hargaproduk * ($diskonproduk / 100));
            $publishproduk1 = $hargaproduk1 - ($hargaproduk1 * ($diskonproduk / 100));
            $publishproduk2 = $hargaproduk2 - ($hargaproduk2 * ($diskonproduk / 100));

            //================== Katalog ================\\
            $namecatalog = "";

            if ($tambahkatalog) {
                $catalogutama = array('id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog);
                $tambahcatalog = array('id_catalog' => null,
                    'name_catalog' => $tambahkatalog);
                $catalog[0] = $catalogutama;
                $catalog[1] = $tambahcatalog;
            } elseif (!$tambahkatalog) {
                $catalogutama = array('id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog);
                $catalog[0] = $catalogutama;
            }

            //============= Spec =============\\
            if(empty($namespec1) and empty($hargaproduk1) and empty($namespec2) and empty($hargaproduk2)){
                $spec1 = array('name_spec' => $namespec,
                    'base_price' => $hargaproduk,
                    'publish_price' => $publishproduk);
                $spec[0] = $spec1;
            }
            if(isset($namespec1) and isset($hargaproduk1) and empty($namespec2) and empty($hargaproduk2)){
                $spec1 = array('name_spec' => $namespec,
                'base_price' => $hargaproduk,
                'publish_price' => $publishproduk);
                $spec2 = array('name_spec' => $namespec1,
                'base_price' => $hargaproduk1,
                'publish_price' => $publishproduk1);
                $spec[0] = $spec1;
                $spec[1] = $spec2;
            }
            if(empty($namespec1) and empty($hargaproduk1) and isset($namespec2) and isset($hargaproduk2)){
                $spec1 = array('name_spec' => $namespec,
                'base_price' => $hargaproduk,
                'publish_price' => $publishproduk);
                $spec2 = array('name_spec' => $namespec2,
                'base_price' => $hargaproduk2,
                'publish_price' => $publishproduk2);
                $spec[0] = $spec1;
                $spec[1] = $spec2;
            }
            if(isset($namespec1) and isset($hargaproduk1) and isset($namespec2) and isset($hargaproduk2)){
                $spec1 = array('name_spec' => $namespec,
                    'base_price' => $hargaproduk,
                    'publish_price' => $publishproduk);
                $spec2 = array('name_spec' => $namespec1,
                    'base_price' => $hargaproduk1,
                    'publish_price' => $publishproduk1);
                $spec3 = array('name_spec' => $namespec2,
                    'base_price' => $hargaproduk2,
                    'publish_price' => $publishproduk2);
                $spec[0] = $spec1;
                $spec[1] = $spec2;
                $spec[2] = $spec3;
            }
            $catalogutama = array('id_catalog' => $catalogproduk,
                            'name_catalog' => $namecatalog);
            $tambahcatalog = array('id_catalog' => null,
                             'name_catalog' => $tambahkatalog);

            $catalog[0] = $catalogutama;
            $catalog[1] = $tambahcatalog;

            //============= Info ==============\\
            $info1 = array('parameter' => $titleinfoproduk1,
                'value' => $valueinfoproduk1);
            $info2 = array('parameter' => $titleinfoproduk2,
                'value' => $valueinfoproduk2);
            $info3 = array('parameter' => $titleinfoproduk3,
                'value' => $valueinfoproduk3);
            $info[0] = $info1;
            $info[1] = $info2;
            $info[2] = $info3;
            
            //============== Add to API Product ============\\
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->post('https://api.isitaman.com/api/product', [
                'name' => $namaproduk,
                'desc' => $deskripsiproduk,
                'tinggi' => $tinggiproduk,
                'berat' => $beratproduk,
                'warna' => $warnaproduk,
                'jenis' => $jenisproduk,
                'stok' => $stokproduk,
                'diskon' => $diskonproduk,
                'catalog' => $catalog,
                'info' => $info,
                'spec' => $spec,
            ]);

            if (!$response) {
                return "Data gagal ditambahkan";
            }
            $id_product = $response["product"][0]["id"];

            //============= Add Foto to API =============\\
            $image = fopen('images/' . $nameresource, 'r');
            $responsepict = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->attach('image', $image, $nameresource)->post('https://api.isitaman.com/api/prod/uploadPhoto', [
                'id_product' => $id_product,
            ]);
            unlink('images/' . $nameresource);

            $responsesku = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->post('https://api.isitaman.com/api/sku', [
                'id_product' => $id_product,
                'sku_code' => $kodesku,
            ]);

            return redirect('/admin/produk');
        }
        return redirect('/admin/login');
    }

    public function detailproduk($id){
        $token = session()->get("coba");
        if ($token != null) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/product/1', [
                'id' => $id,
            ]);

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/user');

            $id_user = $user["profile"]["id"];

            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/catalogs', [
                'id' => $id_user,
            ]);
            //======================= Array di dalam Array =======================\\
            // $data['produk'] = $response["product"]["detail_product"];

            $sku = $response["product"]['sku']['sku_code'];
            $kodesku = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/qrcode', [
                'sku' => $sku,
            ]);
            $qrcode = $kodesku["qrcode"];

            $data['produkid'] = $response["product"]['id'];
            $data['produkname'] = $response["product"]['name'];
            $data['produkdesc'] = $response["product"]['desc'];
            $data['produkharga'] = $response["product"]['spec'][0]['base_price'];
            $data['produksku'] = $sku;
            $data['produksspec'] = $response["product"]['spec'];
            $data['produksinfovalue1'] = $response["product"]['info'][0]['value'];
            $data['produksinfovalue2'] = $response["product"]['info'][1]['value'];
            $data['produksinfovalue3'] = $response["product"]['info'][2]['value'];
            $data['produksinfoparam1'] = $response["product"]['info'][0]['parameter'];
            $data['produksinfoparam2'] = $response["product"]['info'][1]['parameter'];
            $data['produksinfoparam3'] = $response["product"]['info'][2]['parameter'];
            $data['produkkatalog'] = $response["product"]['list_detail_catalog'][0]['name'];
            $data['produkgambar'] = $response["product"]['list_picture'][0]['url'];
            $data['produktinggi'] = $response["product"]['tinggi'];
            $data['produkberat'] = $response["product"]['berat'];
            $data['produkwarna'] = $response["product"]['warna'];
            $data['produkjenis'] = $response["product"]['jenis'];
            $data['produkstok'] = $response["product"]['stok'];
            $data['produkdiskon'] = $response["product"]['diskon'];
            $data['produksqrcode'] = $qrcode;
            $data['catalog'] = $catalog["catalog"];
            
            return view('admin.admindetailproduk', $data);
        }
        return redirect('/admin/login');
        
    }

    public function editproduk($id)
    {
        $token = session()->get("coba");
        if ($token != null) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/product/1', [
                'id' => $id,
            ]);

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/user');

            $id_user = $user["profile"]["id"];

            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/catalogs', [
                'id' => $id_user,
            ]);
            //======================= Array di dalam Array =======================\\
            // $data['produk'] = $response["product"]["detail_product"];

            $sku = $response["product"]['sku']['sku_code'];
            $kodesku = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('https://api.isitaman.com/api/qrcode', [
                'sku' => $sku,
            ]);
            $qrcode = $kodesku["qrcode"];

            $data['produkid'] = $response["product"]['id'];
            $data['produkname'] = $response["product"]['name'];
            $data['produkdesc'] = $response["product"]['desc'];
            $data['produkharga'] = $response["product"]['spec'][0]['base_price'];
            $data['produksku'] = $sku;
            $data['produksnamespec'] = $response["product"]['spec'][0]['name_spec'];
            $data['produksinfovalue1'] = $response["product"]['info'][0]['value'];
            $data['produksinfovalue2'] = $response["product"]['info'][1]['value'];
            $data['produksinfovalue3'] = $response["product"]['info'][2]['value'];
            $data['produksinfoparam1'] = $response["product"]['info'][0]['parameter'];
            $data['produksinfoparam2'] = $response["product"]['info'][1]['parameter'];
            $data['produksinfoparam3'] = $response["product"]['info'][2]['parameter'];
            $data['produkkatalog'] = $response["product"]['list_detail_catalog'][0]['name'];
            $data['produkgambar'] = $response["product"]['list_picture'][0]['url'];
            $data['produktinggi'] = $response["product"]['tinggi'];
            $data['produkberat'] = $response["product"]['berat'];
            $data['produkwarna'] = $response["product"]['warna'];
            $data['produkjenis'] = $response["product"]['jenis'];
            $data['produkstok'] = $response["product"]['stok'];
            $data['produkdiskon'] = $response["product"]['diskon'];
            $data['produksqrcode'] = $qrcode;
            $data['catalog'] = $catalog["catalog"];
            
            return view('admin.adminupdateproduk', $data);
        }
        return redirect('/admin/login');
    }

    public function updateproduk(Request $request)
    {
        $token = session()->get("coba");
        if ($token != null) {
            $id = $request->id;
            $namaproduk = $request->namaproduk;
            $deskripsiproduk = $request->deskripsiproduk;
            $hargaproduk = $request->hargaproduk;
            $beratproduk = $request->beratproduk;
            $tinggiproduk = $request->tinggiproduk;
            $warnaproduk = $request->warnaproduk;
            $jenisproduk = $request->jenisproduk;
            $catalogproduk = $request->katalogproduk;
            $tambahkatalog = $request->tambahkatalog;
            $diskonproduk = $request->diskonproduk;
            $stokproduk = $request->stokproduk;

            $publishproduk = $hargaproduk - ($hargaproduk * ($diskonproduk / 100));

            if (!$namaproduk || !$deskripsiproduk || !$hargaproduk || !$catalogproduk) {
                return "Masukkan Data Nama, Deskripsi, Katalog dan Harga";
            }

            $namecatalog = "";
            if ($catalogproduk == 1) {
                $namecatalog = "Bunga";
            }
            if ($catalogproduk == 2) {
                $namecatalog = "Bibit";
            }
            if ($catalogproduk == 3) {
                $namecatalog = "Alat";
            }
            if ($catalogproduk == 4) {
                $namecatalog = "Bahan";
            }
            

            if ($tambahkatalog) {
                $catalogutama = array('id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog);
                $tambahcatalog = array('id_catalog' => null,
                    'name_catalog' => $tambahkatalog);
                $catalog[0] = $catalogutama;
                $catalog[1] = $tambahcatalog;
            } elseif (!$tambahkatalog) {
                $catalogutama = array('id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog);
                $catalog[0] = $catalogutama;
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->put('http://api.isitaman.com/api/product/1', [
                'id' => $id,
                'name' => $namaproduk,
                'desc' => $deskripsiproduk,
                'base_price' => $hargaproduk,
                'publish_price' => $publishproduk,
                'tinggi' => $tinggiproduk,
                'berat' => $beratproduk,
                'warna' => $warnaproduk,
                'jenis' => $jenisproduk,
                'stok' => $stokproduk,
                'diskon' => $diskonproduk,
                'catalog' => $catalog,
            ]);

            if (!$response) {
                return "Data gagal diupdate";
            }
            // || $response['message'] == "Unauthenticated"
            return redirect('/admin/produk');
        }
        return redirect('/admin/login');
    }

    public function deleteproduk($id)
    {
        $token = session()->get("coba");
        if ($token != null) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->delete('http://api.isitaman.com/api/product/1', [
                'id' => $id,
            ]);

            if (!$response) {
                return "Data gagal ditambahkan";
            }
            return redirect('/admin/produk');
        }
        return redirect('/admin/login');
    }
    //================================ CRUD PRODUK ================================\\
    public function katalog()
    {
        $token = session()->get("coba");
        if ($token != null) {
            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('http://api.isitaman.com/api/catalogs');

            $data['catalog'] = $catalog["catalog"];
            return view('admin.admincatalog', $data);
        }
        return redirect('/admin/login');
    }

    public function tambahkatalog(Request $request)
    {
        $token = session()->get("coba");
        if ($token != null) {
            $namakatalog = $request->namakatalog;
            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->post('http://api.isitaman.com/api/catalog', ['name_catalog' => $namakatalog]);

            return redirect('/admin/katalog');
        }
        return redirect('/admin/login');
    }

    public function deletekatalog($id)
    {
        $token = session()->get("coba");
        if ($token != null) {
            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->delete('https://anggrek.herokuapp.com/api/catalog', ['id_catalog' => $id]);

            if ($catalog['message'] != "Success delete catalog") {
                return "UNDERDEVELOPMENT";
            }
            return redirect('/admin/katalog');
        }
        return redirect('/admin/login');
    }
    // =================== Generate QR Code  
    // public function qrcode_generate($sku){


    // }
}
