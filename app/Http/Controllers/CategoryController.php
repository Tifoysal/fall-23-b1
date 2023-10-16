<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function list()
    {
       return view('admin.pages.category.list');
    }

    
    public function createForm()
    {
        return view('admin.pages.category.form');
    }


}
