<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Navigation;
use App\Models\NavigationEn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends Controller
{
    public function index()
    {
        $navigations = Navigation::all();
        $brands = Brand::all();
        return view('admin/navigation' , compact('navigations' , 'brands'));
    }
    public function navigationEn()
    {
        $navigationsEn = NavigationEn::all();
        return view('admin/navigationEn' , compact('navigationsEn'));
    }

    public function update(Request $request, $id)
    {
    $navigateEditCategory = Navigation::find($id);
    $navigateEditCategory->fill($request->only('active'));
    $navigateEditCategory->save();
    return redirect()->route('admin.navigations' , compact('navigateEditCategory'));
    }
    public function brandUpdate(Request $request, $id)
    {
        $navigateUpdateBrands = Brand::find($id);
        $navigateUpdateBrands->update($request->only('active'));
        $navigateUpdateBrands->save();
//        dd($navigateUpdateBrands);
        return redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
