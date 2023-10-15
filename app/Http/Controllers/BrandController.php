<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list(){
        return view('admin.pages.brand.list');
    }
}
