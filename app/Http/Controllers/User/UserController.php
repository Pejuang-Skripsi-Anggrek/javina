<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function user()
    {
        $token = session()->get("coba");

        if ($token != null) {
            return view('user.user');
        }
        return redirect('/login');
    }
}
