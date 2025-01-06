<?php

namespace App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('backend.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'exists:users,email,deleted_at,NULL',
                'unique:password_reset_tokens,email',  // check unique email in password_reset_tokens table
            ],
        ],[
            'email.required' => 'Email Id is required.',
            'email.email' => 'Invalid email format.',
            'email.exists' => 'Email does not exist.',
            'email.unique' => 'This email has already requested password reset.',
          ]);

        $token = str::random(60);

        DB::table('password_reset_tokens')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('backend.auth.verify',['token' => $token], function($message) use ($request) {
            $message->from('contact@damiancorporate.com','Damian Corporate');
            $message->to($request->email);
            $message->subject('Reset Password Notification', 'Password Reset Link');
        });

        return back()->with('message', 'Password reset link has been sent to your email.');
    }
}
