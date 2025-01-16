<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class EasebuzzPaymentService
{
    private $baseUrl;
    private $key;
    private $salt;


    public function __construct()
    {
        $this->baseUrl = config('services.easebuzz.base_url');
        $this->key = config('services.easebuzz.key');
        $this->salt = config('services.easebuzz.salt');
    }

    public function initiatePayment(array $paymentData)
    {
        // Ensure all necessary fields are present
        $paymentData['hash'] = $this->generateHash($paymentData);

        // Make API Request
        $response = Http::asForm()->post("{$this->baseUrl}/payment/initiateLink", $paymentData);

        // Check response for success
        if ($response->successful()) {
            return $response->json();  // Return the successful response
        }

        // Handle errors and throw exception
        throw new \Exception('Failed to initiate payment: ' . $response->body());
    }

    private function generateHash(array $paymentData)
    {
        // Validate required fields
        $requiredFields = ['txnid', 'amount', 'productinfo', 'firstname', 'email'];
        foreach ($requiredFields as $field) {
            if (!isset($paymentData[$field])) {
                throw new \InvalidArgumentException("Missing required field: $field");
            }
        }

        // Add udf1 to udf7 dynamically, if available
        $udfArray = array_map(fn($i) => $paymentData["udf$i"] ?? '', range(1, 7));

        // Prepare hash string
        $hashString = implode('|', [
            $this->key,
            $paymentData['txnid'],
            $paymentData['amount'],
            $paymentData['productinfo'],
            $paymentData['firstname'],
            $paymentData['email'],
            ...$udfArray, // Include udf1 to udf7
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

    /**
     * Validate the response hash.
     */
    public function validateResponseHash(array $response)
    {
        // Validate required fields
        $requiredFields = ['status', 'email', 'firstname', 'productinfo', 'amount', 'txnid', 'hash'];

        foreach ($requiredFields as $field) {
            if (!isset($response[$field])) {
                throw new \InvalidArgumentException("Missing required response field: $field");
            }
        }

        // Construct hash string
        $hashString = implode('|', [
            $this->salt,
            $response['status'],
            '', '', '', '', '', '', '', '', '', '', // Empty placeholders for udf fields
            $response['email'],
            $response['firstname'],
            $response['productinfo'],
            $response['amount'],
            $response['txnid'],
            $this->key,
        ]);

        // Generate and validate the hash
        $generatedHash = hash('sha512', $hashString);
        return hash_equals($generatedHash, $response['hash']); // Use timing-safe comparison
    }

}
