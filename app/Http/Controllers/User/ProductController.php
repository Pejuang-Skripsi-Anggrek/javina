<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
        public $base_url = "http://anggrek.herokuapp.com";
        //
        public function product($id)
        {
                $val = session()->get("coba");

                // return $id;

                $response = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/product/1?id=' . $id);

                $product = $response['product'];

                $allProduct = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/product');

                $allProduct = $allProduct['product'];


                $sku = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/qrcode', [
                        'sku' => 1
                ]);

                $product_thumb_dummy = "https://dummyimage.com/500x500/f0f0f0/0f0f0f.png&text=product+dummy+500x500";
                $product_car_dummy = "https://dummyimage.com/250x250/f0f0f0/0f0f0f.png&text=product+dummy+250x250";


                return view('user/product', compact('product', 'allProduct', 'sku', 'product_thumb_dummy', 'product_car_dummy'));
        }

        public function product_sku($id)
        {
                $val = session()->get("coba");

                // return $id;

                $response = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/sku/byproduct?sku_code=' . $id);

                $product = $response['product'];


                $allProduct = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/product');

                $allProduct = $allProduct['product'];

                $sku = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/qrcode', [
                        'sku' => $product['sku']['sku_code']
                ]);

                return view('user/product', compact('product', 'allProduct', 'sku'));
        }
}
