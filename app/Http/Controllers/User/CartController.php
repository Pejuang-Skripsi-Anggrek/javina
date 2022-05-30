<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
        public $base_url = "http://anggrek.herokuapp.com";
        //
        public function cart()
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


                $cart = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/carts', [
                        'id_user' => $user['profile']['id']
                ]);

                $cart = $cart['cart'];

                $total = 0;

                $product_dummy = "https://dummyimage.com/100x100/f0f0f0/0f0f0f.png&text=dummy+100x100";

                foreach ($cart as $c) {
                        $total = $total + $c['spec']['publish_price'] * $c['qty'];
                }


                return view('user/cart', compact('cart', 'total', 'product_dummy'));
        }

        public function cartAdd(Request $request, $id)
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

                Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->post($this->base_url . '/api/cart/store', [
                        'id_user' => $user['profile']['id'],
                        'id_product' => $id,
                        'id_spec' => $request->input('spec'),
                        'qty' => $request->input('qty')
                ]);

                return redirect()->back();
        }

        public function cartDel(Request $request)
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

                $delete = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get($this->base_url . '/api/cart/delete', [
                        'id_product' => $request->input('product_id'),
                        'id_user' => $user['profile']['id']
                ]);

                return $delete;

                return redirect('/cart');
        }
}
