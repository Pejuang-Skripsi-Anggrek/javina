<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    //================= ROUTE TO VIEW =================\\
    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }
    public function masuk(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        //=================== REQUEST API ===================\\
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('https://anggrek.herokuapp.com/api/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $token = $response['token'];
        session(["coba" => $token]);

        //=================== VALIDASI RESPONSE ===================\\
        $message = $response['message'];
        if ($message == 'Invalid credentials') {
            return "Email atau Password Salah";
        }
        $role = $response['role'];
        //=================== JIKA ROLE ADMIN ===================\\
        if ($role == True) {
            return "Salah hak akses";
        }
        //=================== JIKA ROLE USER ===================\\
        return redirect('/');
    }

    public function daftar(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $copassword = $request->password_confirmation;
        $role = 0;

        if (!$name || !$email || !$password || !$copassword) {
            return "Mohon isikan data dengan lengkap";
        }
        if ($password != $copassword) {
            return "Password tidak sama";
        }

        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post('https://anggrek.herokuapp.com/api/register', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role' => $role,
        ]);

        if (!$response['role']) {
            return "Register Failed";
        }

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $response
        ], 201);
    }
}
