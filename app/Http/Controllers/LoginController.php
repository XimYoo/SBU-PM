<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the sign-in form.
     */
    public function showLoginForm()
    {
        return view('auth.signin'); // Return the 'signin' view located in the 'auth' folder
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        // Validate the request inputs, typically email and password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Check if the user wants to be remembered
        $remember = $request->has('remember');

        // Attempt to authenticate the user with 'remember me' functionality
        if (Auth::attempt($credentials, $remember)) {
            // If successful, redirect to the intended page (or a default one)
            return redirect()->intended(route('dashboard')); // Use named route instead of hardcoded URL
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email')->with('error', 'Login failed, please check your credentials.');
    }
}
