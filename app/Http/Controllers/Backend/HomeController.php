<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    public function home(){
        return view('admin.pages.home');
    }

    public function aboutUs()
    {
       return view('admin.about-us');
    }

}
