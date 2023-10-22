<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list(){

        $brands=Brand::all();
        // dd($box);

        return view('admin.pages.brand.list',compact('brands'));
    }

    public function createForm()
    {
        return view('admin.pages.brand.form');
        
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Brand::create(
            [
                'name'=>$request->brand_name,
                'description'=>$request->description,
            ]
        );

        return redirect()->back();

    }
}
