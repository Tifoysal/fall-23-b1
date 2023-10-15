<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function list()
    {
       return view('admin.pages.category.list');
    }
}
