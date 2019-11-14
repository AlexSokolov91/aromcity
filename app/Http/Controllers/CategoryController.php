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

    public function female(Request $request)
    {

      $category_id = 1;
      $brand_id = $request->get('brand_id');
      $category = Product::all()->where('category_id' , $category_id);
      $filter = Product::where('brand_id' , $brand_id)->where('category_id' , '1')->get();
      $allFemaleProduct = Product::where('category_id', 1)->get();
      return view('female', compact('brand_id' , 'filter' , 'category' , 'allFemaleProduct', 'category_id'));
    }
//    public function products(Request $request)
//    {
//       $showBrandProducts = Product::where('brand_id' , $id)->get();
//        $category_id = 1;
//        $brand_id = $request->get('brand_id');
//        $category = Product::all()->where('category_id' , $category_id);
//        $filter = Product::where('brand_id' , $brand_id)->where('category_id' , '1')->get();
//        $allFemaleProduct = Product::where('category_id', 1)->get();
//        return view('productPage' , compact('showBrandProducts' , 'category_id', 'category', 'brand_id', 'filter', 'allFemaleProduct'));
//    }




}