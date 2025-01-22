<?php
    // Include the Laravel URL helper
    include_once('easebuzz-lib/easebuzz_payment_gateway.php');

    // Get the base URL dynamically from Laravel
    $baseUrl = url('/');

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
        echo "Transaction is successful.";
        // === Redirect to success page dynamically ===
        // header("Location: " . $baseUrl . "/store/payment/success");
        return redirect()->route('payment.success');
        // exit;
    } elseif ($response['status'] == 2) {
        echo "Transaction failed.";
        // === Redirect to failure page dynamically ===
        // header("Location: " . $baseUrl . "/store/payment/failure");
        return redirect()->route('payment.failure');
        // exit;
    } else {
        echo "Transaction has failed.";
    }
?>
