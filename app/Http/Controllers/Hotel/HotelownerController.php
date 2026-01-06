<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Staff;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HotelownerController extends Controller
{
    public function login()
    {

        return view('Hotel.auth.hotellogin');
    }


    /**
     * Handle the incoming request.
     */
    public function store(Request $request)
    {


        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

            if($request->user_type=="staffs"){
                if(Auth::guard('staffs')->attempt($credentials)){
                    return redirect()->route('staff.dashboard');
                }
            }
            else if($request->user_type=="hotels"){
                if(Auth::guard('hotels')->attempt($credentials)){
                    return redirect()->route('owner.show');
                }
            }


        return back()->withErrors(['email' => 'The provided credentials do not match'])->onlyInput('email');
    }

    public function show(){
        return view('Hotel.layouts.hoteldashboard');
    }
    public function index(){
        return view('Staff.layouts.hoteldashboard');
    }
    public function logout(Request $request){
        Auth::guard('hotels','staffs')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/stafflogin')->with('success','Log out successfully');
    }
}
