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

        if (!isset($val)) {
            return redirect('/login');
        }

        $user = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/user');

        // dd($val);

        $cart = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/carts', [
            'id_user' => $user['profile']['id']
        ]);

        $province = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/province');

        $city = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/city');

        $province = $province['data_provinsi'];

        $city = $city['data_kota'];

        $cart = $cart['cart'];

        $total = 0;

        foreach ($cart as $c) {
            $total = $total + $c['publish_price'] * $c['qty'];
        }

        return view('user/checkout', compact('cart', 'total', 'province', 'city'));
    }

    public function midtrans(Request $request)
    {
        $val = session()->get("coba");

        $user = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/user');

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get(
            'https://api.isitaman.com/api/transaction',
            [
                'id_user' => $user['profile']['id'],
                'total_price' => $request->input('total_price'),
            ]
        );

        return redirect($response['redirect_url']);
    }

    public function city($id)
    {
        $val = session()->get("coba");

        if (!isset($val)) {
            return redirect('/login');
        }

        $city = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/city', [
            'id' => $id
        ]);

        $city = $city['data_kota'];

        return json_encode($city);
    }

    public function shipping($id)
    {
        $val = session()->get("coba");

        if (!isset($val)) {
            return redirect('/login');
        }

        $shipping = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://api.isitaman.com/api/ongkir', [
            'origin' => '256',
            'destination' => $id,
            'weight' => '1',
            'courier' => 'jne'
        ]);

        $shipping = $shipping[0]['costs'];

        return json_encode($shipping);
    }
}
