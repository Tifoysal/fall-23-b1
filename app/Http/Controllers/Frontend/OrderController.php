<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderPlace(Request $request)
    {
       
        //validation here

        // dd($request->all());

        $cart=session()->get('vcart');
        
        //create order
        $order=Order::create([
            'user_id'=>auth()->user()->id,
            'status'=>'pending',
            'total_price'=>array_sum(array_column($cart,'subtotal')),
            'address'=>$request->address,
            'receiver_mobile'=>$request->phone_number,
            'receiver_name'=>$request->name,
            'receiver_email'=>$request->email_address,
        ]);


        // dd($cart);
        //create order details
        foreach($cart as $key=> $item)
        {
            OrderDetails::create([
                'order_id'=>$order->id,
                // 'product_id'=>$key,
                'product_id'=>$item['id'],
                'quantity'=>$item['quantity'],
                'subtotal'=>$item['subtotal'],
            ]);
        }

        session()->forget('vcart');
        notify()->success('Order placed success.');
        return redirect()->back();   



    }

    public function cancelOrder($order_id)
    {

        $order=Order::find($order_id);
        if($order)
        {
            $order->update([
                'status'=>'cancelled'
            ]);
        }

        notify()->success('Order Cancelled');
       return redirect()->back();
        
    }
}
