<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HeaderBannerImage;
use App\Models\Navigation;
use App\Models\NavigationEn;
use App\Models\Product;
use App\Models\SliderImage;
use function foo\func;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function __construct()
    {
        \Illuminate\Support\Facades\View::share('categories', Category::with('products.brand')->get());
        \Illuminate\Support\Facades\View::share('headerBannerImages', HeaderBannerImage::get());
        \Illuminate\Support\Facades\View::share('logo', '/img/general/logo.png');
        \Illuminate\Support\Facades\View::share('brands', Brand::with('product')->get());
        \Illuminate\Support\Facades\View::share('countries', Product::all('country')->unique('country'));
        \Illuminate\Support\Facades\View::share('family', Product::all('family')->unique('family'));
        \Illuminate\Support\Facades\View::share('type', Product::all('type')->unique('type'));
        \Illuminate\Support\Facades\View::share('navigations', Navigation::with('navigationEn')->get());

    }
}




