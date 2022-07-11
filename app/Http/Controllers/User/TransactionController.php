<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    public $base_url = "http://anggrek.herokuapp.com";
    //
    public function transaction()
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

        $transaction_waiting = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/transaction/bystatus/menunggupembayaran', [
            'id_user' => $user['profile']['id'],
            'payment_status' => "Menunggu Pembayaran"
        ]);

        $transaction_success = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/transaction/bystatus/pembayaranberhasil', [
            'id_user' => $user['profile']['id'],
            'order_status' => "Menunggu konfirmasi"
        ]);


        $confirm_waiting = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/transaction/bystatus/pembayaranberhasil', [
            'id_user' => $user['profile']['id'],
            'order_status' => "Sedang diproses"
        ]);

        $order_sent = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/transaction/bystatus/pembayaranberhasil', [
            'id_user' => $user['profile']['id'],
            'order_status' => "Dalam kiriman"
        ]);

        $order_done = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get($this->base_url . '/api/transaction/bystatus/pembayaranberhasil', [
            'id_user' => $user['profile']['id'],
            'order_status' => "Pesanan diterima"
        ]);

        $transaction_waiting = $transaction_waiting["Transactions"];

        $transaction_success = $transaction_success["Transactions"];

        $confirm_waiting = $confirm_waiting["Transactions"];

        $order_sent = $order_sent["Transactions"];

        $order_done = $order_done["Transactions"];

        return view('user/order', compact('transaction_waiting', 'transaction_success', 'confirm_waiting', 'order_sent', 'order_done'));
    }

    public function done($order_id)
    {
        $val = session()->get("coba");

        Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->put($this->base_url . '/api/order', [
            "id_transaksi" => $order_id,
            "order_status" => "Pesanan diterima",
            "no_resi" => ""

        ]);
    }
}
