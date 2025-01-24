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
use App\Services\EasebuzzService;
use Illuminate\Support\Facades\Mail;
use Easebuzz\PaymentGateway\Easebuzz;

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

            // Step 2: Set payment status and payment date
            $this->setPaymentStatus($order, $request, $easebuzzPaymentService, $citizenId, $cartId, $productId);

            // Step 3: Save the order
            $order->inserted_at = Carbon::now();
            $order->inserted_by = Auth::guard('citizen')->user()->id;
            $order->save();

            // Step 4: Update cart Payment Status
            Cart::where('citizen_id', $citizenId)->where('payment_status', 1)
                ->update(['payment_status' => 3, 'transaction_token' => $order->transaction_token]);

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
            // ->cc(['shweta@matrixbricks.com','riddhi@matrixbricks.com'])
            ->send(new OrderInvoiceMail($mailData));
    }

    private function handleRedirect(Request $request, Order $order, string $citizenId, string $productId, string $cartId)
    {
        if ($request->payment == 1) {
            // If you have a route to handle the response
            $responseUrl = route('payment.response'); // Use Laravel's route helper to create the URL

            // Prepare request parameters for Easebuzz
            $params = [
                'txnid' => $order->transaction_token,
                'amount' => $order->total_amount,
                'productinfo' => 'Product',
                'firstname' => Auth::guard('citizen')->user()->f_name . ' ' . Auth::guard('citizen')->user()->l_name,
                'email' => Auth::guard('citizen')->user()->email,
                'phone' => Auth::guard('citizen')->user()->phone,
                'surl' => $responseUrl,
                'furl' => $responseUrl,
            ];

            // try {
                // Construct the file path correctly
                $filePath = base_path('paywitheasebuzz-php-lib-master/Easebuzz.php'); // Assuming it's located in the root directory or another appropriate location
                if (!file_exists($filePath)) {
                    throw new \Exception("Easebuzz library file not found at: " . $filePath);
                }

                // Include the file dynamically
                require_once $filePath;

                // Define the merchant details
                $SALT = "CAL3TTCZT";
                $MERCHANT_KEY = "Z1J63NDE8";
                $ENV = "test"; // Change to 'live' for production

                // Initialize the Easebuzz object with correct parameters
                $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);

                // Call the response method
                $result = $easebuzzObj->easebuzzResponse($_POST);

                // Decode the response
                $response = json_decode($result, true);

                // Log the response for debugging
                Log::info('Easebuzz Response', ['response' => $response]);

                return $response;

            // } catch (\Exception $e) {
                // Log the error and return a response
                Log::error('Easebuzz Payment Error', ['message' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to initiate payment. Please try again.');
            }
        // } elseif ($request->payment == 3) {
        //     return redirect()->route('payment.thankyou')->with('message', 'Order placed successfully!');
        // }

        return redirect()->back()->with('error', 'Unknown payment method');
    }

    public function payment(Request $request, $txnid , $order_id, $citizenId, $productId, $cartId)
    {
        $order = Order::find($order_id);
        $user = Citizen::find($citizenId);
        $cart = Cart::find($cartId);
        $product = Product::where('id', $productId)->first();
        $amount = $order->order_total_price;
        // dd($productId);

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
            'amount' => $amount,
        ]);
    }

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
