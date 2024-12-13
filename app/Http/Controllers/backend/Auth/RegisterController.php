<?php

namespace App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('backend.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = new User();
        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->created_at = Carbon::now();
        $data->save();

        $update = [
            'created_by' => $data->id,
        ];

        User::where('id', $data->id)->update($update);

        return redirect()->route('admin.login')->with('message', 'You are Register Sucessfully.');
    }
}
