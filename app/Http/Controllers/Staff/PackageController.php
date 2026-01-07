<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PackageController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new middleware('permission:view-customer', only: ['index']),
            new middleware('permission:create-customer', only: ['create']),
            new middleware('permission:edit-customer', only: ['edit']),
            new middleware('permission:delete-customer', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $staff = Auth::guard('staffs')->user();
        $hotel = $staff->hotel;
        $packages = $hotel ? $hotel->packages()->latest()->paginate(7) : collect();
        return view('Staff.Packages.listpackages', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::get();

        return view('Staff.Packages.createpackages', compact('hotels'));
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
        return redirect()->route('staffpackages.index')->with('success', 'Packages created successfully');
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
        return view('Staff.Packages.editpackages', compact('package'));
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
            return redirect()->route('staffpackages.index')->withInput()->withErrors($validator);
        }
        // $package->hotel_id=$request->hotel_id;

        $package->package_name = $request->package_name;
        $package->status = $request->status;
        $package->price = $request->price;
        $package->save();


        return redirect()->route('staffpackages.index')->with('success', 'Packages created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::findorfail($id);
        $package->delete();
        return redirect()->route('staffpackages.index')->with('success', 'Package deleted successfully');
    }
}
