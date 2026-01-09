<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
return [
    new Middleware('permission:view-hotel',only:['index']),
            new Middleware('permission:edit-hotel',only:['edit']),
            new Middleware('permission:create-hotel',only:['create']),
            new Middleware('permission:delete-hotel',only:['destroy']),
];
    }
    /**
     * Display a listing of the resource.
     */
    public function hotels(){
        $hotels=Hotel::latest()->get();
        $users=User::latest()->get();
        return view ('dashboard',compact('hotels','users'));
    }

    public function index()
    {
        $users=User::all();
        $hotels=Hotel::latest()->paginate(7);
        return view('hotels.list',compact('hotels','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::latest()->get();
        $roles=Role::all();
        return view ('hotels.add',compact('users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255|min:5',
            'contact'=>'required',
            'address'=>'required',
            'email'=>'required',
            'username'=>'required',
            'password'=>'required|min:8|confirmed'

        ]);
        if ($validator->passes()) {

        $hotel=Hotel::create([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'status'=>$request->status,

        ]);

        return redirect()->route('hotels.index')->with('success','Hotel created successfully');
    }else{
        return back()->withErrors($validator)->withInput();
}
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
        $hotel=Hotel::findorfail($id);
        return view('hotels.edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel=Hotel::findorfail($id);
        $validator=Validator::make($request->all(),[
            'name'=>'required|max:255|min:5',
            'contact'=>'required',
            'address'=>'required',
            'email'=>'required',

        ]);
        if($validator->passes()){

            $hotel->name=$request->name;
            $hotel->contact=$request->contact;
            $hotel->address=$request->address;
            $hotel->email=$request->email;
            $hotel->status=$request->status;
            $hotel->remarks=$request->remarks;

            $hotel->save();
        $hotel->syncRoles([$request->role]);
            return redirect()->route('hotels.index')->with('success','Hotel updated successfully');

    }
    else{
        return redirect()->route('hotels.edit')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotels=Hotel::findorfail($id);
        $hotels->delete();
        return redirect()->route('hotels.index')->with('sucess','Hotel deleted successfully');
    }
}
