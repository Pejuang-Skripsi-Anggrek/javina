<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class AdminAuthController extends Controller
{
    //================= ROUTE TO VIEW =================\\
    public function login()
    {
        return view('admin.adminlogin');
    }
    //================= ROUTE TO API =================\\
    public function masuk(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        //=================== REQUEST API ===================\\
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://anggrek.herokuapp.com/api/login', [
            'email' => $email,
            'password' => $password,
        ]);
        //=================== VALIDASI RESPONSE ===================\\
        $message = $response['message'];
        if ($message == 'Invalid credentials') {
            return redirect('/admin/login')->with('error', 'Akun tidak ditemukan, Mohon Cek Username dan Password kembali'); 
        }
        $role = $response['role'];
        if ($role == false) {
            return redirect('/admin/login')->with('error', 'Anda tidak memiliki hak akses');
        }
        $token = $response['token'];
        session(["coba" => $token, "role" => $role]);

        
        return redirect('/admin/dashboard');
    }

    public function logout()
    {
        $val = session()->get("coba");
        if ($val != null) {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => "Bearer " . $val,
            ])->post('https://api.isitaman.com/api/logout');
            

            // if($response["message"] != "success"){
            //     return "Logout Failed";
            // }
            //================== Terminated Session ==================\\
            session()->forget("coba");
            return redirect('/admin/login');
        }
        return redirect('/admin/login');
    }
}
