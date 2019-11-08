<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FilterController extends Controller
{

//    public function showBrandsFemale(Request $request)
//    {
//        $brand_id = $request->get('brand_id');
//
//        return view('filters', ['brand_id' => $brand_id]);
//    }

    public function productsFilter(Request $request)
    {

        $brand_id = $request->get('brand_id');
        $category = $request->get('category_id');
        $country = $request->get('country');
        $family = $request->get('family');
        $type = $request->get('type');

        $filter = Product::where('category_id' , $category)->get();
        if(!empty($brand_id))
        $filter = Product::when($brand_id, function ($query) use ($brand_id, $category){
            return $query->whereIn('brand_id' , $brand_id)->whereIn('category_id' , $category);
        })->get();

        if(!empty($country))
            $filter = Product::when($country, function ($query) use($country, $category){
                return $query->whereIn('country' , $country)->whereIn('category_id' , $category);
            })->get();
        if(!empty($family))
            $filter = Product::when($family , function ($query) use($country, $category , $family , $brand_id){
                return $query->whereIn('family' , $family)->whereIn('category_id' , $category);
            })->get();
        if(!empty($type))
            $filter = Product::when($type, function ($query) use ($type, $category) {
                return $query->whereIn('type', $type)->whereIn('category_id', $category);
                    })->get();

        return view('product', [ 'filter' => $filter , 'brand_id' => $brand_id , 'country' => $country, 'family' => $family, 'type' => $type]);
    }

}
