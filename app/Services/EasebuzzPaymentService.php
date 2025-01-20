<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class EasebuzzPaymentService
{
    private $baseUrl;
    private $key;
    private $salt;
    protected $client;


    public function __construct()
    {
        $this->baseUrl = config('services.easebuzz.base_url');
        $this->key = config('services.easebuzz.key');
        $this->salt = config('services.easebuzz.salt');
    }

    public function initiatePayment(array $paymentData)
    {
        // dd('hello');

        $url = 'https://testpay.easebuzz.in/payment/initiate';
        // dd($url);

        // dd($paymentData);

        $paymentData['hash'] = $this->generateHash($paymentData);

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
            'key' => $this->key,
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
            $this->key,
            $paymentData['txnid'],
            $paymentData['amount'],
            $paymentData['productinfo'],
            $paymentData['firstname'],
            $paymentData['email'],
            implode('|', $udfArray),
            $this->salt
        ]);

        // Return hashed string
        return hash('sha512', $hashString);
    }


    // Existing method for generating transaction ID
    public function generateTranxId($base)
    {
        do {
            $uniqueId = bin2hex(random_bytes(5)); // Stronger randomness
            $timestamp = Carbon::now()->format('YmdHis'); // Timestamp for uniqueness
            $transactionId = "$base-$timestamp-$uniqueId";
        } while (Order::where('transaction_token', $transactionId)->exists());

        return hash('sha512', $transactionId); // Securely hash the transaction ID
    }

}
