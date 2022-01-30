<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public $base_url = "http://anggrek.herokuapp.com";
    public $xrequest = "XMLHttpRequest";
    public $accept = "application/json";

    //================================ API ================================\\
    public function getdata($token, $url)
    {
        $response = Http::withHeaders([
            'Accept' => $this->accept,
            'X-Requested-With' => $this->xrequest,
            'Authorization' => "Bearer " . $token,
        ])->get($this->base_url . $url);

        return $response;
    }
    public function getdatabyid($token, $url, $params)
    {
        $response = Http::withHeaders([
            'Accept' => $this->accept,
            'X-Requested-With' => $this->xrequest,
            'Authorization' => "Bearer " . $token,
        ])->get($this->base_url . $url, $params);

        return $response;
    }
    public function postdata($token, $url, $params)
    {
        $response = Http::withHeaders([
            'Accept' => $this->accept,
            'X-Requested-With' => $this->xrequest,
            'Authorization' => "Bearer " . $token,
        ])->post($this->base_url . $url, $params);

        return $response;
    }
    public function postdatawithattachment($token, $url, $params, $attach, $attachname)
    {
        $response = Http::withHeaders([
            'Accept' => $this->accept,
            'X-Requested-With' => $this->xrequest,
            'Authorization' => "Bearer " . $token,
        ])->attach('image', $attach, $attachname)->post($this->base_url . $url, $params);

        return $response;
    }

    public function putdata($token, $url, $params)
    {
        $response = Http::withHeaders([
            'Accept' => $this->accept,
            'X-Requested-With' => $this->xrequest,
            'Authorization' => "Bearer " . $token,
        ])->put($this->base_url . $url, $params);

        return $response;
    }
    //================================ Dashboard ================================\\
    public function dashboard()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            $url_product = '/api/product';
            $url_users = '/api/users';
            $url_transaksi = '/api/transactions/all';

            $product = $this->getdata($token, $url_product);
            $user = $this->getdata($token, $url_users);
            $transaksi = $this->getdata($token, $url_transaksi);

            $data['totalproduct'] = count($product['product']);
            $data['totalusers'] = count($user['users']);
            $data['totaltransaksi'] = count($transaksi['transaction']);

            return view('admin.admindashboard', $data);
        }
        return redirect('/admin/login');
    }

    //================================ Transaksi ================================\\
    public function transaksi()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            $url_transaksi = '/api/transactions/all';
            $transaksi = $this->getdata($token, $url_transaksi);
            $data['transaksi'] = $transaksi["transaction"];

            return view('admin.admintransaksi', $data);
        }
        return redirect('/admin/login');
    }

    public function detailtransaksi($id, $id_user)
    {
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            $url_transaksi = '/api/transaction/id';
            $params = array('id_user' => $id_user, 'id_transaksi' => $id);
            $response = $this->getdatabyid($token, $url_transaksi, $params);

            $data['detailtransaksi'] = $response['Transactions'];
            // dd($data);
            return view('admin.admindetailtransaksi', $data);
        }
    }

    //================================ Pengguna ================================\\
    public function pengguna()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            $url_user = '/api/users';
            $user = $this->getdata($token, $url_user);
            $data['user'] = $user["users"];

            return view('admin.adminuser', $data);
        }
        return redirect('/admin/login');

        //================ GET DATA DASHBOARD DARI API ================\\

    }

    //================================ Pengaturan ================================\\
    public function pengaturan()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            $url_user = '/api/user';
            $response = $this->getdata($token, $url_user);
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

    //================================ PRODUK ================================\\
    public function produk()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            $url_produk = '/api/product';
            $response = $this->getdata($token, $url_produk);
            $data['produk'] = $response['product'];

            return view('admin.adminproduk', $data);
        }
        return redirect('/admin/login');
    }

    public function detailproduk($id)
    {
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            //====> URL
            $url_produk = '/api/product/1';
            $url_user = '/api/user';
            $url_catalog = '/api/catalogs';
            $url_qr = '/api/qrcode';
            //====> PRODUK
            $params_produk = array('id' => $id);
            $response = $this->getdatabyid($token, $url_produk, $params_produk);

            //====> Get User ID
            $user = $this->getdata($token, $url_user);
            $id_user = $user["profile"]["id"];
            //====> Get Catalog
            $params_catalog = array('id' => $id_user);
            $catalog = $this->getdatabyid($token, $url_catalog, $params_catalog);
            //====> Get QR Code
            $sku = $response["product"]['sku']['sku_code'];
            $params_sku = array('sku' => $sku);
            $kodesku = $this->getdatabyid($token, $url_qr, $params_sku);
            $qrcode = $kodesku["qrcode"];
            //====> Ubah Data Harga menjadi Currency
            $harga = $response["product"]['spec'][0]['base_price'];
            $hasil = number_format($harga, 2, ',', '.');

            //====> Kirim ke View
            $data['produkid'] = $response["product"]['id'];
            $data['produkname'] = $response["product"]['name'];
            $data['produkdesc'] = $response["product"]['desc'];
            $data['produkharga'] = $hasil;
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

    public function tambahproduk()
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }
            //================ Mengambil data Katalog untuk ditampilkan ================\\

            $url_katalog = '/api/catalogs';
            $catalog = $this->getdata($token, $url_katalog);

            $data['catalog'] = $catalog["catalog"];
            return view('admin.admincreateproduk', $data);
        }
        return redirect('/admin/login');
    }

    public function addproduk(Request $request)
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

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

            //============== Get Input SKU =============\\
            $kodesku = $request->skuproduk;

            //============== Get Input Specs =============\\
            $namespec = $request->kondisiproduk;
            $hargaproduk = $request->hargaproduk;
            $namespec1 = $request->kondisiproduk2;
            $hargaproduk1 = $request->hargaproduk2;
            $namespec2 = $request->kondisiproduk3;
            $hargaproduk2 = $request->hargaproduk3;

            //============== Get Input Info =============\\
            $titleinfoproduk1 = $request->titleinfoproduk1;
            $valueinfoproduk1 = $request->valueinfoproduk1;
            $titleinfoproduk2 = $request->titleinfoproduk2;
            $valueinfoproduk2 = $request->valueinfoproduk2;
            $titleinfoproduk3 = $request->titleinfoproduk3;
            $valueinfoproduk3 = $request->valueinfoproduk3;

            //========== Get input Foto ============\\
            $resource = $request->file('image');
            $nameresource = $resource->getClientOriginalName();
            $resource->move("images/", $nameresource);

            $publishproduk = $hargaproduk - ($hargaproduk * ($diskonproduk / 100));
            $publishproduk1 = $hargaproduk1 - ($hargaproduk1 * ($diskonproduk / 100));
            $publishproduk2 = $hargaproduk2 - ($hargaproduk2 * ($diskonproduk / 100));

            //================== Verify Katalog ================\\
            $namecatalog = "";
            if ($tambahkatalog) {
                $catalogutama = array(
                    'id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog,
                );
                $tambahcatalog = array(
                    'id_catalog' => null,
                    'name_catalog' => $tambahkatalog,
                );
                $catalog[0] = $catalogutama;
                $catalog[1] = $tambahcatalog;
            } elseif (!$tambahkatalog) {
                $catalogutama = array(
                    'id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog,
                );
                $catalog[0] = $catalogutama;
            }

            //============= Verify Spec =============\\
            if (empty($namespec1) and empty($hargaproduk1) and empty($namespec2) and empty($hargaproduk2)) {
                $spec1 = array(
                    'name_spec' => $namespec,
                    'base_price' => $hargaproduk,
                    'publish_price' => $publishproduk,
                );
                $spec[0] = $spec1;
            }
            if (isset($namespec1) and isset($hargaproduk1) and empty($namespec2) and empty($hargaproduk2)) {
                $spec1 = array(
                    'name_spec' => $namespec,
                    'base_price' => $hargaproduk,
                    'publish_price' => $publishproduk,
                );
                $spec2 = array(
                    'name_spec' => $namespec1,
                    'base_price' => $hargaproduk1,
                    'publish_price' => $publishproduk1,
                );
                $spec[0] = $spec1;
                $spec[1] = $spec2;
            }
            if (empty($namespec1) and empty($hargaproduk1) and isset($namespec2) and isset($hargaproduk2)) {
                $spec1 = array(
                    'name_spec' => $namespec,
                    'base_price' => $hargaproduk,
                    'publish_price' => $publishproduk,
                );
                $spec2 = array(
                    'name_spec' => $namespec2,
                    'base_price' => $hargaproduk2,
                    'publish_price' => $publishproduk2,
                );
                $spec[0] = $spec1;
                $spec[1] = $spec2;
            }
            if (isset($namespec1) and isset($hargaproduk1) and isset($namespec2) and isset($hargaproduk2)) {
                $spec1 = array(
                    'name_spec' => $namespec,
                    'base_price' => $hargaproduk,
                    'publish_price' => $publishproduk,
                );
                $spec2 = array(
                    'name_spec' => $namespec1,
                    'base_price' => $hargaproduk1,
                    'publish_price' => $publishproduk1,
                );
                $spec3 = array(
                    'name_spec' => $namespec2,
                    'base_price' => $hargaproduk2,
                    'publish_price' => $publishproduk2,
                );
                $spec[0] = $spec1;
                $spec[1] = $spec2;
                $spec[2] = $spec3;
            }

            //============= Verify Info ==============\\
            $info1 = array(
                'parameter' => $titleinfoproduk1,
                'value' => $valueinfoproduk1,
            );
            $info2 = array(
                'parameter' => $titleinfoproduk2,
                'value' => $valueinfoproduk2,
            );
            $info3 = array(
                'parameter' => $titleinfoproduk3,
                'value' => $valueinfoproduk3,
            );
            $info[0] = $info1;
            $info[1] = $info2;
            $info[2] = $info3;

            //============== Add to API Product ============\\
            $url_product = '/api/product';
            $params_product = array('name' => $namaproduk,
                'desc' => $deskripsiproduk,
                'tinggi' => $tinggiproduk,
                'berat' => $beratproduk,
                'warna' => $warnaproduk,
                'jenis' => $jenisproduk,
                'stok' => $stokproduk,
                'diskon' => $diskonproduk,
                'catalog' => $catalog,
                'info' => $info,
                'spec' => $spec);
            $response = $this->postdata($token, $url_product, $params_product);

            $id_product = $response["product"][0]["id"];

            //============= Add Foto to API =============\\
            $image = fopen('images/' . $nameresource, 'r');
            $url_pict = '/api/prod/uploadPhoto';
            $params_pict = array('id_product' => $id_product);
            $responsepict = $this->postdatawithattachment($token, $url_pict, $params_pict, $image, $nameresource);
            unlink('images/' . $nameresource);

            $url_sku = '/api/sku';
            $params_sku = array('id_product' => $id_product, 'sku_code' => $kodesku);
            $responsesku = $this->postdata($token, $url_sku, $params_sku);

            return redirect('/admin/produk');
        }
        return redirect('/admin/login');
    }

    public function editproduk($id)
    {
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            $url_product = '/api/product/1';
            $url_user = '/api/user';
            $url_katalog = '/api/catalogs';
            $url_qr = '/api/qrcode';

            $params_product = array('id' => $id);
            $response = $this->getdatabyid($token, $url_product, $params_product);

            $user = $this->getdata($token, $url_user);
            $id_user = $user["profile"]["id"];

            $params_katalog = array('id' => $id_user);
            $catalog = $this->getdatabyid($token, $url_katalog, $params_katalog);

            $sku = $response["product"]['sku']['sku_code'];
            $params_qr = array('sku' => $sku);
            $kodesku = $this->getdatabyid($token, $url_qr, $params_qr);
            $qrcode = $kodesku["qrcode"];

            $info = count($response["product"]['info']);
            if ($info == 1) {
                $idinfo2 = null;
                $valinfo2 = null;
                $paraminfo2 = null;
                $idinfo3 = null;
                $valinfo3 = null;
                $paraminfo3 = null;
            }
            if ($info == 2) {
                $idinfo2 = $response["product"]['info'][1]['id'];
                $valinfo2 = $response["product"]['info'][1]['value'];
                $paraminfo2 = $response["product"]['info'][1]['parameter'];
                $idinfo3 = null;
                $valinfo3 = null;
                $paraminfo3 = null;
            }
            if ($info == 3) {
                $idinfo2 = $response["product"]['info'][1]['id'];
                $valinfo2 = $response["product"]['info'][1]['value'];
                $paraminfo2 = $response["product"]['info'][1]['parameter'];
                $idinfo3 = $response["product"]['info'][2]['id'];
                $valinfo3 = $response["product"]['info'][2]['value'];
                $paraminfo3 = $response["product"]['info'][2]['parameter'];
            }

            $spec = count($response["product"]['spec']);
            if ($spec == 1) {
                $idspec2 = null;
                $namaspec2 = null;
                $hargaspec2 = null;
                $idspec3 = null;
                $namaspec3 = null;
                $hargaspec3 = null;
            }
            if ($spec == 2) {
                $idspec2 = $response["product"]['spec'][1]['id'];
                $namaspec2 = $response["product"]['spec'][1]['name_spec'];
                $hargaspec2 = $response["product"]['spec'][1]['base_price'];
                $idspec3 = null;
                $namaspec3 = null;
                $hargaspec3 = null;
            }
            if ($spec == 3) {
                $idspec2 = $response["product"]['spec'][1]['id'];
                $namaspec2 = $response["product"]['spec'][1]['name_spec'];
                $hargaspec2 = $response["product"]['spec'][1]['base_price'];
                $idspec3 = $response["product"]['spec'][2]['id'];
                $namaspec3 = $response["product"]['spec'][2]['name_spec'];
                $hargaspec3 = $response["product"]['spec'][2]['base_price'];
            }

            $data['produkid'] = $response["product"]['id'];
            $data['produkname'] = $response["product"]['name'];
            $data['produkdesc'] = $response["product"]['desc'];
            $data['produksku'] = $sku;
            $data['produksidspec1'] = $response["product"]['spec'][0]['id'];
            $data['produksnamespec1'] = $response["product"]['spec'][0]['name_spec'];
            $data['produkhargaspec1'] = $response["product"]['spec'][0]['base_price'];
            $data['produksidspec2'] = $idspec2;
            $data['produksnamespec2'] = $namaspec2;
            $data['produkhargaspec2'] = $hargaspec2;
            $data['produksidspec3'] = $idspec3;
            $data['produksnamespec3'] = $namaspec3;
            $data['produkhargaspec3'] = $hargaspec3;
            $data['produksinfoid1'] = $response["product"]['info'][0]['id'];
            $data['produksinfovalue1'] = $response["product"]['info'][0]['value'];
            $data['produksinfoparam1'] = $response["product"]['info'][0]['parameter'];
            $data['produksinfoid2'] = $idinfo2;
            $data['produksinfovalue2'] = $valinfo2;
            $data['produksinfoparam2'] = $paraminfo2;
            $data['produksinfoid3'] = $idinfo3;
            $data['produksinfovalue3'] = $valinfo3;
            $data['produksinfoparam3'] = $paraminfo3;
            $data['produkidkatalog'] = $response["product"]['list_detail_catalog'][0]['id'];
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
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }
            $id = $request->id;
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
            $idspec1 = $request->idspec1;
            $namespec1 = $request->kondisiproduk;
            $hargaproduk1 = $request->hargaproduk;
            $idspec2 = $request->idspec2;
            $namespec2 = $request->kondisiproduk2;
            $hargaproduk2 = $request->hargaproduk2;
            $idspec3 = $request->idspec3;
            $namespec3 = $request->kondisiproduk3;
            $hargaproduk3 = $request->hargaproduk3;

            //============== Info =============\\
            $idinfo1 = $request->idinfo1;
            $titleinfoproduk1 = $request->titleinfoproduk1;
            $valueinfoproduk1 = $request->valueinfoproduk1;
            $idinfo2 = $request->idinfo2;
            $titleinfoproduk2 = $request->titleinfoproduk2;
            $valueinfoproduk2 = $request->valueinfoproduk2;
            $idinfo3 = $request->idinfo1;
            $titleinfoproduk3 = $request->titleinfoproduk3;
            $valueinfoproduk3 = $request->valueinfoproduk3;

            //========== Foto ============\\
            $resource = $request->file('imageaddnew');

            $publishproduk = $hargaproduk1 - ($hargaproduk1 * ($diskonproduk / 100));
            $publishproduk1 = $hargaproduk2 - ($hargaproduk2 * ($diskonproduk / 100));
            $publishproduk2 = $hargaproduk3 - ($hargaproduk3 * ($diskonproduk / 100));

            //================== Katalog ================\\
            $namecatalog = "";
            if ($tambahkatalog) {
                $catalogutama = array(
                    'id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog,
                );
                $tambahcatalog = array(
                    'id_catalog' => null,
                    'name_catalog' => $tambahkatalog,
                );
                $catalog[0] = $catalogutama;
                $catalog[1] = $tambahcatalog;
            } elseif (!$tambahkatalog) {
                $catalogutama = array(
                    'id_catalog' => $catalogproduk,
                    'name_catalog' => $namecatalog,
                );
                $catalog[0] = $catalogutama;
            }

            //============= Spec =============\\
            if (empty($idspec2) and empty($idspec3)) {
                $spec1 = array(
                    'id_spec' => $idspec1,
                    'name_spec' => $namespec1,
                    'base_price' => $hargaproduk1,
                    'publish_price' => $publishproduk,
                );
                $spec[0] = $spec1;
            }
            if (isset($idspec2) and empty($idspec3)) {
                $spec1 = array(
                    'id_spec' => $idspec1,
                    'name_spec' => $namespec1,
                    'base_price' => $hargaproduk1,
                    'publish_price' => $publishproduk,
                );
                $spec2 = array(
                    'id_spec' => $idspec2,
                    'name_spec' => $namespec2,
                    'base_price' => $hargaproduk2,
                    'publish_price' => $publishproduk1,
                );
                $spec[0] = $spec1;
                $spec[1] = $spec2;
            }
            if (empty($idspec2) and isset($idspec3)) {
                $spec1 = array(
                    'id_spec' => $idspec1,
                    'name_spec' => $namespec1,
                    'base_price' => $hargaproduk1,
                    'publish_price' => $publishproduk,
                );
                $spec2 = array(
                    'id_spec' => $idspec3,
                    'name_spec' => $namespec3,
                    'base_price' => $hargaproduk3,
                    'publish_price' => $publishproduk2,
                );
                $spec[0] = $spec1;
                $spec[1] = $spec2;
            }
            if (isset($idspec2) and isset($idspec3)) {
                $spec1 = array(
                    'id_spec' => $idspec1,
                    'name_spec' => $namespec1,
                    'base_price' => $hargaproduk1,
                    'publish_price' => $publishproduk,
                );
                $spec2 = array(
                    'id_spec' => $idspec2,
                    'name_spec' => $namespec2,
                    'base_price' => $hargaproduk2,
                    'publish_price' => $publishproduk1,
                );
                $spec3 = array(
                    'id_spec' => $idspec3,
                    'name_spec' => $namespec3,
                    'base_price' => $hargaproduk3,
                    'publish_price' => $publishproduk2,
                );
                $spec[0] = $spec1;
                $spec[1] = $spec2;
                $spec[2] = $spec3;
            }

            //============= Info ==============\\
            if (empty($idinfo2) and empty($idinfo3)) {
                $info1 = array(
                    'id_info' => $idinfo1,
                    'parameter' => $titleinfoproduk1,
                    'value' => $valueinfoproduk1,
                );
                $info[0] = $info1;
            }
            if (isset($idinfo2) and empty($idinfo3)) {
                $info1 = array(
                    'id_info' => $idinfo1,
                    'parameter' => $titleinfoproduk1,
                    'value' => $valueinfoproduk1,
                );
                $info2 = array(
                    'id_info' => $idinfo2,
                    'parameter' => $titleinfoproduk2,
                    'value' => $valueinfoproduk2,
                );
                $info[0] = $info1;
                $info[1] = $info2;
            }
            if (empty($idinfo2) and isset($idinfo3)) {
                $info1 = array(
                    'id_info' => $idinfo1,
                    'parameter' => $titleinfoproduk1,
                    'value' => $valueinfoproduk1,
                );
                $info3 = array(
                    'id_info' => $idinfo3,
                    'parameter' => $titleinfoproduk3,
                    'value' => $valueinfoproduk3,
                );
                $info[0] = $info1;
                $info[1] = $info3;
            }
            if (isset($idinfo2) and isset($idinfo3)) {
                $info1 = array(
                    'id_info' => $idinfo1,
                    'parameter' => $titleinfoproduk1,
                    'value' => $valueinfoproduk1,
                );
                $info2 = array(
                    'id_info' => $idinfo2,
                    'parameter' => $titleinfoproduk2,
                    'value' => $valueinfoproduk2,
                );
                $info3 = array(
                    'id_info' => $idinfo3,
                    'parameter' => $titleinfoproduk3,
                    'value' => $valueinfoproduk3,
                );
                $info[0] = $info1;
                $info[1] = $info2;
                $info[2] = $info3;
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

            $url_produk = '/api/catalogs';
            $response = $this->getdata($token, $url_produk);
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->put('https://api.isitaman.com/api/product/1', [
                'id' => $id,
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

            //========== Foto ============\\
            if (isset($resource)) {
                $nameresource = $resource->getClientOriginalName();
                $resource->move("images/", $nameresource);
                $image = fopen('images/' . $nameresource, 'r');
                $responsepict = Http::withHeaders([
                    'Accept' => 'application/json',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Authorization' => "Bearer " . $token,
                ])->attach('image', $image, $nameresource)->post('https://api.isitaman.com/api/prod/uploadPhoto', [
                    'id_product' => $id,
                ]);
                unlink('images/' . $nameresource);
            }

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
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }
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

    //================================ Katalog ================================\\
    public function katalog()
    {
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }
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
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }
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
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }
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

    public function filterkatalog(Request $request)
    {
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        $role = session()->get("role");

        if ($token != null) {
            if ($role == null) {
                return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
            }

            //=================== Menerima request filter ===================\\
            $filter = $request->filter;
            if ($filter == 1) {
                return redirect('/admin/produk');
            }

            //=================== Mendapatkan data produk by katalog ===================\\
            for ($i = 1; $i < 5; $i++) {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Authorization' => "Bearer " . $token,
                ])->get('https://api.isitaman.com/api/catalog/product', ['id_catalog' => $i]);

                $data['data' . $i] = $response['product'];
            }

            return view('admin.adminkatalogproduk', $data);
        }
        return redirect('/admin/login');

    }

    //================================ QR Code ================================\\
    public function qrcode(Request $request)
    {
        return view('admin.adminqrcode');
    }
}
