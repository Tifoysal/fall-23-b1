<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $products=Product::all();
        // dd($products);
        return view('frontend.pages.home',compact('products'));
    }


    public function search(Request $request)
    {
        // dd(request()->all())

        if($request->search)
        {
            $products=Product::where('name','LIKE','%'.$request->search.'%')->get();
            //select * from products where name like % akash %;
        }else{
            $products=Product::all();
        }
       

        
        return view("frontend.pages.search",compact('products'));
    }
}
