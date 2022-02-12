<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
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
                ])->get(env('APP_URL') . 'api/user');


                $cart = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get(env('APP_URL') . 'api/carts', [
                        'id_user' => $user['profile']['id']
                ]);

                $cart = $cart['cart'];

                $total = 0;

                foreach ($cart as $c) {
                        $total = $total + $c['spec']['publish_price'] * $c['qty'];
                }


                return view('user/cart', compact('cart', 'total'));
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
                ])->get(env('APP_URL') . 'api/user');

                Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->post(env('APP_URL') . 'api/cart/store', [
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
                ])->get(env('APP_URL') . 'api/user');

                $delete = Http::withHeaders([
                        'Accept' => 'application/json',
                        'X-Requsted-With' => 'XML/HttpRequest',
                        'Authorization' => "Bearer " . $val
                ])->get(env('APP_URL') . 'api/cart/delete', [
                        'id_product' => $request->input('product_id'),
                        'id_user' => $user['profile']['id']
                ]);

                return $delete;

                return redirect('/cart');
        }
}