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

                $response = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                ])->get(env('APP_URL') . '/api/product');

                $banner = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                ])->get(env('APP_URL') . '/api/product/1', [
                        'id' => '2'
                ]);

                $bunga = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                ])->get(env('APP_URL') . '/api/catalog/product', [
                        'id_catalog' => '1'
                ]);
                $bahan = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                ])->get(env('APP_URL') . '/api/catalog/product', [
                        'id_catalog' => '1'
                ]);


                $product = $response['product'];
                $product_dummy = "https://dummyimage.com/250x250/f0f0f0/0f0f0f.png&text=product+dummy+250x250";
                $banner = $banner['product'];
                $banner_img = "https://images.unsplash.com/photo-1583846712268-a77d97b7fd68?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=735&q=80";
                $bunga = $bunga['product'];
                $bahan = $bahan['product'];


                return view('user/home', compact('product', 'bunga', 'bahan', 'banner', 'product_dummy', 'banner_img'));
        }

        public function catalog()
        {
                $val = session()->get("coba");

                $response = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get(env('APP_URL') . '/git papi/catalogs');

                return $response;
        }
}
