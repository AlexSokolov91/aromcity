<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function upload(Request $request , $id)
    {
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png'
            ]);
            $path = $request->file('image')->storePublicly('public');
            $img = new ProductImage();
            $img->product_id = $id;
            $img->path = $path;
            $img->save();
//            dd($path);
            return redirect()->back();
        }   else {
            return 'No input file';
        }
    }

    public function destroy($id)
    {
        $img = ProductImage::where('id' , $id);
        $img->delete();
        return Redirect::back()->with('delete' , 'The image has been successfully deleted!');

    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
