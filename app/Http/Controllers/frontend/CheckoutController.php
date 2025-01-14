<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\OrderRequest;
use App\Models\Citizen;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EasebuzzPaymentService;

class CheckoutController extends Controller
{
    private $easebuzzPaymentService;

    public function __construct(EasebuzzPaymentService $easebuzzPaymentService)
    {
        $this->easebuzzPaymentService = $easebuzzPaymentService;
    }

    // ==== Checkout Store
    public function checkoutStore(Request $request, EasebuzzPaymentService $easebuzzPaymentService, string $citizenId, string $cartId, string $productId)
    {
        // $request->validated();
        try {

            $order = new Order();

            $order->product_id = $productId;
            $order->citizen_id = $citizenId;
            $order->cart_id = $request->cart_id;
            $order->transaction_token = Carbon::now()->format('ymd') . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $order->order_status = 1; // Order status as 'Placed'
            $order->order_date = Carbon::now();
            $order->order_total_price = $request->total;
            $order->payment_method = $request->payment;
            // dd($order->cart_id);

            // Set payment status and payment date based on payment method
            if ($request->payment == 4 || $request->payment == 1) {
                // PayPal or Bank Transfer
                $order->payment_status = 1; // Pending
                $order->payment_date = null; // No payment date yet
                // Generate Tranx Id
                $order->payment_transaction_id = $easebuzzPaymentService->generateTranxId(
                    $order->transaction_token . '-' . $productId . '-' . $citizenId . '-' . $cartId . '-' . Carbon::now()->toDateTimeString()
                );
            } else if ($request->payment == 2 || $request->payment == 3) {
                // Cheque Payment or Cash On Delivery
                $order->payment_status = 3; // Completed (for offline payments)
                $order->payment_date = Carbon::now(); // Payment received
                // Generate Tranx Id
                $order->payment_transaction_id = $easebuzzPaymentService->generateTranxId(
                    $order->transaction_token . '-' . $productId . '-' . $citizenId . '-' . $cartId . '-' . Carbon::now()->toDateTimeString()
                );
            }

            // Generate a unique transaction token for the order in hash format (md5) by concatenating order number, product id and citizen id and cart id date and time
            $order->transaction_token = md5($order->transaction_token . '-' . $productId . '-' . $citizenId . '-' . $cartId . '-' . Carbon::now()->toDateTimeString());
            $order->inserted_at = Carbon::now();
            $order->inserted_by = Auth::guard('citizen')->user()->id;
            $order->save();

            // User Basic Details
            $user = [
                'name' => Auth::guard('citizen')->user()->name . ' ' . Auth::guard('citizen')->user()->last_name,
                'email' => Auth::guard('citizen')->user()->email,
                'phone' => Auth::guard('citizen')->user()->phone,
                'postcode' => $request->postcode,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'address' => $request->street_address,
                'apartment_address' => $request->apartment_address,
                'notes' => $request->notes,
            ];

            // Handle redirect based on payment method
            if ($request->payment == 4 || $request->payment == 1) {
                // Redirect to Easebuzz Payment Gateway for PayPal or Bank Transfer
                return $this->processEasebuzzPayment($easebuzzPaymentService, $order, $user);
            } else if ($request->payment == 2 || $request->payment == 3) {
                // For Cheque Payment or Cash on Delivery, directly submit and redirect
                return redirect()->route('frontend.orders')->with('message', 'Order placed successfully!');
            }

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong - ' . $ex->getMessage());
        }
    }

    /**
     * Redirect to Easebuzz payment gateway.
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    private function processEasebuzzPayment(EasebuzzPaymentService $easebuzzPaymentService, $order, $user)
    {
        $paymentData = [
            'key' => config('services.easebuzz.key'),
            'txnid' => $order->transaction_token,
            'amount' => $order->order_total_price,
            'productinfo' => 'Order Payment',
            'firstname' => $user['name'],
            'email' => $user['email'],
            'phone' => $user['phone'],
            'postcode' => $user['postcode'],
            'city' => $user['city'],
            'state' => $user['state'],
            'country' => $user['country'],
            'address1' => $user['address'],
            'address2' => $user['apartment_address'],
            'notes' => $user['notes'],
            'surl' => route('payment.success'),
            'furl' => route('payment.failure'),
        ];

        try {

            // Initiate the payment with Easebuzz
            $response = $easebuzzPaymentService->initiatePayment($paymentData);

            // If the payment initiation is successful, redirect to the payment URL
            if (isset($response['payment_url'])) {
                return redirect()->away($response['payment_url']);
            }

            throw new \Exception('Error initiating payment: No payment URL received.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error with payment processing: ' . $e->getMessage());
        }
    }

    public function success(Request $request, EasebuzzPaymentService $easebuzzPaymentService)
    {
        try {

            // Validate the response hash from Easebuzz
            if (!$easebuzzPaymentService->validateResponseHash($request->all())) {
                throw new \Exception('Invalid payment response hash.');
            }

            // Get the order by txnid (transaction token)
            $order = Order::where('transaction_token', $request->txnid)->first();

            if (!$order) {
                return redirect()->route('frontend.orders')->with('error', 'Order not found!');
            }

            // Update order payment status to successful based on payment method
            if ($request->payment == 4 || $request->payment == 1) {
                $order->payment_status = 3; // Paid
                $order->payment_date = Carbon::now();
            } else if ($request->payment == 2 || $request->payment == 3) {
                $order->payment_status = 1; // Pending payment
                $order->payment_date = Carbon::now();
            }

            $order->save();

            return redirect()->route('frontend.orders')->with('message', 'Payment successful and order placed successfully!');
        } catch (\Exception $e) {
            return redirect()->route('frontend.orders')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // ====== Handle payment failure
    public function failure(Request $request, EasebuzzPaymentService $easebuzzPaymentService)
    {
        try {
            // Validate the response hash from Easebuzz
            if (!$easebuzzPaymentService->validateResponseHash($request->all())) {
                throw new \Exception('Invalid payment response hash.');
            }


            // Get the order by txnid (transaction token)
            $order = Order::where('transaction_token', $request->txnid)->first();

            if (!$order) {
                return redirect()->route('frontend.orders')->with('error', 'Order not found!');
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

            return redirect()->route('frontend.orders')->with('error', 'Payment failed. Please try again.');
        } catch (\Exception $e) {
            return redirect()->route('frontend.orders')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

}
