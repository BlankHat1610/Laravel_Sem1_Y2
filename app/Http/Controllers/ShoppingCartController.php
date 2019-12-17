<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * them gio hang
     */
    public function addProduct(Request $request, $id)
    {
        $product = Product::select('pro_name', 'pro_price', 'pro_sale', 'pro_avatar')->find($id);

        if (!$product) {
            return redirect('/');
        }

        $price = $product->pro_price;
        if ($product->pro_sale) {
            $price = $product->pro_price * (100 - $product->pro_sale) / 100;
        }

        \Cart::add(
            [
                'id' => $id,
                'name' => $product->pro_name,
                'qty' => 1,
                'price' => $price,
                'weight' => 0,
                'options' => [
                    'avatar' => $product->pro_avatar,
                    'sale' => $product->pro_sale,
                    'price_old' => $product->pro_price
                ]
            ]
        );

        return redirect()->back();
    }

    /**
     * @param $key
     * @return \Illuminate\Http\RedirectResponse
     *
     * delete item in cart
     */
    public function deleteProductItem($key)
    {
        \Cart::remove($key);
        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * danh sach gio hang
     */
    public function getListProduct()
    {
        $products = \Cart::content();
        return view('shopping.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * form pay
     */
    public function getFormPay()
    {
        $products = \Cart::content();
        return view('shopping.pay', compact('products'));
    }

    /**
     * save info of shopping cart
     */
    public function saveInfoShoppingCart(Request $request)
    {
        $totalMoney = str_replace(',', '', \Cart::subtotal(0));
        $transactionId = Transaction::insertGetId([
            'tr_user_id' => get_data_user('web'),
            'tr_total' => (int)$totalMoney,
            'tr_note' => $request->note,
            'tr_address' => $request->address,
            'tr_phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($transactionId) {
            $products = \Cart::content();
            foreach ($products as $product) {
                Order::insert([
                    'or_transaction_id' => $transactionId,
                    'or_product_id' => $product->id,
                    'or_qty' => $product->qty,
                    'or_price' => $product->options->price_old,
                    'or_sale' => $product->options->sale,
                ]);

//                $product->pro_pay += 1;
//                Product::insert([
//                    'pro_pay' => $product->pro_pay += 1,
//                ]);
            }
        }

        \Cart::destroy();

        return redirect('/');
    }
}
