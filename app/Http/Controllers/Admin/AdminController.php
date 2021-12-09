<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;

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
                'Authorization' => "Bearer " . $token
            ])->get('https://api.isitaman.com/api/product');

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token
            ])->get('https://api.isitaman.com/api/users');

            $transaksi = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token
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
                'Authorization' => "Bearer " . $token
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
                'Authorization' => "Bearer " . $token
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
                'Authorization' => "Bearer " . $token
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
                'Authorization' => "Bearer " . $val
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
                'Authorization' => "Bearer " . $token
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
            $hargaproduk = $request->hargaproduk;
            $beratproduk = $request->beratproduk;
            $tinggiproduk = $request->tinggiproduk;
            $warnaproduk = $request->warnaproduk;
            $jenisproduk = $request->jenisproduk;
            $catalog = $request->katalogproduk;

            if (!$namaproduk || !$deskripsiproduk || !$hargaproduk || !$catalog) {
                return "Masukkan Data Nama, Deskripsi, Katalog dan Harga";
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token
            ])->post('https://api.isitaman.com/api/product', [
                'name' => $namaproduk,
                'desc' => $deskripsiproduk,
                'price' => $hargaproduk,
                'catalog' => $catalog,
                'tinggi' => $tinggiproduk,
                'berat' => $beratproduk,
                'warna' => $warnaproduk,
                'jenis' => $jenisproduk
            ]);

            if (!$response) {
                return "Data gagal ditambahkan";
            }
            // || $response['message'] == "Unauthenticated"
            return redirect('/admin/produk');
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
                'Authorization' => "Bearer " . $token
            ])->get('https://api.isitaman.com/api/product/1', [
                'id' => $id,
            ]);

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token
            ])->get('https://api.isitaman.com/api/user');

            $id_user = $user["profile"]["id"];

            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token
            ])->get('https://api.isitaman.com/api/catalogs', [
                'id' => $id_user,
            ]);

            //======================= Array di dalam Array =======================\\  
            // $data['produk'] = $response["product"]["detail_product"];

            $data['produkid'] = $response["product"]['id'];
            $data['produkname'] = $response["product"]['name'];
            $data['produkdesc'] = $response["product"]['desc'];
            $data['produkharga'] = $response["product"]['price'];
            $data['produkkatalog'] = $response["product"]['catalog'];
            $data['produktinggi'] = $response["product"]['tinggi'];
            $data['produkberat'] = $response["product"]['berat'];
            $data['produkwarna'] = $response["product"]['warna'];
            $data['produkjenis'] = $response["product"]['jenis'];
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
            $catalog = $request->katalogproduk;

            if (!$namaproduk || !$deskripsiproduk || !$hargaproduk || !$catalog) {
                return "Masukkan Data Nama, Deskripsi, Katalog dan Harga";
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token
            ])->put('https://api.isitaman.com/api/product/1', [
                'id' => $id,
                'name' => $namaproduk,
                'desc' => $deskripsiproduk,
                'price' => $hargaproduk,
                'catalog' => $catalog,
                'tinggi' => $tinggiproduk,
                'berat' => $beratproduk,
                'warna' => $warnaproduk,
                'jenis' => $jenisproduk
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
                'Authorization' => "Bearer " . $token
            ])->delete('https://api.isitaman.com/api/product/1', [
                'id' => $id
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
                'Authorization' => "Bearer " . $token
            ])->get('https://api.isitaman.com/api/catalogs');

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
                'Authorization' => "Bearer " . $token
            ])->post('https://api.isitaman.com/api/catalog', ['name_catalog' => $namakatalog]);

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
                'Authorization' => "Bearer " . $token
            ])->delete('https://api.isitaman.com/api/catalog', ['id_catalog' => $id]);

            if ($catalog['message'] != "Success delete catalog") {
                return "Delete Catalog";
            }
            return redirect('/admin/katalog');
        }
        return redirect('/admin/login');
    }
}
