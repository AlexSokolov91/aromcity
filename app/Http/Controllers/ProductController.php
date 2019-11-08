<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductEn;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show(Request $request ,Product $product)
    {

//        dd($request->session()->get('locale'));
//        $locale = app()->getLocale();
        $locale = $request->session()->get('locale');
        if($locale == 'ru')
        $product = Product::with('images');
        $comments = Comment::where('product_id' , $product->id)->where('comment_status' , 1)->get();
        $similarProducts = Product::with('images')->where('category_id' , $product->category_id)
            ->where('id' , '!=' , $product->id)->get();

        if($locale == 'en')
        $product = ProductEn::with('images');
        $comments = Comment::where('product_id' , $product->id)->where('comment_status' , 1)->get();
        $similarProducts = ProductEn::with('images')->where('category_id' , $product->category_id)
            ->where('id' , '!=' , $product->id)->get();

        return view('viewProduct' , compact('product' , 'similarProducts' , 'comments', 'locale'));
    }


}
