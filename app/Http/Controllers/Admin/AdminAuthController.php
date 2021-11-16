<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminAuthController extends Controller
{
    //================= ROUTE TO VIEW =================\\
    public function login(){
        return view('admin.adminlogin');
    }
    //================= ROUTE TO API =================\\
    public function masuk(Request $request){
        $email = $request->email;
        $password = $request->password;

        //=================== REQUEST API ===================\\
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('https://anggrek.herokuapp.com/api/login', [
            'email' => $email,
            'password' => $password,
        ]);

        //=================== VALIDASI RESPONSE ===================\\
        $message = $response['message'];
        if($message == 'Invalid credentials'){
            return "Email atau Password Salah";    
        }
        $role = $response['role'];
        if($role == true){
            return redirect('/admin');
        }
        return "Anda tidak mempunyai hak akses";
    }
}
