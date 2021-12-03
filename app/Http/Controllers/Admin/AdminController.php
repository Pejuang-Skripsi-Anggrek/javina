<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    public function dashboard(){
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        // dd($token);
        if($token != null){
            return view('admin.admindashboard');
        }
        return redirect('/admin/login');
        
        //================ GET DATA DASHBOARD DARI API ================\\
        
    }
    public function transaksi(){
        //================ CEK TOKEN ================\\ 
        $token = session()->get("coba");
        if($token != null){
            return view('admin.admintransaksi');
        }
        return redirect('/admin/login');
        
        //================ GET DATA DASHBOARD DARI API ================\\
        
    }
    public function produk(){
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if($token != null){

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$token
            ])->get('https://anggrek.herokuapp.com/api/product');
            
            $data['produk'] = $response['product'];
                    
            return view('admin.adminproduk', $data);
        }
        return redirect('/admin/login');
        
        //================ GET DATA DASHBOARD DARI API ================\\
        
    }
    public function pengguna(){
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if($token != null){
            return view('admin.admintransaksi');
        }
        return redirect('/admin/login');
        
        //================ GET DATA DASHBOARD DARI API ================\\
        
    }
    public function pengaturan(){
        //================ CEK TOKEN ================\\
        $val = session()->get("coba");
        if($val != null){
            //================ GET DATA ================\\
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$val
            ])->get('https://anggrek.herokuapp.com/api/user');
            //================ CEK RESPONSE ================\\
            $message = $response['message'];
            $name = $response['profile'];

            if($message == "Unauthenticated."){
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
    public function tambahproduk(){
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if($token != null){
            return view('admin.admincreateproduk');
        }
        return redirect('/admin/login');
    }
    public function addproduk(Request $request){
        //================ CEK TOKEN ================\\
        $token = session()->get("coba");
        if($token != null){
            $namaproduk = $request->namaproduk;
            $deskripsiproduk = $request->deskripsiproduk;
            $hargaproduk = $request->hargaproduk;
            $beratproduk = $request->beratproduk;
            $tinggiproduk = $request->tinggiproduk;
            $warnaproduk = $request->warnaproduk;
            $jenisproduk = $request->jenisproduk;
            $catalog = $request->katalogproduk;
            
            if(!$namaproduk || !$deskripsiproduk || !$hargaproduk || !$catalog){
                return "Masukkan Data Nama, Deskripsi, Katalog dan Harga";
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$token
            ])->post('https://anggrek.herokuapp.com/api/product', [
                'name' => $namaproduk,
                'desc' => $deskripsiproduk,
                'price' => $hargaproduk,
                'catalog' => $catalog,
                'tinggi' => $tinggiproduk,
                'berat' => $beratproduk,
                'warna' => $warnaproduk,
                'jenis' => $jenisproduk
            ]);

            if(!$response){
                return "Data gagal ditambahkan";
            }
            // || $response['message'] == "Unauthenticated"
            return redirect('/admin/produk');
        }
        return redirect('/admin/login');
    }

    public function editproduk($id){
        $token = session()->get("coba");
        if($token != null){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$token
            ])->get('https://anggrek.herokuapp.com/api/product/1', [
                'id' => $id,
            ]);

            $user = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$token
            ])->get('https://anggrek.herokuapp.com/api/user');

            $id_user = $user["profile"]["id"];

            $catalog = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$token
            ])->get('https://anggrek.herokuapp.com/api/catalogs', [
                'id' => $id_user,
            ]);

            $data['produk'] = $response["product"];
            $data['catalog'] = $catalog["catalog"];
            return view('admin.adminupdateproduk', $data);
        }
        return redirect('/admin/login');
    }

    public function updateproduk(Request $request){
        $token = session()->get("coba");
        if($token != null){
            $id = $request->id;
            $namaproduk = $request->namaproduk;
            $deskripsiproduk = $request->deskripsiproduk;
            $hargaproduk = $request->hargaproduk;
            $beratproduk = $request->beratproduk;
            $tinggiproduk = $request->tinggiproduk;
            $warnaproduk = $request->warnaproduk;
            $jenisproduk = $request->jenisproduk;
            $catalog = $request->katalogproduk;
            
            if(!$namaproduk || !$deskripsiproduk || !$hargaproduk || !$catalog){
                return "Masukkan Data Nama, Deskripsi, Katalog dan Harga";
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$token
            ])->put('https://anggrek.herokuapp.com/api/product/1', [
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

            if(!$response){
                return "Data gagal diupdate";
            }
            // || $response['message'] == "Unauthenticated"
            return redirect('/admin/produk');
        }
        return redirect('/admin/login');
    }

    public function deleteproduk($id){
        $token = session()->get("coba");
        if($token != null){
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer ".$token
            ])->delete('https://anggrek.herokuapp.com/api/product/1', [
                'id' => $id
            ]);

            if(!$response){
                return "Data gagal ditambahkan";
            }
            return redirect('/admin/produk');
        }
        return redirect('/admin/login');
    }
}
