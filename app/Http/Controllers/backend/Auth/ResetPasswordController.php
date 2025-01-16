<?php

namespace App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        $tokenData = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$tokenData) {
            return redirect()->route('admin.login')->with('error', 'Invalid token');
        } else {
            return view('backend.auth.passwords.reset', ['token' => $token]);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/i',
                'exists:users,email',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
                // 'max:16',
                // 'alpha_dash',
                // 'no_special_characters',
                // 'no_sequential_characters',
                // 'must_contain_lowercase',
                // 'must_contain_uppercase',
                // 'must_contain_numeric',
            ],
            'password_confirmation' => [
               'required',
               'same:password',
            ],

        ],[
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.regex' => 'Invalid email format',
            'email.exists' => 'Email does not exist',

            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'password.min' => 'Password must be at least 8 characters long',
            // 'password.max' => 'Password must be at most 16 characters long',
            // 'password.alpha_dash' => 'Password may only contain alphanumeric characters, underscores, and dashes',
            // 'password.no_special_characters' => 'Password must not contain any special characters',
            // 'password.no_sequential_characters' => 'Password must not contain any sequential characters',
            // 'password.must_contain_lowercase' => 'Password must contain at least one lowercase letter',
            // 'password.must_contain_uppercase' => 'Password must contain at least one uppercase letter',
            // 'password.must_contain_numeric' => 'Password must contain at least one numeric character',

            'password_confirmation.required' => 'Password confirmation is required',
            'password_confirmation.same' => 'Password confirmation does not match',

        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->route('admin.login')->with('message', 'Your password has been changed successfully. You can now log in with your new password.');

    }
}
