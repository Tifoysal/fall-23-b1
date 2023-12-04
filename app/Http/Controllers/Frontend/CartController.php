<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {

        return view('frontend.pages.cart');
    }


    public function addToCart($pId)
    {
        $product=Product::find($pId);

        $cart=session()->get('vcart');
        if($cart){//not empty

            if(array_key_exists($pId,$cart)){//yes
                //qty update
                $cart[$pId]['quantity']=$cart[$pId]['quantity'] + 1;
                $cart[$pId]['subtotal']=$cart[$pId]['quantity'] * $cart[$pId]['price'];

            session()->put('vcart',$cart);
            notify()->success('Quantity updated.');
            return redirect()->back();


            }else{//no
                //add to cart
                $cart[$pId]=[
                    'id'=>$pId,
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'quantity'=>1,
                    'subtotal'=>1 * $product->price,
            ];

            session()->put('vcart',$cart);
            notify()->success('Product added to cart successfully.');
            return redirect()->back();

            }

            return redirect()->back();

        }else{//empty
            //add to cart
            $newCart[$pId]=[
                    'id'=>$pId,
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'quantity'=>1,
                    'subtotal'=>1 * $product->price,
            ];

            session()->put('vcart',$newCart);
            notify()->success('Product added to cart successfully.');
            return redirect()->back();

        }



        return view('frontend.pages.cart');
    }

    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
}
