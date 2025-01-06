<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Models\Citizen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function citizenRegister()
    {
        if (Auth::guard('citizen')->check()) {
            return redirect()->route('frontend.myProfile')
            ->with('message', 'You are already logged in!');
        }

        return view('frontend.auth.register');
    }

    public function citizenStore(RegisterRequest $request)
    {
        $data = new Citizen();
        $data->f_name = $request->get('f_name');
        $data->l_name = $request->get('l_name');
        $data->phone = $request->get('phone');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->created_at = Carbon::now();
        $data->save();

        $update = [
            'created_by' => $data->id,
        ];

        Citizen::where('id', $data->id)->update($update);

        return redirect()->route('frontend.citizen.login')->with('message', 'You are Register Sucessfully.');
    }
}
