<?php
    // Include the Laravel URL helper
    include_once('easebuzz-lib/easebuzz_payment_gateway.php');

    // Get the success URL dynamically from Laravel
    $successUrl = 'http://127.0.0.1:8000/payment/success';

    // Get the failure URL dynamically from Laravel
    $failureUrl = 'http://127.0.0.1:8000/payment/failure';

    // salt for testing env
    $SALT = "CAL3TTCZT";

    /*
    * Get the API response and verify response is correct or not.
    *
    * params string $easebuzzObj - holds the object of Easebuzz class.
    * params array $_POST - holds the API response array.
    * params string $SALT - holds the merchant salt key.
    * params array $result - holds the API response array after verification of API response.
    *
    * ##Return values
    *
    * - return array $result - holds API response after verification.
    *
    * @params string $easebuzzObj - holds the object of Easebuzz class.
    * @params array $_POST - holds the API response array.
    * @params string $SALT - holds the merchant salt key.
    * @params array $result - holds the API response array after verification of API response.
    *
    * @return array $result - holds API response after verification.
    *
    */
    $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);

    $result = $easebuzzObj->easebuzzResponse($_POST);

    $response = json_decode($result, true);

    // echo '<pre>';
    // print_r($response = json_decode($result, true));
    // echo '</pre>';

    if ($response['status'] == 1) {
        $message = "Transaction successful.";
        // === Redirect to success page dynamically url (http://127.0.0.1:8000/store/payment/success) ===
        header("Location: " . $successUrl);
        // exit;
    } elseif ($response['status'] == 2) {
        $message = "Transaction failed.";
        // === Redirect to failure page dynamically ===
        header("Location: " . $failureUrl);
        // exit;
    } else {
        echo "Transaction has failed.";
    }
?>
