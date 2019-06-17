<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;


class OrderController extends Controller
{
    public function index()
    {   
      $user = Auth::user();

      $orders = $user->orders;


        return view('order.index', compact('orders'));
    }

    public function getCheckout()
    {   
		if (!Session::has('cart')) {
		  	return view('shop.shopping-cart');
		  } 
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);

		$total = $cart->totalPrice;
		return view('shop.order', ['products' => $cart->items,'total' => $total]);

    }

    public function postCheckout(Request $request)
    {
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    

		return redirect()->route('products.index')->with('succes', 'Succesfully purchased products!');
    }


    public function create(Request $request)
    {
      $user = Auth::user();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order;
        
        

        $order->name = time();
        $order->user_id = Auth::user()->id;
        $order->cart = json_encode( $cart->items);

        $order->save();
        return redirect(route('order.index'));
    }

    public function save(Request $request)
    {
        $user = Auth::user();

        $order->cart = $request->cart;
        $order->save();

        return redirect(route('note') . '?u=' . $note->uuid);
    }
}

