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
        $val = session()->get('coba');

        // return $val;

        if (isset($val)) {
            return redirect('/');
        }
        return view('user.login');
    }

    // Register View
    public function register()
    {
        return view('user.register');
    }

    //Login Proccess
    public function masuk(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        //=================== REQUEST API ===================\\
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->post(env('APP_URL') . '/api/login', [
            'email' => $email,
            'password' => $password,
        ]);

        if (isset($response['token'])) {

            $token = $response['token'];

            // return $token;

            session(["coba" => $token]);
        } else {
            return redirect('/login');
        }
        // nanti ditambahin message


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

    //Register Proccess
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
        ])->post(env('APP_URL') . '/api/register', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role' => $role,
        ]);

        if (!$response) {
            return "Register Failed";
        }

        // return response()->json([
        //     'message' => 'User successfully registered',
        //     'user' => $response
        // ], 201);

        return redirect('/login');
    }

    public function logout()
    {
        session()->forget('coba');

        return redirect('/');
    }
}
