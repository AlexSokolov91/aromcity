<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
//        dd($request);
        $session_id = Session::getId();
        $request->validate([
            'client_name' => 'required|min:3|max:100',
            'client_phone' => 'required|min:6'
        ]);
//dd($request);
        $newOrder = Order::create($request->except('_token'));

        foreach ($request->product_id as $key => $id) {
//            $quantity = $request->quantity;
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $newOrder->id;
                $orderProduct->product_id = $id;
                $orderProduct->quantity = $request->quantity[$key];
                $orderProduct->save();

            \Cart::session($session_id)->remove($request->product_id[$key]);
            }

        return redirect()->back();

            }
        }
