<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use function GuzzleHttp\Promise\all;
use function GuzzleHttp\Promise\queue;
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
        $products = Product::select('id', 'name' , 'price')->get();

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

        $oneOrderPrice = OrderProduct::select('one_unit_price' , 'quantity')->where('order_id' , $id)->get()->toArray();

         $sum = 0;
    foreach ($oneOrderPrice as $value)
    {

        $sum += $value['one_unit_price'] * $value['quantity'];
    }

    return view('admin/order-show', compact('order', 'orderProducts' , 'products' , 'getAreas',
             'cities', 'wh' , 'find', 'status' , 'oneOrderPrice', 'sum'));
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
//        dd($request->all());
        $this->validate($request, [
//            'city' => 'required',
//            'warehouse' => 'required',
            'quantity' => 'min:1'

        ]);

        $order = Order::with('orderProducts')->find($id);
        $order->fill($request->except('_method', '_token'));
        $order->save();

        $orderProducts = OrderProduct::with('orders')->find($id);
        $orderProducts = $request->products;

        foreach ($orderProducts as $item) {
            OrderProduct::query()
                ->where('order_id', $item['order_product_id'])
                ->where('product_id', $item['product_id'])
                ->update(
                    ['quantity' => $item['quantity']]
                );
            $orderProducts->find($id);

//           $totalPrice = Order::with('orderProducts')->find($id);
//            $totalPrice->orderProducts->where('order_id' , $id);
//            $totalPrice->quantity;
//            dd($totalPrice);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
//
    }

    public function destroyProduct($id, Request $request)
    {

        $orderProducts = OrderProduct::find($id);
        $orderProducts->where('product_id' , $request->product_id);
        $orderProducts->delete();
        return redirect()->back();
    }

    public function createProduct(Request $request)
    {

        $create = new OrderProduct();
        $create->fill($request->except('_method', '_token'));
        $create->save();
        return redirect()->back();


    }

    public function totalOrderSum()
    {
        return view('admin/order-show');
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
}
