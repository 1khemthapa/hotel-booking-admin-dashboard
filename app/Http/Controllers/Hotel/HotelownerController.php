<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        try {
            if (Auth::guard('hotels')->attempt($credentials)) {
//                $user = Auth::guard('hotel')->user();
// dd($user);
                $request->session()->regenerate();

                return redirect()->route('owner.show')->with('success', 'Logged in successfully');
            } else {
                return back()->withErrors([
                    "email" => "The provided credentials donot match ",
                ]);
            }
        } catch (Exception $error) {
            dd($error);
        }
        return back()->withErrors(['email' => 'The provided credentials do not match'])->onlyInput('email');
    }

    public function show(){
        return view('Hotel.layouts.hoteldashboard');
    }
    public function logout(Request $request){
        Auth::guard('hotels')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/ownerlogin')->with('success','Log out successfully');
    }
}
