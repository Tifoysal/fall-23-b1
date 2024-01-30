<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function list()
    {
        $data['roles'] = Role::all();

        return view('admin.pages.roles.list', $data);
    }


    public function createForm()
    {
        return view('admin.pages.roles.form');
    }


    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),
        [
            'name'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        if($validate->fails())
        {
            // dd($validate->getMessageBag());
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

            Role::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'status'=>$request->status,
            ]);

            return redirect()->route('roles.list')->with('message', 'Role Created successfully.');

        //insert into categories ('name','desctiption') values($request->category_name,$request->category_description)


            //Query Builder


    }

        public function edit($id){
            $data['getRecord']= Role::find($id);


        return view('admin.pages.roles.edit',$data);


        }
        public function update($id,Request $request){
            $update=Role::find($id);

            $update->name = $request->name;
            $update->description = $request->description;
            $update->status = $request->status;
            $update->save();

            return redirect()->route('roles.list')->with('message', 'Role updated successfully.');        }

        public function  delete($id){
            $delete=Role::find($id);
            $delete->delete();
            return redirect()->route('roles.list')->with('message', 'Role deleted successfully.');
        }

        public function assign($id)
        {
            //dd($id);
            $assign=Role::find($id);
            return view ('admin.pages.roles.assignTask',compact('assign'));
        }

}

