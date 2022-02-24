<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
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
        ])->get(env('APP_URL') . 'api/user');

        $transaction_success = Http::withHeaders([
            'Accept' => 'application/json',
            'X-Requsted-With' => 'XML/HttpRequest',
            'Authorization' => "Bearer " . $val
        ])->get(env('APP_URL') . 'api/transaction/bystatus/menunggupembayaran', [
            'id_user' => $user['profile']['id'],
            'payment_status' => "Menunggu Pembayaran"
        ]);

        $transaction_success = $transaction_success["Transactions"];

        // dd($transaction_success);

        return view('user/order', compact('transaction_success'));
    }
}