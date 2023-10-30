<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    

    public function list()
    {
      $products=Product::paginate(5);
      return view('admin.pages.product.list',compact('products'));
    }


    public function createForm()
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('admin.pages.product.form',compact('brands','categories'));
    }

    public function store(Request $request)
    {

      Product::create([
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'name'=>$request->product_name,
                'price'=>$request->product_price,
                'description'=>$request->product_description,
                'stock'=>$request->product_stock
      ]);


      // return redirect()->back();
      return redirect()->route('product.list');
      
    }


}
