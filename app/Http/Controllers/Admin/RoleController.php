<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {return[
        new Middleware('permission:view-role',only:['index']),
        new Middleware('permission:edit-role',only:['edit']),
        new Middleware('permission:create-role',only:['create']),
        new Middleware('permission:delete-role',only:['destroy']),
    ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where('guard_name','web')
        ->orderBy('name', 'asc')
    ->orderBy('id', 'asc')
    ->paginate(10);

        return view('roles.list',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions= Permission::where('guard_name','web')->orderBy('name','ASC')->get();
        return view('roles.create',['permissions'=>$permissions]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'display_name'=>'required|unique:roles',

        ]);


        if($validator->passes()){

          $role= Role::create([
              'display_name'=>$request->display_name,
            'name'=>Str::slug($request->display_name),
            ]);


            if(!empty($request->permission)){
                foreach($request->permission as $name){
                    $role->givePermissionTo($name);
                }
            }


            return redirect()->route('roles.index')->with('success','Role added successfully');


        }
        else{
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }
    public function edit($id){
        $role=Role::findorFail($id);
        $haspermissions=$role->permissions->pluck('name');
        $permissions= Permission::where('guard_name','web')->orderBy('name','ASC')->get();
        return view('roles.edit',compact('role','permissions','haspermissions'));
    }

    public function update($id,Request $request){

        $role=Role::findorFail($id);
        $validator=Validator::make($request->all(),[
            'display_name'=>'required'
        ]);
        if($validator->passes()){
            $role->display_name=$request->display_name;
            $role->name=Str::slug($request->display_name);
            $role->save();

            if(!empty($request->permission)){
                if($request->permission ){
                $role->syncPermissions($request->permission);
                }
                else{
                    $role->syncPermissions([]);
                }
            }
            return redirect()->route('roles.index')->with('success','Role updated successfully');
        }
        else{
            return redirect()->route('roles.edit',$id)->withInput()->withErrors($validator);
        }
    }

        public function destroy($id){
            $role=Role::findorFail($id);
            $role->delete();
            return redirect()->route('roles.index')->with('success','Role deleted successfully');
        }

}
