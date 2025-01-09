<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Register user
    public function register(Request $request) {
        //Validate
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);

        //Register 
        $user = User::create($fields);

        //Login
        Auth::login($user);

        //Redirect
        return redirect()->route('dashboard');
    }

    //Login user
    public function login(Request $request) {
        //Validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        //Try to login the user
        if (Auth::attempt($fields, $request->remember)) {
            return redirect()->intended();
        }
        else {
            return back()->withErrors(([
                'failed' => 'The provided credentials do not match our records.'
            ]));
        }
    }

    // Logout user
    public function logout(Request $request) {
        // Logout the user
        Auth::logout();

        // Invalidating the user's session
        $request->session()->invalidate();

        // Regenerate csfr token
        $request->session()->regenerateToken();

        // Redirect to home
        return redirect('/');
    }
}
 