<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EasebuzzService
{
    private $easebuzz;

    public function __construct()
    {
        // Ensure the Easebuzz library is properly included
        include_once base_path('easebuzz-lib/easebuzz_payment_gateway.php');

        // Initialize the Easebuzz object with the required parameters
        $this->easebuzz = new \Easebuzz(
            env('EASEBUZZ_MERCHANT_KEY'),
            env('EASEBUZZ_SALT'),
            env('EASEBUZZ_ENV')
        );

    }

    // This method processes the response from Easebuzz after payment
    public function easebuzzResponse(array $data)
    {
        return $this->easebuzz->easebuzzResponse($data);
    }

    // Update with correct method to initiate payment
    public function initiatePayment(array $params)
    {
        // dd('hello');

        $url = 'https://testpay.easebuzz.in/payment/initiate';
        // dd($url);

        // dd($paymentData);

        $paymentData['hash'] = $this->generateHash($params);

        Log::info('Easebuzz Request Data', ['data' => $paymentData]);

        $response = Http::post($url, $paymentData);
        // dd($response);


        Log::info('Easebuzz Response', ['status' => $response->status(), 'body' => $response->body()]);

        Log::info('Easebuzz API Response', [
            'status' => $response->status(),
            'body' => $response->body()
        ]);

        if ($response->successful()) {
            $responseData = $response->json();
            if (isset($responseData['payment_url'])) {
                Log::info('Easebuzz Payment URL', ['url' => $responseData['payment_url']]);
                return $responseData['payment_url'];
            } elseif (isset($responseData['url'])) {
                Log::info('Easebuzz Payment URL', ['url' => $responseData['url']]);
                return $responseData['url'];
            } else {
                Log::error('Error in response, payment URL not found', ['response' => $responseData]);
                throw new \Exception('No payment URL received in response.');
            }
        } else {
            Log::error('Error with Easebuzz API', ['response' => $response->body()]);
            throw new \Exception('Easebuzz API Error: ' . $response->body());
        }
    }

    private function generateHash(array $paymentData)
    {
        $data = [
            'key' => env('EASEBUZZ_MERCHANT_KEY'),
            'txnid' => $paymentData['txnid'],
            'amount' => $paymentData['amount'],
            'productinfo' => $paymentData['productinfo'],
            'firstname' => $paymentData['firstname'],
            'email' => $paymentData['email'],
        ];

        // Add udf1 to udf7 dynamically, if available
        $udfArray = array_map(fn($i) => $paymentData["udf$i"] ?? '', range(1, 7));
        $data['udf1'] = implode('|', $udfArray);

        // Prepare hash string
        $hashString = implode('|', [
            env('EASEBUZZ_MERCHANT_KEY'),
            $paymentData['txnid'],
            $paymentData['amount'],
            $paymentData['productinfo'],
            $paymentData['firstname'],
            $paymentData['email'],
            implode('|', $udfArray),
            env('EASEBUZZ_SALT')
        ]);

        // Return hashed string
        return hash('sha512', $hashString);
    }
}
