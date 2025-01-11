<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class EasebuzzPaymentService
{
    private $baseUrl;
    private $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.easebuzz.base_url');
        $this->apiKey = config('services.easebuzz.key');
    }

    public function initiatePayment(array $data)
    {
        // Ensure all necessary fields are present
        $data['hash'] = $this->generateHash($data);

        // Make API Request
        $response = Http::asForm()->post("{$this->baseUrl}/payment/initiateLink", $data);

        // Check response for success
        if ($response->successful()) {
            return $response->json();  // Return the successful response
        }

        // Handle errors and throw exception
        throw new \Exception('Failed to initiate payment: ' . $response->body());
    }

    private function generateHash(array $data)
    {
        // Add udf1 to udf7 dynamically, if available
        $udfArray = array_fill(0, 7, '');  // Default empty values
        for ($i = 1; $i <= 7; $i++) {
            $key = "udf$i";
            if (isset($data[$key])) {
                $udfArray[$i - 1] = $data[$key];
            }
        }

        // Prepare hash string
        $hashString = implode('|', [
            $this->apiKey,
            $data['txnid'],
            $data['amount'],
            $data['productinfo'],
            $data['firstname'],
            $data['email'],
            ...$udfArray // Add udf1 to udf7 placeholders
        ]);

        return hash('sha512', $hashString);  // Return hashed string
    }


    // Existing method for generating transaction ID
    public function generateTranxId($base)
    {
        $uniqueId = uniqid('', true);  // More randomness
        $timestamp = Carbon::now()->format('YmdHis');  // Timestamp for uniqueness

        // Ensure uniqueness
        while (Order::where('transaction_token', $base . '-' . $timestamp . '-' . $uniqueId)->exists()) {
            $uniqueId = uniqid('', true);
        }

        return hash('sha512', $base . '-' . $timestamp . '-' . $uniqueId);  // Combining base and unique values
    }
}
