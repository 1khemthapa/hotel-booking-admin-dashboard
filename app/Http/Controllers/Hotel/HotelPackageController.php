<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class HotelPackageController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('hotels')->user();

        $packages = $user->packages()->latest()->paginate(7);
        return view('Hotel.packages.listpackage', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::get();

        return view('Hotel.packages.createpackage', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hotelId = Auth::guard('hotels')->id();

        $validator = Validator::make($request->all(), [
            'hotel_id' => 'sometimes|nullable',
            'package_name' => 'required|max:100',
            'status' => 'required|in:active,inactive',
            'price' => 'required|numeric'
        ]);

        Package::create([
            'hotel_id' => $hotelId,
            'package_name' => $request->package_name,
            'status' => $request->status,
            'price' => $request->price,
        ]);
        return redirect()->route('hotelpackages.index')->with('success', 'Packages created successfully');
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
        $package = Package::findorfail($id);
        // $hotels=Hotel::orderBy('name')->get();
        return view('Hotel.packages.editpackage', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package = Package::findorfail($id);

        $validator = Validator::make($request->all(), [
            // 'hotel_id'=>'required|exists:hotels,id',
            'package_name' => 'required|max:100',
            'status' => 'required|in:active,inactive',
            'price' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->route('hotelpackages.index')->withInput()->withErrors($validator);
        }
        // $package->hotel_id=$request->hotel_id;

        $package->package_name = $request->package_name;
        $package->status = $request->status;
        $package->price = $request->price;
        $package->save();


        return redirect()->route('hotelpackages.index')->with('success', 'Packages created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::findorfail($id);
        $package->delete();
        return redirect()->route('hotelpackages.index')->with('success', 'Package deleted successfully');
    }
}
