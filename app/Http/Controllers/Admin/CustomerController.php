<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Customer;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;

// class CustomerController extends Controller implements HasMiddleware
// {

//     public static function middleware():array
//     {
//         return [
//             new middleware('permission:view customers',only:['index']),
//             new middleware('permission:create customers',only:['create']),
//             new middleware('permission:edit customers',only:['edit']),
//             new middleware('permission:delete customer',only:['destroy']),
//         ];
//     }
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $customers=Customer::orderBy('full_name','ASC')->paginate(10);
//         return view('customers.listcustomers',compact('customers'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         return view('customers.addcustomers');
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $validator=Validator::make($request->all(),[
//             'full_name'=>'required|max-255',
//             'contact'=>'required|numeric',
//             'email'=>'required',
//             'address'=>'required|max:255',
//         ]);
//         Customer::create([
//         'full_name'=>$request->full_name,
//         'contact'=>$request->contact,
//         'email'=>$request->email,
//         'address'=>$request->address,
//         'dob'=>$request->dob,
//         ]);
//         return redirect()->route('customers.index')->with('success','Customer created successfully');
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
//         $customer=Customer::findorfail($id);
//         return view('customers.editcustomers',compact('customer'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         $customer=Customer::findorfail($id);
//         $validator=Validator::make($request->all(),[
//             'full_name'=>'required|max:255',
//             'contact'=>'required|numeric',
//             'email'=>'required',
//             'address'=>'required|max:255',
//         ]);
//         if($validator->fails()){
//             return redirect()->route('customers.create')->withInput()->withErrors($validator);
//         }
//         $customer->full_name=$request->full_name;
//         $customer->contact=$request->contact;
//         $customer->email=$request->email;
//         $customer->address=$request->address;
//         $customer->save();
//         return redirect()->route('customers.index')->with('success','Customer created successfully');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         $customer=Customer::findorfail($id);
//         $customer->delete();
//         return redirect()->route('customers.index')->with('success','Customer deleted successfully');
//     }
// }
