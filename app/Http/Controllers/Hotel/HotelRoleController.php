<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HotelRoleController extends Controller //implements HasMiddleware
{
    // public static function middleware(): array
    // {return[
    //     new Middleware('permission:view roles',only:['index']),
    //     new Middleware('permission:edit roles',only:['edit']),
    //     new Middleware('permission:create roles',only:['create']),
    //     new Middleware('permission:delete roles',only:['destroy']),
    // ];
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelId = Auth::guard('hotels')->id(); // current hotel
        $roles = Role::where('guard_name', 'staffs')
            ->where('hotel_id', $hotelId)
            ->orderBy('display_name', 'asc')
            ->paginate(10);

        //     $roles = Role::where('guard_name','staffs')
        //     ->orderBy('name', 'asc')
        // ->orderBy('id', 'asc')
        // ->paginate(10);

        return view('Hotel.Roles.listroles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::where('guard_name', 'staffs')->get();
        return view('Hotel.Roles.createroles', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'display_name' => 'required|unique:roles',

        ]);
        if ($validator->passes()) {
            $hotelId = Auth::guard('hotels')->id();
            $role = Role::create([
                'display_name' => $request->display_name,
                'name' => Str::slug($request->display_name),
                'guard_name' => 'staffs',
                'hotel_id' => $hotelId,
            ]);


            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }

            return redirect()->route('hotelroles.index')->with('success', 'Role added successfully');
        } else {
            return redirect()->route('hotelroles.create')->withInput()->withErrors($validator);
        }
    }
    public function edit($id)
    {
        $role = Role::findorFail($id);
        $haspermissions = $role->permissions->pluck('display_name');
        $permissions = Permission::where('guard_name', 'staffs')->orderBy('display_name', 'ASC')->get();
        return view('Hotel.Roles.editroles', compact('role', 'permissions', 'haspermissions'));
    }

    public function update($id, Request $request)
    {
        $role = Role::findorFail($id);

        $validator = Validator::make($request->all(), [
            'display_name' => 'required',
        ]);
        if ($validator->passes()) {
            $role->display_name = $request->display_name;
            $role->name=Str::slug($request->display_name);

            $role->save();
            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }
            return redirect()->route('hotelroles.index')->with('success', 'Role updated successfully');
        } else {
            return redirect()->route('hotelroles.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $role = Role::findorFail($id);
        $role->delete();
        return redirect()->route('hotelroles.index')->with('success', 'Role deleted successfully');
    }
}
