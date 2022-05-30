<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UserController extends Controller
{
    public $base_url = "http://anggrek.herokuapp.com";
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
        ])->get($this->base_url . '/api/user');

        $user =  $user['profile'];

        return view('user.user', compact('user'));
    }
}
