<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    //
    public function product($id)
    {
        $val = session()->get("coba");

        // return $id;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/product/1?id=' . $id);

        $product = $response['product'];

        $allProduct = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/product');

        $allProduct = $allProduct['product'];

        $sku = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/qrcode', [
            'sku' => $product['sku']['sku_code']
        ]);


        return view('user/product', compact('product', 'allProduct', 'sku'));
    }

    public function product_sku($id)
    {
        $val = session()->get("coba");

        // return $id;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/sku/byproduct?sku_code=' . $id);

        $product = $response['product'];

        $allProduct = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/product');

        $allProduct = $allProduct['product'];

        $sku = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/qrcode', [
            'sku' => 'BG001'
        ]);


        return view('user/product', compact('product', 'allProduct', 'sku'));
    }
}