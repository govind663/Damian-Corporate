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
            $total = preg_replace('/[^\d.]/', '', $request->total); // Remove non-numeric characters
            $order->order_total_price = round((float) $total, 2);
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

            // update cart Payment Status
            $cart = Cart::find($request->cart_id);
            if ($cart) {
                $cart->payment_status = $order->payment_status; // Paid
                $cart->save();
            }

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

                $order = Order::find($order->id); // Get the order from database
                $product = Product::find($order->product_id); // Get product info based on order
                $user = Citizen::find($order->citizen_id); // Get user info based on order
                $cart = Cart::find($order->cart_id); // Get cart info based on order
                $billingAddress = [
                    'postcode' => $request->postcode,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'address' => $request->street_address,
                    'apartment_address' => $request->apartment_address,
                ];

                // Prepare data to send
                $mailData = [
                    'order' => $order,
                    'user' => $user,
                    'product' => $product,
                    'billingAddress' => $billingAddress,
                    'cart' => $cart,
                ];

                // Send the email with the invoice attached
                Mail::to($user['email'], 'Damian Corporate')
                ->cc(['shweta@matrixbricks.com','riddhi@matrixbricks.com'])
                ->send(new OrderInvoiceMail($mailData));

                // Redirect to Easebuzz Payment Gateway for PayPal or Bank Transfer
                return $this->processEasebuzzPayment($easebuzzPaymentService, $order, $user);
            } else if ($request->payment == 2 || $request->payment == 3) {

                $order = Order::find($order->id); // Get the order from database
                $product = Product::find($order->product_id); // Get product info based on order
                $user = Citizen::find($order->citizen_id); // Get user info based on order
                $cart = Cart::find($order->cart_id); // Get cart info based on order
                $billingAddress = [
                    'postcode' => $request->postcode,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'address' => $request->street_address,
                    'apartment_address' => $request->apartment_address,
                ];

                // Prepare data to send
                $mailData = [
                    'order' => $order,
                    'user' => $user,
                    'product' => $product,
                    'billingAddress' => $billingAddress,
                    'cart' => $cart,
                ];

                // Send the email with the invoice attached
                Mail::to($user['email'], 'Damian Corporate')
                ->cc(['shweta@matrixbricks.com','riddhi@matrixbricks.com'])
                ->send(new OrderInvoiceMail($mailData));

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
            'firstname' => Auth::guard('citizen')->user()->f_name . ' ' . Auth::guard('citizen')->user()->l_name,
            'email' => Auth::guard('citizen')->user()->email,
            'phone' => Auth::guard('citizen')->user()->phone,
            'postcode' => Auth::guard('citizen')->user()->postcode,
            'city' => $user['city'],
            'state' => $user['state'],
            'country' => $user['country'],
            'address1' => $user['address'],
            'address2' => $user['apartment_address'],
            'notes' => $user['notes'] ?? '',
            'surl' => route('payment.success'),
            'furl' => route('payment.failure'),
        ];

        try {
            $response = $easebuzzPaymentService->initiatePayment($paymentData);

            // Ensure $response is logged as part of the context array
            Log::info('Easebuzz API Response:', ['response' => $response]);

            if (isset($response['payment_url'])) {

                // Redirect to Easebuzz payment gateway
                return redirect()->away($response['payment_url']);
            }

            throw new \Exception('Error initiating payment: No payment URL received.');
        } catch (\Exception $e) {
            Log::error('Easebuzz Payment Error', [
                'message' => $e->getMessage(),
                'paymentData' => $paymentData,
            ]);
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
