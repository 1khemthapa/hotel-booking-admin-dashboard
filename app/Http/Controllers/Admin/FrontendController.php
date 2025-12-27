<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Hotel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $hotels = Hotel::latest()->get();
        $packages = Package::latest()->get();
        return view('frontend.index', compact('packages', 'hotels'));
    }

    public function create()
    {
        $bookedPackageIds = Booking::pluck('package_id')->toArray();
        $packages = Package::whereNotIn('id', $bookedPackageIds)->get();


        $availableHotelIds = $packages->pluck('hotel_id')->unique()->toArray();
        $hotels = Hotel::whereIn('id', $availableHotelIds)->get();

        return view('frontend.login', compact('hotels', 'packages'));
    }

    public function store(Request $request)
    {
        $exists = Booking::where('package_id')->exists();

        if ($exists) {
            return back()->with('error', 'This package is already booked.');
        }

        Booking::create([
            'pax'           => $request->pax,
            'hotel_id'      => $request->hotel_id,
            'customer_id'   => $request->customer_id,
            'customer_name' => $request->customer_name,
            'package_id'    => $request->package_id,
            'booked_date'   => now(),
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'notes'         => $request->notes,
        ]);

        return redirect()->route('frontend.index')->with('success', 'Package booked successfully!');
    }
}
