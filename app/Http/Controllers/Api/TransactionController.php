<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Response;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function createOrder(Request $request)
    {
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => request('transaction_user_id'),
            'tr_total' => request('transaction_total'),
            'tr_note' => request('transaction_note'),
            'tr_address' => request('transaction_address'),
            'tr_phone' => request('transaction_phone'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if ($transactionId) {
            $cartArray = request("cart_item");
            $json = json_decode($cartArray, true);

            foreach ($json as $value) {
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id' => $value['id'],
                    'or_qty' => $value['quantity'],
                    'or_price' => $value['price'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                $decreaseAmmount = Product::where('id', $value['id'])->first();
                $newQuantity = $decreaseAmmount->pro_number - $value['quantity'];
                Product::where('id', $value['id'])
                ->update(['pro_number' => $newQuantity]);
            }
        }
        return response($newQuantity, 200);
    }
}
