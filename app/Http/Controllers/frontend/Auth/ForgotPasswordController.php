<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function citizenShowLinkRequestForm()
    {
        return view('frontend.auth.passwords.email');
    }

    public function citizenSendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'exists:citizens,email,deleted_at,NULL',
                'unique:citizen_password_reset_tokens,email',  // check unique email in citizen_password_reset_tokens table
            ],
        ],[
            'email.required' => 'Email Id is required.',
            'email.email' => 'Invalid email format.',
            'email.exists' => 'Email does not exist.',
            'email.unique' => 'This email has already requested password reset.',
          ]);

        $token = str::random(60);

        DB::table('citizen_password_reset_tokens')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('frontend.auth.verify',['token' => $token], function($message) use ($request) {
            $message->from('contact@damiancorporate.com','Damian Corporate');
            $message->to($request->email);
            $message->cc(['shweta@matrixbricks.com', 'codingthunder1997@gmail.com']);
            $message->subject('Reset Password Notification', 'Password Reset Link');
        });

        return back()->with('message', 'Password reset link has been sent to your email.');
    }
}
