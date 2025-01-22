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
    public $easebuzzPaymentService;

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

            $order->product_id = $request->product_id;
            $order->citizen_id = $request->citizen_id;
            $order->cart_id = $request->cart_id;
            $order->transaction_token = Carbon::now()->format('ymd') . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $order->order_status = 1; // Order status as 'Placed'
            $order->order_date = Carbon::now();
            $total = preg_replace('/[^\d.]/', '', $request->total); // Remove non-numeric characters
            $order->order_total_price = round((float) $total, 2);
            $order->payment_method = $request->payment;
            // dd($order->cart_id);

            // Set payment status and payment date based on payment method
            if ($request->payment == 1) {
                // PayPal or Bank Transfer
                $order->payment_status = 3; // Pending
                $order->payment_date = null; // No payment date yet
                // Generate Tranx Id
                $order->payment_transaction_id = $easebuzzPaymentService->generateTranxId(
                    $order->transaction_token . '-' . $productId . '-' . $citizenId . '-' . $cartId . '-' . Carbon::now()->toDateTimeString()
                );
            } else if ($request->payment == 3) {
                // Cheque Payment or Cash On Delivery
                $order->payment_status = 2; // Processing
                $order->payment_date = Carbon::now(); // Payment received
                // Generate Tranx Id
                $order->payment_transaction_id = $easebuzzPaymentService->generateTranxId(
                    $order->transaction_token . '-' . $productId . '-' . $citizenId . '-' . $cartId . '-' . Carbon::now()->toDateTimeString()
                );
            }

            // payment_transaction_id
            $order->inserted_at = Carbon::now();
            $order->inserted_by = Auth::guard('citizen')->user()->id;

            // update cart Payment Status
            $cart = Cart::find($request->cart_id);
            if ($cart) {
                $cart->payment_status = 3; // Paid
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

            // Handle redirect based on payment method
            if ($request->payment == 1) {

                // Send the email with the invoice attached
                Mail::to($user['email'], 'Damian Corporate')
                // ->cc(['shweta@matrixbricks.com','riddhi@matrixbricks.com'])
                ->send(new OrderInvoiceMail($mailData));


                return redirect()->route('frontend.payment', [
                    'transaction_token' => $order->transaction_token,
                    'order_id' => $order->id,
                    'citizen_id' => $citizenId,
                    'product_id' => $productId,
                    'cart_id' => $cartId
                ])->with([
                    'payment' => $request->payment,
                    'txnid' => $order->transaction_token,
                    'order_id' => $order->id,
                    'citizenId' => $citizenId,
                    'productId' => $productId,
                    'cartId' => $cartId,
                ]);

            } else if ($request->payment == 3) {

                // Send the email with the invoice attached
                Mail::to($user['email'], 'Damian Corporate')
                // ->cc(['shweta@matrixbricks.com','riddhi@matrixbricks.com'])
                ->send(new OrderInvoiceMail($mailData));

                return redirect()->route('payment.thankyou')->with('message', 'Order placed successfully!');
            }

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Something went wrong - ' . $ex->getMessage());
        }
    }


    public function payment(Request $request, $txnid , $order_id, $citizenId, $productId, $cartId)
    {
        $order = Order::find($order_id);
        $user = Citizen::find($citizenId);
        $cart = Cart::get();
        $product = Product::find($productId);
        $amount = $order->order_total_price;
        // dd($amount);

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
