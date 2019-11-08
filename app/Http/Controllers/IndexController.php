<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 01.05.2019
 * Time: 12:20
 */

namespace App\Http\Controllers;


use App\Models\Product;

class IndexController extends Controller
{

    public function index()
    {
        $populars = Product::with('images')->get();

        return view('index', compact('populars'));
    }
    public function navigate()
    {
        $categories = Category::with('products.brand')->get();

        return view('navigation', compact('categories'));
    }

    public function stocks()
    {
        return view('stock');
    }
    public function delivery()
    {
        return view('delivery');
    }

    public function contacts()
    {
        return view('contact');
    }
    public function reviews()
    {
        return view('review');
    }

}
