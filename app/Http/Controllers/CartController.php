<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart_item;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $cart = auth()->user()->cart;
        $orders = auth()->user()->orders->sortByDesc('created_at');
        return view(
            'cart/index',
            [
                'cart' => $cart,
                'orders' => $orders,
            ]
        );
    }

    public function addItemToCart($product)
    {
        $data = request(); //1
        $quanity = $data['quanity']; //

        if ($quanity == 0) { //2
            Alert::warning('Làm ơn hãy chọn số lượng'); //3
            return redirect(route('product.show', $product)); //
            
        } else {
            $product = Product::find($product); //4
            $existItem = auth()->user()->cart->cart_items()->firstWhere('product_id', $product->id); //
            if ($existItem) //5
            {
                $existItem->quanity = $existItem->quanity + $quanity; //6
                $existItem->save(); //
            } else {
                $item = auth()->user()->cart->cart_items()->create([ //7
                    'quanity' => $quanity,
                    'product_id' => $product->id,
                ]); //
            }
            Alert::success('Thêm vào giỏ thành công'); //8
            return redirect(route('product.show', $product)); //

        }
    }

    public function delete($item)
    {
        $item = Cart_item::findOrFail($item);
        $item->delete();
        return redirect(route('cart.show'));
    }
}
