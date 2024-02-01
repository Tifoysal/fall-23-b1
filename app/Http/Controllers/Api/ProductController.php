<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    public function allProducts()
    {
        try {
            $products = Product::all();
            return $this->responseWithSuccess($products, 'All products list.');
        } catch (Throwable $ex) {
            return $this->responseWithError($ex->getMessage()); 
        }
    }

    public function singleProduct($id)
    {
        try {
            $product = Product::find($id);
            return $this->responseWithSuccess($product, 'Single products list.');
        } catch (Throwable $ex) {
            return $this->responseWithError($ex->getMessage());
        }
    }

    public function registration(Request $request)
    {
        //validate

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>'customer',
            'password'=>bcrypt($request->password),
        ]);
        
        return $this->responseWithSuccess($user, 'Customer Registration success.');
       
        
    }
}
