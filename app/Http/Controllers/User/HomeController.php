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
        $val = session()->get("coba");

        // return $id;
        $catalog = $this->catalog();

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://anggrek.herokuapp.com/api/product/');

        $product = $response['product'];


        return view('user/Home', compact('product', 'catalog'));
    }

    public function catalog()
    {
        $val = session()->get("coba");

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://anggrek.herokuapp.com/api/catalogs');

        return $response;
    }
}
