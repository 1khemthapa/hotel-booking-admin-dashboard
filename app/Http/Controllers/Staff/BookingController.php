<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Nullable;

class BookingController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new middleware('permission:view-booking', only: ['index']),
            new middleware('permission:create-booking', only: ['create']),
            new middleware('permission:edit-booking', only: ['edit']),
            new middleware('permission:delete-booking', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Auth::guard('staffs')->user();
        $hotel = $staff->hotel;
        $bookings = $hotel ? $hotel->bookings()->orderBy('ASC')->paginate(7) : collect();


        return view('Staff.Bookings.listbookings', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Auth::guard('hotels')->user();
        $customers = $hotels->customers()->latest()->get();
        $packages = $hotels->packages()->latest()->get();
        return view('Staff.Bookings.createbookings', compact('customers', 'packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hotelId = Auth::guard('hotels')->id();
        $validator = Validator::make($request->all(), [
            'hotel_id' => 'required|exists:hotels,id',
            'customer_id' => 'sometimes|nullable|exists:customers,id',
            'package_id' => 'sometimes|nullable|exists:table,id',
            'customer_name' => 'sometimes|nullable',
            'pax' => 'required|numeric',
            'booked_date' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required,'
        ]);
        if($validator->passes()){
        Booking::create([
            'hotel_id' => $hotelId,
            'customer_id' => $request->customer_id,
            'customer_name' => $request->customer_name,
            'package_id' => $request->package_id,
            'pax' => $request->pax,
            'booked_date' => $request->booked_date,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'notes' => $request->notes,
        ]);
        return redirect()->route('staffbookings.index')->with('success', 'Bookings created successfully');
    }
    else{
        return back()->withInput()->withErrors($validator);
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
        $hotels = Auth::guard('hotels')->user();
        $customers = $hotels->customers()->get();

        $packages = $hotels->packages()->get();
        $booking = Booking::findorfail($id);
        return view('Staff.Bookings.editbookings', compact('booking', 'customers', 'hotels', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findorfail($id);
        $validator = Validator::make($request->all(), [

            'customer_id' => 'required|exists:customers,id',
            'package_id' => 'required|exists:packages,id',
            'customer_name' => 'sometimes|nullable',
            'pax' => 'numeric',
            'booked_date' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',

        ]);
        if ($validator->passes()) {

        $booking->update($validator->validated(), ['hotel_id' => $booking->hotel_id]);

        return redirect()->route('staffbookings.index')->with('success', 'Bookings updated successfully');
    }
    else{
        return redirect()->route('staffbookings.index')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findorfail($id);
        $booking->delete();
        return redirect()->route('staffbookings.index')->with('success', 'Booking deleted successfully');
    }
}
