<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $products = Product::all();
       return view('admin/products' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        $categoryProduct = Category::all();
        $product = Product::all();
        $countries = Product::all()->pluck('country')->unique();
        $type = Product::all()->pluck('type')->unique();
        $family = Product::all()->pluck('family')->unique();
        $gender = Product::all()->pluck('gender')->unique();
        $volume = Product::all()->pluck('volume')->unique();
        return view('admin/product-create' , compact('categoryProduct', 'product' ,
            'brand', 'countries', 'type' , 'family' , 'gender', 'volume'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        Product::create($request->except('_token'));
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('images')->find($id);
        $productCategory = Category::all();
        $countries = Product::all()->pluck('country')->unique();
        $type = Product::all()->pluck('type')->unique();
        $family = Product::all()->pluck('family')->unique();
        $gender = Product::all()->pluck('gender')->unique();
        $images = ProductImage::all()->where('product_id', $id);
//        $test =
//        dd($images);
        return view('admin/product-show', compact('product' , 'productCategory',
            'countries', 'type' , 'family', 'gender', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $product =Product::with('images' , 'category')->find($id);
        $product->fill($request->except('_method','_token'));
        $product->save();
        return redirect()->route('products.index' , compact('product'));}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id);
        $delete->delete();
        return redirect()->back();
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
