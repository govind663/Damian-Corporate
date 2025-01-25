<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EasebuzzService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EasebuzzResponseController extends Controller
{
    public function handleResponse(Request $request)
    {
        $params = $request->post();

        // Log response for debugging purposes
        Log::info('Easebuzz Payment Response', ['response' => $params]);

        // Check the response status and handle accordingly
        if (isset($params['status']) && $params['status'] === 'success') {
            // Payment successful
            // Update your database with the payment status
            // Redirect to success page
            return redirect()->route('payment.success', ['status' => 'success', 'params' => $params])->with('success', 'Payment successful.');
        } elseif (isset($params['status']) && $params['status'] === 'failure') {
            // Payment failed
            // Update your database with the payment status
            // Redirect to failure page
            return redirect()->route('payment.failure', ['status' => 'failure', 'params' => $params])->with('error', 'Payment failed.');
        }else {
            // Payment status unknown
            // Redirect to unknown page
            return redirect()->back()->with('error', 'Payment status unknown. Please try again.');
        }
    }
}
