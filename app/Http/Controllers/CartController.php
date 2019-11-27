<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function add($id)
    {
        $product  = Product::with('images')->find($id);
        $session_id = session_id();
        \Cart::session($session_id)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => $product,
        ));

        return response()->json(['count' => \Cart::session(Session::getId())->getContent() , 'session_id' => $session_id , 'product' => $product]);
//        return view('cart' , compact('product' , 'session_id'));
    }

    public function show()
    {
        $total = \Cart::session(Session::getId())->getTotal();
//        dd($total);
       $test = \Cart::getTotalQuantity();

//        dd(\Cart::session(session_id())->getContent());
        return view('cart', ['products' => \Cart::session(session_id())->getContent() ,
            'total' => $total]);
    }

    public function remove($id)
    {
        \Cart::session(Session::getId())->remove($id);
        return view('cart' , ['products' => \Cart::session(session_id())->getContent()]);

    }

    public function update($id)
    {
        \Cart::update($id);

    }

    public function counter()
    {

        return response()->json(['counter' => \Cart::session(Session::getId())->getTotalQuantity()]);
    }

    public function viewCart()
    {
        $populars = Product::with('images')->where('popular' , '1')->limit(2)->get()->random();
        return view('viewCart', [ 'products' => \Cart::session(session_id())->getContent(),
            'total' => \Cart::session(Session::getId())->getSubTotal() , 'populars' => $populars,
        ]);
    }
}