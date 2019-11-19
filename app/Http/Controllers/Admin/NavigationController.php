<?php

namespace App\Http\Controllers\Admin;

use App\Models\Navigation;
use App\Models\NavigationEn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{
    public function index()
    {
        $navigations = NavigationEn::all();
        return view('admin/navigation' , compact('navigations'));
    }
}
