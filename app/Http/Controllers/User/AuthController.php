<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //================= ROUTE TO VIEW =================\\
    public function login(){
        return view('user.login');
    }
}
