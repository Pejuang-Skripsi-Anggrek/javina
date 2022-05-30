<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        ])->get(env('APP_URL') . '/api/catalog/product', [
            'id_catalog' => $id
        ]);

        $product =  $response['product'];


        return view('user/catalog', compact('product'));
    }
}
