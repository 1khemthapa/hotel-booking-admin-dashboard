<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelId = Auth::guard('hotels')->id();
        $roles = Role::where('guard_name', 'staffs')->where('hotel_id', $hotelId)->get();

        $user = Auth::guard('hotels')->user();
        $staffs = $user->staffs()->latest()->paginate(7);

        return view('Hotel.Staffs.liststaffs', compact('staffs', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotelId = Auth::guard('hotels')->id();
        $roles = Role::where('guard_name', 'staffs')->where('hotel_id',$hotelId)->get();
        return view('Hotel.Staffs.createstaffs', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $hotelId = Auth::guard('hotels')->id();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required',
            'contact' => 'required|max:20',
            'address' => 'required',
            'password' => 'required|min:8',
            'hotel_id' => 'required|exists'
        ]);
        $staff =  Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'password' => bcrypt('password'),
            'address' => $request->address,
            'hotel_id'=>$hotelId,

        ]);
        $staff->assignRole($request->roles);
        return redirect()->route('hotelstaffs.index')->with('success', 'Staffs created successfully');
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
        $role = Role::where('guard_name', 'staffs')->get();
        $staff = Staff::findorfail($id);
        return view('Hotel.Staffs.editstaffs', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $staff = Staff::findorfail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required',
            'contact' => 'required|max:20',
            'address' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('hotelstaffs.edit', $staff->id)->withInput()->withErrors($validator);
        }
        $staff->update($validator->validated());
        return redirect()->route('hotelstaffs.index', compact('staff'))->with('success', 'Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = Staff::findorfail($id);
        $staff->delete();
        return redirect()->route('hotelstaffs.index')->with('success', 'staff deleted successfully');
    }
}
