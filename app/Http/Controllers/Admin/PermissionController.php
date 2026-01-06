<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Str;

class PermissionController extends Controller  implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission:view-permission',only:['index']),
            new Middleware('permission:edit-permission',only:['edit']),
            new Middleware('permission:create-permission',only:['create']),
            new Middleware('permission:delete-permission',only:['destroy']),
        ];
    }


    //This method will show permissino page
    public function index(){
        $permissions=Permission::orderBy('created_at','ASC')->paginate(10);
        return view('permissions.list',[
        'permissions'=>$permissions]);
    }
    //This method will show create permission page
    public function create(){
        return view ('permissions.create');
    }
    //This method will insert a permission in DB
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'display_name'=>'required|unique:permissions',
            'guard_name'=>'required|string|in:web,hotels,staffs',
        ]);
        if($validator->passes()){
            Permission::create([
                'display_name'=>$request->display_name,
                'name'=>Str::slug($request->display_name),
                'guard_name'=>$request->guard_name,
            ]);

            return redirect()->route('permissions.index')->with('success','Permission added successfully');


        }
        else{
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }

    }
    //This method will show edit permission page
    public function edit($id){
        $permission=Permission::findorFail($id);
        return view('permissions.edit',compact('permission'));

    }
    //This method will show update permission
    public function update($id, Request $request){
        $permission=Permission::findorFail($id);
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:permissions,name,'.$id.',id'
        ]);
        if($validator->passes()){

            $permission->name=$request->name;
            $permission->save();
            return redirect()->route('permissions.index')->with('success','Permission updated successfully');

        }
        else{
            return redirect()->route('permissions.edit',$id)->withInput()->withErrors($validator);
        }

    }
    //This method will delete a permission in DB
    public function destroy($id){
        $permission=Permission::findorFail($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','Role deleted successfully');
    }

}
