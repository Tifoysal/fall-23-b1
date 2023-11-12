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
}
