<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class HotelCustomerController extends Controller //implements HasMiddleware
{

    // public static function middleware():array
    // {
    //     return [
    //         new middleware('permission:view customers',only:['index']),
    //         new middleware('permission:create customers',only:['create']),
    //         new middleware('permission:edit customers',only:['edit']),
    //         new middleware('permission:delete customer',only:['destroy']),
    //     ];
    // y
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth::guard('hotels')->user();
        $customers = $users->customers()->latest()->paginate(7);

        // $customers=Customer::latest()->paginate(10);
        return view('Hotel.customers.listcustomers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::get();
        return view('Hotel.customers.createcustomers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hotelId = Auth::guard('hotels')->id();
        // dd($hotelId);
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max-255',
            'contact' => 'required|numeric',
            'email' => 'required',
            'address' => 'required|max:255',
            'hotel_id' => 'sometimes|nullable'
        ]);
        if ($validator->passes()) {
            Customer::create([
                'full_name' => $request->full_name,
                'hotel_id' => $hotelId,
                'contact' => $request->contact,
                'email' => $request->email,
                'address' => $request->address,
                'dob' => $request->dob,
            ]);
            return redirect()->route('hotelcustomers.index')->with('success', 'Customer created successfully');
        } else {
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
        $customer = Customer::findorfail($id);
        return view('Hotel.customers.editcustomer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findorfail($id);
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'contact' => 'required|numeric',
            'email' => 'required',
            'address' => 'required|max:255',
        ]);
        if ($validator->passes()) {

            $customer->full_name = $request->full_name;
            $customer->contact = $request->contact;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->save();
            return redirect()->route('hotelcustomers.index')->with('success', 'Customer updated successfully');
        } else {
            return redirect()->route('hotelcustomers.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findorfail($id);
        $customer->delete();
        return redirect()->route('hotelcustomers.index')->with('success', 'Customer deleted successfully');
    }
}
