<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changePassword()
    {
        return view('auth.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $new_password = $request->password;
        $confirm = $request->password_confirmation;

        if (Hash::check($request->old_password, $user->password)) {
            if ($new_password == $confirm) {
                $user->password = Hash::make($new_password);
                $user->save();
                Auth::logout();
                Session::flash('success', 'Password changed successfully! Now login with your new password');
                return redirect()->route('login');
            } else {
                Session::flash('error', 'New password and confirm password not matched!');
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Old password not matched!');
            return redirect()->back();
        }

    }

    public function Logout()
    {
        Auth::logout();
        Session::flash('success', 'Successfully logout');
        return redirect()->route('login');
    }
}
