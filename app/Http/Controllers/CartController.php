<?php

namespace App\Http\Controllers;

use App\Models\DbCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList(Request $request)
    {

        $cartItems = \Cart::session($request->cookie('table_number'))->getContent();
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::session($request->table_number)->add(array(
            'id' => $request->id,
            'name' => $request->product_name,
            'price' => $request->harga,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
            )
        );
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('home.products');

    }

    public function updateCart(Request $request)
    {
        \Cart::session($request->table_number);
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::session($request->table_number);
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart(Request $request)
    {
        \Cart::session($request->table_number);
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function checkout(Request $request){
        DbCart::create([
            'table_number' => $request->table_number,
            'cart_data' => serialize(\Cart::session($request->table_number)->getContent()),
        ]);
        \Cart::session($request->table_number)->clear();
        return redirect()->route('home.products');
    }

}
