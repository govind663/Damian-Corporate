<?php
    // include file
    include_once('easebuzz-lib/easebuzz_payment_gateway.php');

    // salt for testing env
    $SALT = "CAL3TTCZT";

    /*
    * Get the API response and verify response is correct or not.
    *
    * params string $easebuzzObj - holds the object of Easebuzz class.
    * params array $_POST - holds the API response array.
    * params string $SALT - holds the merchant salt key.
    * params array $result - holds the API response array after valification of API response.
    *
    * ##Return values
    *
    * - return array $result - hoids API response after varification.
    *
    * @params string $easebuzzObj - holds the object of Easebuzz class.
    * @params array $_POST - holds the API response array.
    * @params string $SALT - holds the merchant salt key.
    * @params array $result - holds the API response array after valification of API response.
    *
    * @return array $result - hoids API response after varification.
    *
    */
    $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);

    $result = $easebuzzObj->easebuzzResponse( $_POST );

    $response = json_decode($result, true);

    // echo '<pre>';
    // print_r($response = json_decode($result, true));
    // echo '</pre>';

    if($response['status'] == 1) {
        echo "Transaction is successful.";
        // === redirect to success page ===
        header("Location: /payment/success");
        exit;
    } elseif($response['status'] == 2) {
        echo "Transaction is failed.";
        // === redirect to failure page ===
        header("Location: /payment/failure");
        exit;
    }else {
        echo "Transaction has been failed.";
    }

?>

