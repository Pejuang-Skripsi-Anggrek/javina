<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        $val = session()->get("coba");
        // dd($val);
        $province = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://anggrek.herokuapp.com/api/province');

        $city = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://anggrek.herokuapp.com/api/city');

        $origin = 4;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://anggrek.herokuapp.com/api/ongkir', [
            'origin' => '255',
            'destination' => '154',
            'weight' => '100',
            'courier' => 'jne'

        ]);

        //harus bikin variabel buat servis, kurir
        $cost['harga'] = $response;
        return view('user/checkout', $cost);
    }
}
