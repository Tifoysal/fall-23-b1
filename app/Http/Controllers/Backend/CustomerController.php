<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list(){

        $customers=Customer::all();
        
        return view('admin.pages.customers.list',compact('customers'));
}
}