<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function  singleProductView($productId)
    {
        

        $singleProduct=Product::find($productId);
        // dd($singleProduct->name);
        return view('frontend.pages.product-view',compact('singleProduct'));

    }
}
