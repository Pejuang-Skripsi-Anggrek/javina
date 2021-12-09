<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //Index
    public function home()
    {

        // return $id;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
        ])->get('https://api.isitaman.com/api/product');

        $product = $response['product'];


        return view('user/home', compact('product'));
    }

    public function catalog()
    {
        $val = session()->get("coba");

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/catalogs');

        return $response;
    }
}
