<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{

    public function login(Request  $request){

        if(!empty(Auth::check()) && Auth::user()->is_admin==1 && Auth::user()->status == 0 && Auth::user()->is_delete == 0){
            return redirect()->route('admin.dashboard');
        }

        if ($request->isMethod('get')) {
            return view('admin.auth.login');
        }

        // Validate the user's input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = !empty($request->remember) ? true : false;

        // Attempt to log the user in
        if ( Auth::attempt($credentials,$remember)) {
            // Authentication was successful
            if (Auth::user()->is_admin==1 && Auth::user()->status == 0 && Auth::user()->is_delete == 0) {
                // If the logged-in user is an admin, redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // If the logged-in user is not an admin, you can redirect to a different page or handle it accordingly
                return redirect()->back()->with('error' , 'Invalid email or password');
            }
        }

        // Authentication failed
        return redirect()->back()->with('error' , 'Invalid email or password');
        
    }


    public function register(Request $request){

        if ($request->isMethod('get')) {
            return view('admin.auth.register');
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'status' => 'required|in:0,1',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => $fields['password'],
            'is_admin' => 1,
            'status' => $fields['status'],
        ]);


        return redirect()->route('admin.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
