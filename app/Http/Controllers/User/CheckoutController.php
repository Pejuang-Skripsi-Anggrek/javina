<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Json;

class CheckoutController extends Controller
{
    public $base_url = "http://anggrek.herokuapp.com";
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
        ])->get($this->base_url . '/api/user');

        // dd($val);

        $cart = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/carts', [
            'id_user' => $user['profile']['id']
        ]);

        $province = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/province');

        $city = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/city');

        $province = $province['data_provinsi'];

        $city = $city['data_kota'];

        $cart = $cart['cart'];

        $total = 0;

        foreach ($cart as $c) {
            $total = $total + $c['spec']['publish_price'] * $c['qty'];
        }

        return view('user/checkout', compact('cart', 'total', 'province', 'city'));
    }

    public function midtrans(Request $request)
    {
        $val = session()->get("coba");

        //Street
        $jalan = $request->input('jalan');

        //Province
        $province = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/province');

        $province = $province['data_provinsi'];

        foreach ($province as $p)
            if ($p['province_id'] == $request->input('province')) {
                $province = $p['province'];
            }

        //City
        $city = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/city', [
            "id" => $request->input('province')
        ]);

        $city = $city['data_kota'];


        foreach ($city as $p)
            if ($p['city_id'] == $request->input('city')) {
                $city = $p['city_name'];
            }


        //User
        $user = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/user');

        $address = $jalan . ", " . $city . ", " . $province;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get(
            $this->base_url . '/api/transaction',
            [
                'id_user' => $user['profile']['id'],
                'shipping_cost' => $request->input('price_total'),
                'kurir' => $request->input('courier'),
                'address' =>    $address
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
        ])->get($this->base_url . '/api/city', [
            'id' => $id
        ]);

        $city = $city['data_kota'];


        return json_encode($city);
    }

    public function shipping($id, $courier)
    {
        $val = session()->get("coba");

        if (!isset($val)) {
            return redirect('/login');
        }

        $shipping = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/ongkir', [
            'origin' => '256',
            'destination' => $id,
            'weight' => '1',
            'courier' => $courier
        ]);

        $shipping = $shipping[0]['costs'];

        return json_encode($shipping, JSON_PRETTY_PRINT);
    }
}
