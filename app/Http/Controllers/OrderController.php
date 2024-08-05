<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\SweetAlertServiceProvider;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        if (!sizeof(auth()->user()->cart->cart_items)) {//1
            Alert::warning('Giỏ hàng trống'); //2
            return redirect(route('cart.show')); //
        } else {
            $order = auth()->user()->orders()->create([//3
                'total' => 0,
            ]);
            $total = 0;//
            foreach (auth()->user()->cart->cart_items as $item) {//4
                $order->order_items()->create([ //5
                    'product_id' => $item->product_id,
                    'quanity' => $item->quanity,
                    'total' => $item->product->display_price * $item->quanity,
                ]);
                $total = $total + $item->product->display_price * $item->quanity;
                $item->product->quanity = $item->product->quanity - 1;
                $item->product->save();
                $item->delete();//
            }
            $order->total = $total;//6
            $order->save();
            Alert::success('Thanh toán thành công!');
            return redirect(route('cart.show'));
        }
    }
}
