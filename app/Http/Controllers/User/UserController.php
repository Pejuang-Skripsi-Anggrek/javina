<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    //
    public function user()
    {
        $token = session()->get("coba");


        if ($token == null) {
            return redirect('/login');
        }

        $user = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $token
        ])->get('https://api.isitaman.com/api/user');

        $user =  $user['profile'];

        return view('user.user', compact('user'));
    }
}
