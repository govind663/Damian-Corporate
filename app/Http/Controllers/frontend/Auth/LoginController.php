<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function citizenLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('frontend.dashboard');
        } else {
            return view('frontend.auth.login');
        }
    }

    public function citizenLoginStore(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember_me = ($request->has('remember_token')) ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {

            // Regenerate session ID for security
            $request->session()->regenerate();

            return redirect()->route('frontend.dashboard')->with('message', 'You are successfully logged in!');
        }
        else{
            return redirect()->route('frontend.citizen.login')->with(['Input' => $request->only('email','password'), 'error' => 'Your Email id and Password do not match our records!']);
        }

    }

    public function citizenLogout() {
        // Clear all of the session data for the current user
        Session::flush();
        // Log the user out of their current session
        Auth::logout();

        return redirect()->route('frontend.citizen.login')->with('message', 'You are logout Successfully.');
    }
}
