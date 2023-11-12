<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
    public function list()
    {

        $categories=Category::all();
       return view('admin.pages.category.list',compact('categories'));
    }

    
    public function createForm()
    {
       
        return view('admin.pages.category.form');
    }

    public function store(Request $request)
    {


        $validate=Validator::make($request->all(),
        [
            'category_name'=>'required',
            'category_description'=>'required',
        ]);

        if($validate->fails())
        {
            // dd($validate->getMessageBag());
            return redirect()->back();
        }
        //database create (one time) (done)
            
        //table create (table generated from migration )---done

        //Data store query
            //Eloquent ORM---> Model----> function

             //left table column name => right side input field name
            Category::create([
                'name'=>$request->category_name,
                'description'=>$request->category_description
            ]);

            return redirect()->back();

        //insert into categories ('name','desctiption') values($request->category_name,$request->category_description)


            //Query Builder 


    }


}
