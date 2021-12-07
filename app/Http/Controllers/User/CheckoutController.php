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
        ])->get('https://anggrek.herokuapp.com/api/user');

        // dd($val);

        $cart = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get('https://anggrek.herokuapp.com/api/carts', [
            'id_user' => $user['profile']['id']
        ]);

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

        $province = $province['data_provinsi'];

        $city = $city['data_kota'];

        $cart = $cart['cart'];

        $total = 0;

        foreach ($cart as $c) {
            $total = $total + $c['price'] * $c['qty'];
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
        ])->get('https://anggrek.herokuapp.com/api/user');

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get(
            'https://anggrek.herokuapp.com/api/transaction',
            [
                'id_user' => $user['profile']['id'],
                'total_price' => $request->input('total_price'),
            ]
        );

        return redirect($response['redirect_url']);
    }
}
