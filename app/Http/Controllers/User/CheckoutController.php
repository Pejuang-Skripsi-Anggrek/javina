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
        // return $response[0]['costs'][0]['cost'][0]['value'];
        //harus bikin variabel buat servis, kurir
        $cost['harga'] = $response[0]['costs'][0]['cost'][0]['value'];
        $cost['eta'] = $response[0]['costs'][0]['cost'][0]['etd'];
        return view('user/checkout', $cost);
    }

    public function midtrans()
    {
        $val = session()->get("coba");

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://anggrek.herokuapp.com/api/transaction');

        return redirect($response['redirect_url']);
    }
}
