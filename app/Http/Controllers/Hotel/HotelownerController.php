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


        if (Auth::guard('staffs')->attempt($credentials)) {
            return redirect()->route('staff.dashboard')->with('success', 'Logged in as hotel staff');
        }


        if (Auth::guard('hotels')->attempt($credentials)) {
            return redirect()->route('owner.show')->with('success', 'Logged in as hotel');
        }



        return back()->withErrors(['email' => 'The provided credentials do not match'])->onlyInput('email');
    }

    public function show()
    {
        $user = Auth::guard('hotels')->user();
        $customers = $user->customers()->latest()->paginate(5);
        $bookings = $user->bookings()->latest()->get();
        $staffs = $user->staffs()->get();
        return view('Hotel.layouts.hoteldashboard', compact('customers', 'bookings', 'staffs'));
    }

    public function index()
    {
        $staff = Auth::guard('staffs')->user();
        $hotel = $staff->hotel;
        $customers = $hotel->customers()->latest()->paginate(5);
        $bookings = $hotel->bookings()->latest()->get();

        return view('Staff.layouts.hoteldashboard', compact('customers', 'bookings'));
    }

    public function logout(Request $request)
    {
        Auth::guard('hotels')->logout();
        Auth::guard('staffs')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/stafflogin')->with('success', 'Log out successfully');
    }
}
