<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\User;
use ArrayAccess;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class UserController extends Controller //implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission:view-user',only:['index']),
            new Middleware('permission:edit-user',only:['edit']),
            new Middleware('permission:create-user',only:['create']),
            new Middleware('permission:delete-user',only:['destroy'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users=User::latest()->with('role')->paginate(10);
        return view('users.list',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels=Hotel::latest()->get();
        $roles=Role::where('guard_name','web')->get();
        return view('users.adduser',compact('roles','hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'name'=>'required|max:50',
            'email'=>'required',


        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt('password'),

        ]);
        $user->assignRole($request->role);
        return redirect()->route('users.index')->with('success','User created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findorfail($id);
        $roles=Role::where('guard_name','web')->orderBy('name','ASC')->get();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::findorfail($id);
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email,'.$id.',id'
        ]);
        if($validator->fails()){
            return redirect()->route('users.edit',$id)->withInput()->withErrors($validator);
        }
        $user->name=$request->name;
        $user->email=$request->email;

        $user->save();

        $user->syncRoles($request->roles);
        return redirect()->route('users.index')->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $user=User::findorfail($id);
       $user->delete();
       return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
