<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CatalogController extends Controller
{
    //
    public function catalog($id)
    {
        $val = session()->get("coba");

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
        ])->get('https://anggrek.herokuapp.com/api/catalog/product', [
            'id_catalog' => $id
        ]);

        $product =  $response['product'];

        // return $product;

        return view('user/catalog', compact('product'));
    }
}
