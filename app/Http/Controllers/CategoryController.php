<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function male(Request $request)
    {


        $category_id = 2;
        $product_id = Product::all('id')->first();
        $category = Product::all()->where('category_id' , $category_id);
        $brand_id = $request->get('brand_id');
        $filter = Product::where('brand_id' , $brand_id)->where('category_id' , $category_id)->get();
        $allMaleProduct = Product::where('category_id' , 2)->get();
        return view('male' , compact('category_id', 'category','product_id', 'brand_id', 'filter', 'allMaleProduct'));
    }
//    public function test($id)
//    {
//        $product  = Product::with('images')->find($id);
//        $session_id = Session::getId();
//        \Cart::session($session_id)->add(array(
//            'id' => $product->id,
//            'name' => $product->name,
//            'price' => $product->price,
//            'quantity' => 1,
//            'attributes' => $product,
//        ));
//
//        return view('male' , compact('product' , 'session_id'));
//    }



    public function female(Request $request)
    {

      $category_id = 1;
      $brand_id = $request->get('brand_id');
      $category = Product::all()->where('category_id' , $category_id);
      $filter = Product::where('brand_id' , $brand_id)->where('category_id' , '1')->get();
      $allFemaleProduct = Product::where('category_id', 1)->get();
      return view('female', compact('brand_id' , 'filter' , 'category' , 'allFemaleProduct', 'category_id'));
    }





}