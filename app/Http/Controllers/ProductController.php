<?php

namespace App\Http\Controllers;

use App\Product;
use App\Form;
use App\Cart;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::all();
        return view('products.index',['products' => Product::paginate(12)]);
    }
    

    public function getProductCatergory(Request $request, $id){
        $products = Product::where('category_id', $id)
        ->orderBy('name', 'desc')
        ->get();
        return view('products.index',['products' => $products]);
    }


    public function getAddToCart(Request $request, $id)
    {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        
        return redirect()->route('products.index');

    }

    public function getRemoveFromCart(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);
        
        if($cart->totalQty == 0){
            $request->session()->flush('cart');
        }
        else{
            $request->session()->put('cart', $cart);
        }
        
        return redirect()->route('products.shoppingCart');

    }

    public function getReduceFromCart(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($id);
        
        if($cart->totalQty == 0){
            $request->session()->flush('cart');
        }
        else{
            $request->session()->put('cart', $cart);
        }
        
        
        return redirect()->route('products.shoppingCart');

    }

    public function getIncreaseFromCart(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increase($id);
        
        $request->session()->put('cart', $cart);
           
        return redirect()->route('products.shoppingCart');

    }


    public function getCart()
    {

        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
       
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
