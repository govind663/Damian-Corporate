<?php

namespace App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('backend.auth.login');
        }
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember_me = ($request->has('remember_token')) ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {

            // Regenerate session ID for security
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')->with('message', 'You are successfully logged in!');
        }
        else{
            return redirect()->route('admin.login')->with(['Input' => $request->only('email','password'), 'error' => 'Your Email id and Password do not match our records!']);
        }

    }

    public function logout() {
        // Clear all of the session data for the current user
        Session::flush();
        // Log the user out of their current session
        Auth::logout();

        return redirect()->route('admin.login')->with('message', 'You are logout Successfully.');
    }
}
