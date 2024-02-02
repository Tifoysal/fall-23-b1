<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function permission($id){
        $all_permission= Permission::all();

        $role=Role::with('permissions')->find($id);
       
        return view('admin.pages.roles.assignTask', compact('all_permission','role'));
    }

    public function AssignPermission(Request $request,$role_id){
        //validation
// dd($request->all());

        RolePermission::where('role_id',$role_id)->delete();
        
        foreach($request->permissions as $permission_id){
            RolePermission::create([
                'role_id'=>$role_id,
                'permission_id'=>$permission_id
            ]);
        }

        notify()->success('Permissions assigned.');
        return redirect()->back();
    }
}
