<?php

// namespace App\Http\Controllers\Admin;
// use App\Http\Controllers\Controller;
// use App\Models\Hotel;
// use Illuminate\Http\Request;
// use App\Models\Package;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;
// use Illuminate\Support\Facades\Auth;


// class PackageController extends Controller
// {


//     public function index()
// {

//         $packages=Package::latest()->paginate(10);
//         return view('packages.list',compact('packages'));
//     }


//     public function create()
//     {
//         $hotels=Hotel::orderBy('name')->get();
//         return view('packages.addpackage',compact('hotels'));
//     }


//     public function store(Request $request)
//     {
//         $validator=Validator::make($request->all(),[
//             'hotel_id'=>'required|exists:hotels,id',
//             'package_name'=>'required|max:100',
//              'status'=>'required|in:active,inactive',
//              'price'=>'required|numeric'
//         ]);
//         Package::create([
//             'hotel_id'=>$request->hotel_id,
//             'package_name'=>$request->package_name,
//             'status'=>$request->status,
//             'price'=>$request->price,
//         ]);
//         return redirect()->route('packages.index')->with('success','Packages created successfully');
//     }



//     public function edit(string $id)
//     {
//         $package=Package::findorfail($id);
//         $hotels=Hotel::orderBy('name')->get();
//         return view('packages.edit',compact('package','hotels'));
//     }


//     public function update(Request $request, string $id)
//     {
//         $package=Package::findorfail($id);

//          $validator=Validator::make($request->all(),[
//             'hotel_id'=>'required|exists:hotels,id',
//             'package_name'=>'required|max:100',
//              'status'=>'required|in:active,inactive',
//              'price'=>'required|numeric'
//         ]);
//         if($validator->fails()){
//             return redirect()->route('packages.index')->withInput()->withErrors($validator);
//         }
//         $package->hotel_id=$request->hotel_id;

//         $package->package_name=$request->package_name;
//         $package->status=$request->status;
//         $package->price=$request->price;
//         $package->save();


//         return redirect()->route('packages.index')->with('success','Packages created successfully');
//     }


//     public function destroy(string $id)
//     {
//         $package=Package::findorfail($id);
//         $package->delete();
//         return redirect()->route('packages.index')->with('success','Package deleted successfully');
//     }
// }
