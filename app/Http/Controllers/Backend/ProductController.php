<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    

    public function list()
    {
      $products=Product::with(['category','brand'])->paginate(5);
      // dd($products);
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
      $validate=Validator::make($request->all(),[
            'brand_id'=>'required',
            'category_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required|numeric|min:10',
            'product_stock'=>'required|numeric',
      ]);

      if($validate->fails())
      {

        // notify()->error($validate->getMessageBag());
        // return redirect()->back();

        return redirect()->back()->withErrors($validate);
      }

      $fileName=null;
      if($request->hasFile('image'))
      {
          $file=$request->file('image');
          $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
         
          $file->storeAs('/uploads',$fileName);

      }
      Product::create([
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'name'=>$request->product_name,
                'price'=>$request->product_price,
                'description'=>$request->product_description,
                'stock'=>$request->product_stock,
                'image'=>$fileName
      ]);


      // return redirect()->back();
      return redirect()->route('product.list');
      
    }


}
