<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use function PHPUnit\Framework\isEmpty;
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
            ])->get('http://api.isitaman.com/api/product');

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('http://api.isitaman.com/api/users');

            $transaksi = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('http://api.isitaman.com/api/transactions/all');

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
            ])->get('http://api.isitaman.com/api/transactions/all');

            $data['transaksi'] = $transaksi["transaction"];
            // $data1['transaksi1'] = $transaksi["transaction"];
            // $user = Http::withHeaders([
            //     'Accept' => 'application/json',
            //     'X-Requested-With' => 'XMLHttpRequest',
            //     'Authorization' => "Bearer ".$token
            // ])->get('https://anggrek.herokuapp.com/api/users');

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
            ])->get('http://api.isitaman.com/api/product');

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
            ])->get('http://api.isitaman.com/api/users');

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
            ])->get('http://api.isitaman.com/api/user');
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
            // ])->get('https://anggrek.herokuapp.com/api/user');

            // $id_user = $user["profile"]["id"];

            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('http://api.isitaman.com/api/catalogs');

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
            $diskonproduk = $request->diskonproduk;
            $beratproduk = $request->beratproduk;
            $tinggiproduk = $request->tinggiproduk;
            $warnaproduk = $request->warnaproduk;
            $jenisproduk = $request->jenisproduk;
            $stokproduk = $request->stokproduk;
            $catalogproduk = $request->katalogproduk;
            $tambahkatalog = $request->tambahkatalog;
            $resource = $request->file('image');
            $nameresource = $resource->getClientOriginalName();
            $resource->move("images/", $nameresource);

            $publishproduk = $hargaproduk - ($hargaproduk * ($diskonproduk / 100));

            if (isEmpty($tambahkatalog)) {
                $tkat = "";
            }
            $tkat = $tambahkatalog;

            $namecatalog = "";
            if ($catalogproduk == 1) {
                $namecatalog = "Anggrek";
            }
            if ($catalogproduk == 2) {
                $namecatalog = "Bibit";
            }
            if ($catalogproduk == 3) {
                $namecatalog = "Bahan";
            }
            if ($catalogproduk == 4) {
                $namecatalog = "Alat";
            }
            $catalogutama = array('id_catalog' => $catalogproduk,
                'name_catalog' => $namecatalog);
            $tambahcatalog = array('id_catalog' => null,
                'name_catalog' => $tkat);

            $catalog[0] = $catalogutama;
            $catalog[1] = $tambahcatalog;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->post('http://api.isitaman.com/api/product', [
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
                return "Data gagal ditambahkan";
            }

            $id_product = $response["product"][0]["id"];

            // dd($nameresource);
            // $image = fopen('images/' . $nameresource, 'r');
            // dd($image);
            // $responsepict = Http::attach(
            //     'image', $image, $nameresource, [
            //     'Accept' => 'application/json',
            //     'Accept' => 'multipart/form-data',
            //     'X-Requested-With' => 'XMLHttpRequest',
            //     'Authorization' => "Bearer ".$token
            //     ]
            // )->post('http://api.isitaman.com/api/prod/uploadPhoto', [
            //     'id_product' => $id_product
            //     // 'image' => $nameresource
            // ]);
            // return $responsepict;

            $responsepict = Http::attach("image", $resource, $nameresource, [
                'Accept' => 'application/json',
                'Content-Type' => 'multipart/form-data',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token]
            )->post('http://api.isitaman.com/api/prod/uploadPhoto', [
                "id_product" => $id_product
            ]);
            return $responsepict;

            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            // CURLOPT_URL => "http://api.isitaman.com/api/prod/uploadPhoto",
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => "",
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 30,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_HTTPHEADER => array(
            //     'Accept: multipart/form-data',
            //     'Content-Type: application/json',
            //     'X-Requested-With' => 'XMLHttpRequest',
            //     'Authorization' => "Bearer ".$token
            // ),
            //     CURLOPT_POSTFIELDS=>array(
            //         "id_product" => $id_product,
            //         "image" => file_get_contents("images/".$nameresource)),
            // ));
            // $response = curl_exec($curl);
            // curl_close($curl);

            if (!$response) {
                return "Data gagal ditambahkan";
            }

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
                'Authorization' => "Bearer " . $token,
            ])->get('http://api.isitaman.com/api/product/1', [
                'id' => $id,
            ]);

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('http://api.isitaman.com/api/user');

            $id_user = $user["profile"]["id"];

            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $token,
            ])->get('http://api.isitaman.com/api/catalogs', [
                'id' => $id_user,
            ]);

            //======================= Array di dalam Array =======================\\
            // $data['produk'] = $response["product"]["detail_product"];

            $data['produkid'] = $response["product"]['id'];
            $data['produkname'] = $response["product"]['name'];
            $data['produkdesc'] = $response["product"]['desc'];
            $data['produkharga'] = $response["product"]['base_price'];
            $data['produkkatalog'] = $response["product"]['list_detail_catalog'][0]['name'];
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
                'Authorization' => "Bearer " . $token,
            ])->put('http://api.isitaman.com/api/product/1', [
                'id' => $id,
                'name' => $namaproduk,
                'desc' => $deskripsiproduk,
                'base_price' => $hargaproduk,
                'catalog' => $catalog,
                'tinggi' => $tinggiproduk,
                'berat' => $beratproduk,
                'warna' => $warnaproduk,
                'jenis' => $jenisproduk,
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
}
