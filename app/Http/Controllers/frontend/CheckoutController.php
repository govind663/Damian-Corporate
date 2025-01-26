<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\OrderRequest;
use App\Models\Cart;
use App\Models\Citizen;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EasebuzzPaymentService;
use Illuminate\Support\Facades\Log;
use App\Mail\OrderInvoiceMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Easebuzz\PayWithEasebuzzLaravel\PayWithEasebuzzLib;

class CheckoutController extends Controller
{
    public $easebuzzPaymentService;

    public function __construct(EasebuzzPaymentService $easebuzzPaymentService)
    {
        $this->easebuzzPaymentService = $easebuzzPaymentService;
    }

    // ==== Checkout Store
    public function checkoutStore(Request $request, EasebuzzPaymentService $easebuzzPaymentService, string $citizenId, string $cartId, string $productId)
    {
        try {
            // Step 1: Initialize order
            $order = $this->initializeOrder($request, $citizenId, $cartId, $productId);

            // Step 2: Set payment status and generate transaction ID
            $this->setPaymentStatus($order, $request, $easebuzzPaymentService, $citizenId, $cartId, $productId);

            // Step 3: Save the order
            $order->inserted_at = Carbon::now();
            $order->inserted_by = Auth::guard('citizen')->user()->id;
            $order->save();

            // Step 4: Update cart Payment Status
            $this->updateCartPaymentStatus($citizenId, $order);

            // Step 5: Get user and related data
            $user = Citizen::find($order->citizen_id);
            $product = Product::find($order->product_id);
            $cart = Cart::find($order->cart_id);

            // Step 6: Prepare billing address
            $billingAddress = $this->prepareBillingAddress($request);

            // Step 7: Send email with invoice
            $this->sendInvoiceEmail($user, $order, $product, $cart, $billingAddress);

            // Step 8: Handle redirect based on payment method
            return $this->handleRedirect($request, $order, $citizenId, $productId, $cartId);

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $ex->getMessage());
        }
    }

    private function initializeOrder(Request $request, string $citizenId, string $cartId, string $productId)
    {
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->citizen_id = $request->citizen_id;
        $order->cart_id = $request->cart_id;
        $order->transaction_token = Carbon::now()->format('ymd') . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $order->order_status = 1; // Order status as 'Placed'
        $order->order_date = Carbon::now();
        $total = preg_replace('/[^\d.]/', '', $request->total); // Remove non-numeric characters
        $order->order_total_price = round((float) $total, 2);
        $order->payment_method = $request->payment;
        return $order;
    }

    private function setPaymentStatus(Order $order, Request $request, EasebuzzPaymentService $easebuzzPaymentService, string $citizenId, string $cartId, string $productId)
    {
        if ($request->payment == 1) {
            // PayPal or Bank Transfer
            $order->payment_status = 3; // Pending
            $order->payment_date = null; // No payment date yet
        } elseif ($request->payment == 3) {
            // Cheque Payment or Cash On Delivery
            $order->payment_status = 2; // Processing
            $order->payment_date = Carbon::now(); // Payment received
        }

        // Generate Transaction ID
        $order->payment_transaction_id = $easebuzzPaymentService->generateTranxId(
            $order->transaction_token . '-' . $productId . '-' . $citizenId . '-' . $cartId . '-' . Carbon::now()->toDateTimeString()
        );
    }

    private function updateCartPaymentStatus(string $citizenId, Order $order)
    {
        Cart::where('citizen_id', $citizenId)->where('payment_status', 1)
            ->update(['payment_status' => 3, 'transaction_token' => $order->transaction_token]);
    }

    private function prepareBillingAddress(Request $request)
    {
        return [
            'postcode' => $request->postcode,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'address' => $request->street_address,
            'apartment_address' => $request->apartment_address,
        ];
    }

    private function sendInvoiceEmail($user, $order, $product, $cart, $billingAddress)
    {
        $mailData = [
            'order' => $order,
            'user' => $user,
            'product' => $product,
            'billingAddress' => $billingAddress,
            'cart' => $cart,
        ];

        Mail::to($user['email'], 'Damian Corporate')
            ->send(new OrderInvoiceMail($mailData));
    }

    private function handleRedirect(Request $request, Order $order, string $citizenId, string $productId, string $cartId)
    {
        if (!$request->has('payment')) {
            return redirect()->back()->with('error', 'Payment method not selected.');
        }

        if ($request->payment == 1) { // Online Payment
            // Ensure the order has a total price
            if (empty($order->order_total_price)) {
                Log::error('Order total amount is missing', ['order_id' => $order->id]);
                return redirect()->back()->with('error', 'Order total amount is missing. Please try again.');
            }

            try {
                // Prepare payment parameters
                $params = $this->preparePaymentParams($order);

                if (empty($params)) {
                    Log::error('Payment params are empty or invalid', ['order_id' => $order->id]);
                    return redirect()->back()->with('error', 'Failed to prepare payment parameters. Please try again.');
                }

                Log::info('Prepared Payment Params', ['params' => $params]);

                // Initiate payment API call
                $easebuzz = new PayWithEasebuzzLib(
                    config('easebuzz.key'),
                    config('easebuzz.salt'),
                    config('easebuzz.env')
                );

                $response = $easebuzz->initiatePaymentAPI($params);

                Log::info('Easebuzz Payment API Response', ['params' => $params, 'response' => $response]);

                if (isset($response['payment_url'])) {
                    return redirect()->away($response['payment_url']);
                }

                $errorMessage = $response['data'] ?? 'Failed to initiate payment.';
                return redirect()->back()->with('error', $errorMessage);

            } catch (\Exception $e) {
                Log::error('Easebuzz Payment Error', [
                    'error_message' => $e->getMessage(),
                    'order_id' => $order->id,
                ]);
                return redirect()->back()->with('error', 'An error occurred while initiating payment. Please try again.');
            }

        } elseif ($request->payment == 3) { // Cash on Delivery
            Log::info('Cash on Delivery selected', ['order_id' => $order->id]);
            return redirect()->route('payment.thankyou')->with('message', 'Order placed successfully!');
        }

        return redirect()->back()->with('error', 'Invalid payment method selected.');
    }

    private function preparePaymentParams(Order $order): array
    {
        $user = Auth::guard('citizen')->user();

        return [
            'txnid' => $order->transaction_token,
            'amount' => (float) $order->order_total_price,
            'productinfo' => 'Product',
            'firstname' => $user->f_name . ' ' . $user->l_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'surl' => route('payment.response'), // Success URL
            'furl' => route('payment.response'), // Failure URL
        ];
    }

    public function payment(Request $request, $txnid , $order_id, $citizenId, $productId, $cartId)
    {
        $order = Order::find($order_id);
        $user = Citizen::find($citizenId);
        $cart = Cart::find($cartId);
        $product = Product::where('id', $productId)->first();
        $amount = $order->order_total_price;

        return view('frontend.store.online.payment', [
            'order' => $order,
            'user' => $user,
            'cart' => $cart,
            'product' => $product,
            'txnid' => $txnid,
            'orderId' => $order_id,
            'citizenId' => $citizenId,
            'productId' => $productId,
            'cartId' => $cartId,
            'amount' => $amount
        ]);
    }

    public function response(Request $request)
    {
        try {
            $params = $request->all();
            dd($params);

            // Call the verifyPayment method
            $response = $this->verifyPayment($params);

            Log::info('Easebuzz Payment Response', ['response' => $response]);

            // Check the response status and handle accordingly
            if (isset($response['status']) && $response['status'] === 'success') {
                // Payment successful
                // Optionally, update your database with the payment status

                // Redirect to the success URL (surl)
                return redirect()->away($response['surl'])->with('message', 'Payment successful. Also, check your email for receipt. Order Placed Successfully!');
            } elseif (isset($response['status']) && $response['status'] === 'failure') {
                // Payment failed
                // Optionally, update your database with the payment status

                // Redirect to the failure URL (furl)
                return redirect()->away($response['furl'])->with('error', 'Payment failed.');
            } else {
                // Payment status unknown
                // Redirect to a fallback page or back with an error message
                return redirect()->back()->with('error', 'Payment status unknown. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    private function verifyPayment(array $params): array
    {
        // Example logic for verifying payment (replace with actual logic for your payment gateway)
        // Assuming the response contains a checksum that needs to be verified
        $checksum = $params['checksum']; // Or the relevant field based on your gateway
        unset($params['checksum']); // Remove checksum from parameters for verification

        // Your secret key for generating checksum
        $secretKey = 'your_secret_key_here';

        // Generate the checksum again using the response data and the secret key
        $generatedChecksum = $this->generateChecksum($params, $secretKey);

        // Compare the generated checksum with the received one
        if ($checksum === $generatedChecksum) {
            // Check if the status is success
            return ['status' => 'success'];
        } else {
            return ['status' => 'failure'];
        }
    }

    private function generateChecksum(array $params, string $secretKey): string
    {
        // Example checksum generation logic (replace with actual method)
        ksort($params); // Sort the parameters in alphabetical order
        $queryString = http_build_query($params);
        return hash('sha256', $queryString . $secretKey);
    }

    // ====== Handle payment success
    public function success(Request $request)
    {
        try {

            // dd('Transaction is successful.');
            // Get the order by txnid (transaction token)
            $order = Order::where('transaction_token', $request->txnid)->first();

            if (!$order) {
                return redirect()->route('payment.thankyou')->with('error', 'Order not found!');
            }

            // Update order payment status to successful based on payment method
            if ($request->payment == 1) {
                $order->payment_status = 3; // Paid
                $order->payment_date = Carbon::now();
            } else if ($request->payment == 3) {
                $order->payment_status = 1; // Pending payment
                $order->payment_date = Carbon::now();
            }

            $order->save();

            return redirect()->route('payment.thankyou')->with('message', 'Payment successful and order placed successfully!');
        } catch (\Exception $e) {
            return redirect()->route('payment.thankyou')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // ====== Handle payment failure
    public function failure(Request $request)
    {
        try {

            // Get the order by txnid (transaction token)
            $order = Order::where('transaction_token', $request->txnid)->first();

            if (!$order) {
                return redirect()->route('payment.thankyou')->with('error', 'Order not found!');
            }

            // Update order payment status to failed based on payment method
            if ($request->payment == 4 || $request->payment == 1) {
                $order->payment_status = 4; // Failed
                $order->payment_date = Carbon::now();
            } else if ($request->payment == 2 || $request->payment == 3) {
                $order->payment_status = 1; // Pending payment
                $order->payment_date = Carbon::now();
            }

            $order->save();

            return redirect()->route('payment.thankyou')->with('error', 'Payment failed. Please try again.');
        } catch (\Exception $e) {
            return redirect()->route('payment.thankyou')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // ====== Payment Thank You Page
    public function paymentThankYou(Request $request)
    {
        return view('frontend.store.online.thankyou');
    }
}
