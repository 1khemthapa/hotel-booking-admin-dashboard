<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\Booking;
// use App\Models\Customer;
// use App\Models\Hotel;
// use App\Models\Package;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;
// use Illuminate\Support\Facades\Auth;
// use phpDocumentor\Reflection\Types\Nullable;

// class BookingController extends Controller implements HasMiddleware
// {

//     public static function middleware():array
//     {
//         return [
//             new middleware('permission:view bookings',only:['index']),
//             new middleware('permission:create bookings',only:['create']),
//             new middleware('permission:edit bookings',only:['edit']),
//             new middleware('permission:delete bookings',only:['destroy']),
//         ];
//     }
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $user=Auth::user();
//         $bookings=Booking::latest()->paginate(10);
//     return view('bookings.listbooking',compact('bookings'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         $customers=Customer::latest()->get();
//         $hotels=Hotel::latest()->get();
//         $packages=Package::latest()->get();
//         return view('bookings.addbooking',compact('customers','hotels','packages'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $validator=Validator::make($request->all(),[
//             'hotel_id'=>'required|exists:hotels,id',
//             'customer_id'=>'sometimes|nullable|exists:customers,id',
//             'package_id'=>'sometimes|nullable|exists:table,id',
//             'customer_name'=>'sometimes|nullable',
//             'pax'=>'required|numeric',
//             'booked_date'=>'required',
//             'check_in_date'=>'required',
//             'check_out_date'=>'required,'
//         ]);
//         Booking::create([
//             'hotel_id'=>$request->hotel_id,
//             'customer_id'=>$request->customer_id,
//             'customer_name'=>$request->customer_name,
//             'package_id'=>$request->package_id,
//             'pax'=>$request->pax,
//             'booked_date'=>$request->booked_date,
//             'check_in_date'=>$request->check_in_date,
//             'check_out_date'=>$request->check_out_date,
//             'notes'=>$request->notes,
//         ]);
//         return redirect()->route('bookings.index')->with('success','Bookings created successfully');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         $customers=Customer::latest()->get();
//         $hotels=Hotel::latest()->get();
//         $packages=Package::latest()->get();
//         $booking=Booking::findorfail($id);
//         return view('bookings.edit',compact('booking','customers','hotels','packages'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         $booking=Booking::findorfail($id);
//         $validator=Validator::make($request->all(),[
//             'hotel_id'=>'required|exists:hotels,id',
//             'customer_id'=>'required|exists:customers,id',
//             'package_id'=>'required|exists:packages,id',
//             'customer_name'=>'sometimes|nullable',
//             'pax'=>'numeric',
//             'booked_date'=>'required',
//             'check_in_date'=>'required',
//             'check_out_date'=>'required',
//         ]);
//        if($validator->fails()){
//         return redirect()->route('bookings.index')->withInput()->withErrors($validator);
//        }
//         $booking->update($request->only([
//         'hotel_id',
//         'customer_id',
//         'customer_name',
//         'package_id',
//         'pax',
//         'booked_date',
//         'check_in_date',
//         'check_out_date',
//     ]));
//         return redirect()->route('bookings.index')->with('success','Bookings updated successfully');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         $booking=Booking::findorfail($id);
//         $booking->delete();
//         return redirect()->route('bookings.index')->with('success','Booking deleted successfully');
//     }
// }
