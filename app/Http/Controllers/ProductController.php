<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductEn;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class ProductController extends Controller
{

    public function show(Request $request ,Product $product)
    {

//        dd($request->session()->get('locale'));
//        $locale = app()->getLocale();
        $locale = $request->session()->get('locale');
        if($locale == 'ru')
        $product = Product::with('images')->first();

        $comments = Comment::where('product_id' , $product->id)->where('comment_status' , 1)->get();
        $similarProducts = Product::with('images')->where('category_id' , $product->category_id)
            ->where('id' , '!=' , $product->id)->get();

        if($locale == 'en')
        $product = ProductEn::with('images')->first();
        $comments = Comment::where('product_id' , $product->id)->where('comment_status' , 1)->get();
        $similarProduct = ProductEn::with('images')->where('category_id' , $product->category_id)
            ->where('id' , '!=' , $product->id)->get();

        return view('viewProduct' , compact('product' ,
            'similarProducts' , 'comments', 'locale'));
    }

    public function showProduct($id, Request $request)
    {
        $showBrandProducts = Product::where('brand_id' , $id)->get();
        $category_id = '';
        $brand_id = $request->id;
        $category = Product::all('category_id');
//        $filter = Product::where('brand_id' , $brand_id)->where('category_id' , '1')->get();
        $filter = Product::all()->where('brand_id' , $id);

        $allBrandProducts = Product::where('brand_id', $id)->get();

        return view('productPage' , compact('showBrandProducts' , 'category', 'category_id', 'brand_id', 'filter', 'allBrandProducts'));
    }

}
