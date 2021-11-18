<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

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
            return view('admin.adminproduk');
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
}
