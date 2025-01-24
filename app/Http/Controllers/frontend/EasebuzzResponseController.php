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
        // Define parameters for the payment request
        $params = [
            'txnid' => $request->order->transaction_token, // Unique transaction ID
            'amount' => $request->order->total_amount, // Total amount
            'productinfo' => 'Product', // Product description
            'firstname' => Auth::guard('citizen')->user()->f_name . ' ' . Auth::guard('citizen')->user()->l_name, // Customer name
            'email' => Auth::guard('citizen')->user()->email, // Customer email
            'phone' => Auth::guard('citizen')->user()->phone, // Customer phone
            'surl' => route('payment.success'), // Success URL
            'furl' => route('payment.failure'), // Failure URL
        ];

        // If payment mode is 1 (Easebuzz)
        if ($request->payment == 1) {
            try {
                // Initialize Easebuzz service and initiate payment
                $easebuzzService = new EasebuzzService();
                $paymentLink = $easebuzzService->initiatePayment($params);

                if (isset($paymentLink['payment_link'])) {
                    // Redirect to the payment gateway
                    return redirect()->away($paymentLink['payment_link']);
                } else {
                    // Log error if the payment link is not returned
                    Log::error('Easebuzz Payment Error: Invalid response', ['response' => $paymentLink]);
                    return redirect()->back()->with('error', 'Failed to initiate payment. Please try again.');
                }
            } catch (\Exception $e) {
                // Log any exceptions
                Log::error('Easebuzz Payment Error', ['message' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to initiate payment. Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Unknown payment method');
        }
    }
}
