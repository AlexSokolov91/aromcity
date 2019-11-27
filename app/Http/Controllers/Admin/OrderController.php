<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use LisDev\Delivery\NovaPoshtaApi2;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin/order-index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('orderProducts')->find($id);
        $orderProducts = OrderProduct::with('product')->where('order_id', $id)->get();
//        $productId = OrderProduct::all('product_id')->find($id);
        $products = Product::select('id', 'name')->get();

        $url = "http://novaposhta.ua/v2.0/json/Address/getAreas";
        $client = new Client();
        $response = $client->request('POST', $url, [
            "json" => [
                "apiKey" => "14e531339007f5b8f24bdea4ce0b6fd3" ,
                "modelName" => "Address" ,
                "calledMethod" => "getAreas" ,
                "methodProperties" => [
                    "ref" => "",
                    "AreasCenter" => ""
                ]
            ]]);

        $getAreas = collect(json_decode($response->getBody()->getContents()));

        $np = new NovaPoshtaApi2('14e531339007f5b8f24bdea4ce0b6fd3');
        $cities = $np->getCities();
        $wh = $np->getWarehouses('' , '');

        $np = new NovaPoshtaApi2('14e531339007f5b8f24bdea4ce0b6fd3');
        $find = $np->findCityByRegion();
       $status = ['Новый заказ','Подтвержден', 'Перезвонить', 'Неправильный номер', 'Отказ'];
        return view('admin/order-show', compact('order', 'orderProducts' , 'products' , 'getAreas',
             'cities', 'wh' , 'find', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        return view('admin/order-show' );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'city' => 'required',
            'warehouse' => 'required',
            'quantity' => 'min:1'

        ]);

        $order = Order::with('orderProducts')->find($id);
        $order->fill($request->except('_method','_token'));
        $order->save();
//        dd($request->all());


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
}
