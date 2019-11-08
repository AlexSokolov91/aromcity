<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('Admin/brands' , compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $request->validate([
//            'brand_name' => 'required|unique'
//
//
//        ]);
        if(Gate::denies('add-brands')){
            return redirect()->back()->with(['message' => 'У Вас нет прав']);
        }

        $createBrand = Brand::create($request->except('token'));
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandEdit = Brand::find($id);
        return view('Admin/brands', compact('brandEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brandEdit = Brand::find($id);
        $data = $request->except('_token');
        $brands = Brand::find($data['id']);
        if(Gate::allows('update-brands' , $brands))
        $brandEdit->fill($request->except('_token'));
        $brandEdit->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteBrand = Brand::find($id);
        $deleteBrand->delete();
        return redirect()->back();
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

}
