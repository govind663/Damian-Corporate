@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Checkout
@endsection

@push('styles')
<style>
    .form-select {
        padding: 1.375rem 2.25rem .375rem .75rem !important;
    }
    .invalid-feedback strong {
        color: rgb(237, 233, 233);
    }

    .form-control.is-invalid, .was-validated .form-control:invalid {
        border-color: #e9e8e8;
        background-image: none !important;
    }

    .form-control,
    .form-select {
        padding: 1rem 0.75rem; /* Same padding for input and select fields */
        font-size: 16px;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: rgba(255, 255, 255, 0.6); /* Match input field background */
        background-clip: padding-box;
        border: 1px solid rgba(255, 255, 255, 0.6);
        border-radius: 4px; /* Slightly rounded corners */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .profile-upload-container {
        position: relative;
        text-align: center;
    }

    .profile-upload-label {
        cursor: pointer;
        display: inline-block;
        position: relative;
    }

    #profile-preview img {
        border: 3px solid #ddd;
        padding: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-upload-label input {
        display: none;
    }

    .textarea {
        border : 1px solid rgba(255, 255, 255, 0.6);
    }
</style>
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="bre-sec">
        <div class="container-fluid home-container">
           <div class="row">
              <div class="col-xxl-12">
                 <div class="breadcrumb-content">
                    <div class="breadcrumb__list">
                       <span><a href="{{ route('frontend.home') }}" title="Home">Home</a></span>
                       <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                       <span><a href="{{ route('frontend.products') }}" title="Home">Store</a></span>
                       <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                       <span>Checkout</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    <!-- breadcrumb area end -->

    <!-- checkout area start -->
    <section class="checkout-section">
        <div class="container">
            <form action="{{ route('frontend.checkout.store', ['citizenId' => Auth::guard('citizen')->user()->id, 'productId' => $productId->product_id, 'cartId' => $productId->id]) }}" method="POST" class="tp-checkout-form" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="citizen_id" value="{{ Auth::guard('citizen')->user()->id }}">
                <input type="hidden" name="product_id" value="{{ $productId->product_id }}">
                <input type="hidden" name="cart_id" value="{{ $productId->id }}">

                <div class="row">
                    <div class="col-lg-7">
                        <div class="checkout-bill-area-sec">
                            <h3 class="checkout-bill-title-sec">Billing Details</h3>
                            <div class="tp-checkout-bill-form">
                                <div class="tp-checkout-bill-inner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>First Name : <span>*</span></b></label>
                                                <input id="f_name" name="f_name" type="text" class="@error('f_name') is-invalid @enderror" placeholder="First Name" value="{{ Auth::guard('citizen')->user()->f_name }}" readonly>
                                                @error('f_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>Last Name : <span>*</span></b></label>
                                                <input id="l_name" name="l_name" type="text" class="@error('l_name') is-invalid @enderror" placeholder="Last Name" value="{{ Auth::guard('citizen')->user()->l_name }}" readonly>
                                                @error('l_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>Email address : <span>*</span></b></label>
                                                <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ Auth::user() ? Auth::user()->email : old('email') }}" placeholder="Email address" readonly>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>Phone : <span>*</span></b></label>
                                                <input type="text" id="phone" name="phone" class="@error('phone') is-invalid @enderror" value="{{ Auth::user() ? Auth::user()->phone : old('phone') }}" placeholder="Phone" readonly>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>Postcode ZIP : <span>*</span></b></label>
                                                <input type="text" id="postcode" name="postcode" class="@error('postcode') is-invalid @enderror" value="{{ old('postcode') ? old('postcode') : Auth::guard('citizen')->user()->postcode }}" placeholder="Postcode">
                                                @error('postcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>City : <span>*</span></b></label>
                                                <input type="text" id="city" name="city" class="@error('city') is-invalid @enderror" value="{{ old('city') ? old('city') : Auth::guard('citizen')->user()->city }}" placeholder="City">
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>State : <span>*</span></b></label>
                                                <select class="form-select form-select-xl @error('state') is-invalid @enderror" name="state" id="state">
                                                    <option value="">Select State</option>
                                                    <optgroup label="State">
                                                        @foreach ($states as $state)
                                                            @php
                                                                $selected = old('state') == $state->id || Auth::guard('citizen')->user()->state == $state->id ? 'selected' : '';
                                                            @endphp
                                                            <option value="{{ $state->id }}" {{ $selected }}>{{ $state->state_name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label><b>Country : <span>*</span></b></label>
                                                <input type="text" id="country" name="country" class="@error('country') is-invalid @enderror" placeholder="Country" value="{{ old('country') ? old('country') : Auth::guard('citizen')->user()->country }}" >
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label><b>Street address : <span>*</span></b></label>
                                                <input type="text" id="street_address" name="street_address" class="@error('street_address') is-invalid @enderror" value="{{ old('street_address') }}" value="{{ old('street_address') }}" placeholder="House number and street name" required>
                                                @error('street_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="checkout-input-sec">
                                                <label><b>Apartment, suite, unit, etc. (optional) : </b></label>
                                                <input type="text" id="apartment_address" name="apartment_address" class="@error('apartment_address') is-invalid @enderror" value="{{ old('apartment_address') }}" placeholder="Apartment, suite, unit, etc. (optional)">
                                                @error('apartment_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label><b>Order Notes (Optional) : </b></label>
                                                <textarea id="notes" name="notes" class="textarea_editor border-radius-0" placeholder="Order Notes (Optional)" value="{{ old('notes') }}">{{ old('notes') }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <!-- checkout place order -->
                        <div class="checkout-place-sec">
                            <h3 class="checkout-place-title-sec">Your Order</h3>

                            <div class="tp-order-info-list order-info-list-sec">
                                <ul>
                                    <!-- header -->
                                    <li class="order-info-list-header-sec">
                                        <h4>Product</h4>
                                        <h4>Quantity</h4>
                                        <h4>Price</h4>
                                        <h4>Total</h4>
                                    </li>

                                    <!-- item list -->
                                    @foreach($cartItems as $key => $value)
                                    <li class="tp-order-info-list-desc">
                                        <p class="text-start">
                                            {{ $value->product->name }}
                                        </p>
                                        <p class="text-center">
                                            {{ $value->quantity }}
                                        </p>
                                        <p class="text-end">
                                            ₹ {{ number_format($value->product->discount_price_after_percentage, 2) }}
                                        </p>
                                        <p class="text-end">
                                            ₹ {{ number_format($value->product->discount_price_after_percentage * $value->quantity, 2) }}
                                        </p>
                                    </li>
                                    @endforeach

                                    <!-- Subtotal -->
                                    <li class="order-info-list-subtotal-sec">
                                        <span>Subtotal</span>
                                        <input type="hidden" id="subtotal" name="subtotal" value="{{ $cartItems->sum(function($item) {
                                            return (float) $item->product->discount_price_after_percentage * (int) $item->quantity;
                                        }) }}">
                                        <span id="subtotal-amount">₹ {{ number_format($cartItems->sum(function($item) {
                                            return (float) $item['product']['discount_price_after_percentage'] * (int) $item['quantity'];
                                        }), 2) }}</span>
                                    </li>

                                    <!-- Shipping -->
                                    <li class="tp-order-info-list-shipping">
                                        <span>Shipping</span>
                                        <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                            {{-- <span>
                                                <input id="flat_rate" type="radio" name="shipping" value="{{ 200 ?? 0 }}" onclick="updateTotal(200)" checked>
                                                <label for="flat_rate">Flat rate: <span>₹ 200</span></label>
                                            </span>
                                            <span>
                                                <input id="local_pickup" type="radio" name="shipping" value="{{ 200 ?? 0 }}" onclick="updateTotal(200)">
                                                <label for="local_pickup">Local pickup: <span>₹ 200</span></label>
                                            </span> --}}
                                            <span>
                                                <input id="free_shipping" type="radio" name="shipping" value="{{ 0 ?? 0 }}" onclick="updateTotal(0)" checked>
                                                <label for="free_shipping">Free shipping</label>
                                            </span>
                                        </div>
                                    </li>

                                    <!-- Total -->
                                    <li class="tp-order-info-list-total">
                                        <span>Total</span>
                                        <input type="hidden" name="total" value="{{ number_format($cartItems->sum(function($item) {
                                            return (float) $item['product']['discount_price_after_percentage'] * (int) $item['quantity'];
                                        }), 2) }}">
                                        <span id="total-amount">₹ {{ number_format($cartItems->sum(function($item) {
                                            return (float) $item['product']['discount_price_after_percentage'] * (int) $item['quantity'];
                                        }), 2) }}</span> <!-- Defaulting to Flat Rate -->
                                    </li>
                                </ul>
                            </div>

                            <div class="tp-checkout-payment">
                                <div class="tp-checkout-payment-item">
                                    <input type="radio" id="back_transfer" name="payment" value="1" required>
                                    <label for="back_transfer" data-bs-toggle="direct-bank-transfer">
                                        Online Payment
                                    </label>
                                </div>
                                {{-- <div class="tp-checkout-payment-item">
                                    <input type="radio" id="cheque_payment" name="payment" value="2">
                                    <label for="cheque_payment">Cheque Payment</label>
                                </div> --}}
                                <div class="tp-checkout-payment-item">
                                    <input type="radio" id="cod" name="payment" value="3" required>
                                    <label for="cod">Cash on Delivery</label>
                                </div>
                                {{-- <div class="tp-checkout-payment-item paypal-payment">
                                    <input type="radio" id="paypal" name="payment" value="4">
                                    <label for="paypal">PayPal
                                        <img src="{{ asset('frontend/assets/img/icon/payment-option.png') }}" alt="payment-option" title="payment-option">
                                        <a href="https://www.paypal.com/" title="What is PayPal?">
                                            What is PayPal?
                                        </a>
                                    </label>
                                </div> --}}
                            </div>


                            <div class="tp-checkout-agree">
                                <div class="checkout-option-sec">
                                    <div class="tp-checkout-agree-item">
                                        <input id="agree" type="checkbox" required value="1" checked>
                                        <label for="agree">
                                            <b>
                                                <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-tc-modal-lg" class="text-white text-bold">
                                                    I have read and agree to the website.
                                                </a>
                                            </b>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            @if (Auth::guard('citizen')->check())
                                <div class="tp-checkout-btn-wrapper">
                                    <button type="submit" class="tp-btn-theme text-center w-100">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        <span>Place Order</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- checkout area end -->

    <!-- MODAL Terms & Condition -->
    <div class="modal fade bd-tc-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="justify-content: space-between; background-color: #f8f9fa; padding: 20px;">
                    <h5 class="modal-title" style="font-size: 1.5rem; color: #343a40;">Terms & Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 1.5rem; color: #343a40;">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-mod" style="font-size: 1rem; color: #495057; padding: 30px;">
                    <ul class="ml-3">
                        <li class="mt-2" style="line-height: 1.8;">Welcome to our e-commerce website! By accessing or using our services, you agree to comply with these Terms & Conditions.</li>
                        <li class="mt-2" style="line-height: 1.8;">We reserve the right to update or modify these Terms & Conditions at any time without prior notice. Please check periodically for changes.</li>
                        <li class="mt-2" style="line-height: 1.8;">All users must be at least 18 years of age to use our services. By accessing or using our site, you confirm that you are 18 years or older.</li>
                        <li class="mt-2" style="line-height: 1.8;">We do not guarantee the availability or accuracy of product listings. All information provided on the website is subject to change without notice.</li>
                        <li class="mt-2" style="line-height: 1.8;">Users are responsible for maintaining the confidentiality of their account and password. You agree to accept responsibility for all activities that occur under your account.</li>
                        <li class="mt-2" style="line-height: 1.8;">Product pricing and availability are subject to change without notice. We reserve the right to modify the pricing or discontinue products at any time.</li>
                        <li class="mt-2" style="line-height: 1.8;">You agree to provide accurate, current, and complete information during the checkout process. Failure to do so may result in the cancellation of your order.</li>
                        <li class="mt-2" style="line-height: 1.8;">Payment for products purchased on our website must be made in full at the time of checkout. We accept a variety of payment methods, including credit/debit cards, and online payment systems.</li>
                        <li class="mt-2" style="line-height: 1.8;">Once an order has been placed, we will process and ship it according to our shipping policies. Please review the shipping and delivery information on our website for estimated delivery times.</li>
                        <li class="mt-2" style="line-height: 1.8;">We offer a return and refund policy, which allows you to return eligible products within a specified period after receipt. Please review our return policy for details on how to initiate a return.</li>
                        <li class="mt-2" style="line-height: 1.8;">We are not responsible for any delays, errors, or damages caused by third-party services, including shipping carriers and payment processors.</li>
                        <li class="mt-2" style="line-height: 1.8;">You agree not to engage in any fraudulent, unlawful, or harmful activities on our site, including hacking, distributing viruses, or submitting false information.</li>
                        <li class="mt-2" style="line-height: 1.8;">By using our site, you agree to indemnify and hold harmless our company, affiliates, and employees from any claims, damages, or losses arising from your use of our services.</li>
                        <li class="mt-2" style="line-height: 1.8;">All content on this website, including text, images, and logos, are protected by copyright laws. You may not use any content from our site without our express written consent.</li>
                        <li class="mt-2" style="line-height: 1.8;">This agreement shall be governed by the laws of [Your Country], and any disputes will be resolved in the courts located within [Your Jurisdiction].</li>
                        <li class="mt-2" style="line-height: 1.8;">If you have any questions or concerns about our Terms & Conditions, please contact us using the contact information provided on our website.</li>
                    </ul>
                </div>
                <div class="modal-footer" style="background-color: #f8f9fa; padding: 20px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="agreeBtn">Agree</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function updateTotal(shippingCost) {
        // Calculate subtotal (pass the subtotal from server to JavaScript)
        const subtotal = {{ $cartItems->sum(function($item) {
            return (float) $item['product']['discount_price_after_percentage'] * (int) $item['quantity'];
        }) }};

        // Calculate total
        const total = subtotal + parseFloat(shippingCost);

        // Update total on the page
        document.getElementById('total-amount').innerText = `₹ ${total.toFixed(2)}`;
    }

    // Trigger default shipping cost (flat rate) on load
    document.addEventListener('DOMContentLoaded', () => {
        const defaultShipping = document.querySelector('input[name="shipping"]:checked').value;
        updateTotal(defaultShipping);
    });
</script>

<script>
    document.getElementById('agreeBtn').addEventListener('click', function() {
        alert('You have agreed to the Terms & Conditions.');
        // Additional actions upon agreeing (e.g., form submission or redirect)
        model.close();
    });
</script>
@endpush
