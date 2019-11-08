<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use App\Models\NavigationEn;
use App\Models\Product;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
        public function index($locale, Navigation $navigation)
        {

           if($locale == 'ru')
               $navigation = Navigation::all();
        if($locale == 'en')
            $navigation->navigationEn();
        return view('navigation' , compact('navigation' , 'locale'));
        }
}
