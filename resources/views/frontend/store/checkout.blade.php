@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Checkout
@endsection

@push('styles')
<style>
    .form-select {
        padding: 1.375rem 2.25rem .375rem .75rem !important;
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
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout-bill-area-sec">
                        <h3 class="checkout-bill-title-sec">Billing Details</h3>
                        <div class="tp-checkout-bill-form">
                            <form action="#">
                                <div class="tp-checkout-bill-inner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label>First Name <span>*</span></label>
                                                <input id="f_name" name="f_name" type="text" class="form-control" placeholder="First Name" value="{{ Auth::guard('citizen')->user()->f_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label>Last Name <span>*</span></label>
                                                <input id="l_name" name="l_name" type="text" class="form-control" placeholder="Last Name" value="{{ Auth::guard('citizen')->user()->l_name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label>Email address <span>*</span></label>
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
                                                <label>Phone <span>*</span></label>
                                                <input type="text" id="phone" name="phone" class="@error('phone') is-invalid @enderror" value="{{ Auth::user() ? Auth::user()->phone : old('phone') }}" placeholder="Phone" readonly>
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Country <span>*</span></label>
                                                <input type="text" id="country" name="country" class="@error('country') is-invalid @enderror" placeholder="Country" value="{{ old('country') }}" >
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Street address</label>
                                                <input type="text" id="street_address" name="street_address" class="@error('street_address') is-invalid @enderror" value="{{ old('street_address') }}" value="{{ old('street_address') }}" placeholder="House number and street name">
                                                @error('street_address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="checkout-input-sec">
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
                                                <label>City</label>
                                                <input type="text" id="city" name="city" class="@error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="City">
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label>State <span>*</span></label>
                                                <select class="form-select form-select-xl @error('state') is-invalid @enderror" name="state" id="state">
                                                    <option value="">Select State</option>
                                                    <optgroup>
                                                        <option value="1" {{ old('state') == '1' ? 'selected' : '' }}>Andhra Pradesh</option>
                                                        <option value="2" {{ old('state') == '2' ? 'selected' : '' }}>Arunachal Pradesh</option>
                                                        <option value="3" {{ old('state') == '3' ? 'selected' : '' }}>Assam</option>
                                                        <option value="4" {{ old('state') == '4' ? 'selected' : '' }}>Bihar</option>
                                                        <option value="5" {{ old('state') == '5' ? 'selected' : '' }}>Chhattisgarh</option>
                                                        <option value="6" {{ old('state') == '6' ? 'selected' : '' }}>Goa</option>
                                                        <option value="7" {{ old('state') == '7' ? 'selected' : '' }}>Gujarat</option>
                                                        <option value="8" {{ old('state') == '8' ? 'selected' : '' }}>Haryana</option>
                                                        <option value="9" {{ old('state') == '9' ? 'selected' : '' }}>Himachal Pradesh</option>
                                                        <option value="10" {{ old('state') == '10' ? 'selected' : '' }}>Jharkhand</option>
                                                        <option value="11" {{ old('state') == '11' ? 'selected' : '' }}>Karnataka</option>
                                                        <option value="12" {{ old('state') == '12' ? 'selected' : '' }}>Kerala</option>
                                                        <option value="13" {{ old('state') == '13' ? 'selected' : '' }}>Madhya Pradesh</option>
                                                        <option value="14" {{ old('state') == '14' ? 'selected' : '' }}>Maharashtra</option>
                                                        <option value="15" {{ old('state') == '15' ? 'selected' : '' }}>Manipur</option>
                                                        <option value="16" {{ old('state') == '16' ? 'selected' : '' }}>Meghalaya</option>
                                                        <option value="17" {{ old('state') == '17' ? 'selected' : '' }}>Mizoram</option>
                                                        <option value="18" {{ old('state') == '18' ? 'selected' : '' }}>Nagaland</option>
                                                        <option value="19" {{ old('state') == '19' ? 'selected' : '' }}>Odisha</option>
                                                        <option value="20" {{ old('state') == '20' ? 'selected' : '' }}>Punjab</option>
                                                        <option value="21" {{ old('state') == '21' ? 'selected' : '' }}>Rajasthan</option>
                                                        <option value="22" {{ old('state') == '22' ? 'selected' : '' }}>Sikkim</option>
                                                        <option value="23" {{ old('state') == '23' ? 'selected' : '' }}>Tamil Nadu</option>
                                                        <option value="24" {{ old('state') == '24' ? 'selected' : '' }}>Telangana</option>
                                                        <option value="25" {{ old('state') == '25' ? 'selected' : '' }}>Tripura</option>
                                                        <option value="26" {{ old('state') == '26' ? 'selected' : '' }}>Uttar Pradesh</option>
                                                        <option value="27" {{ old('state') == '27' ? 'selected' : '' }}></option>Uttarakhand</option>
                                                        <option value="28" {{ old('state') == '28' ? 'selected' : '' }}>West Bengal</option>
                                                        <option value="29" {{ old('state') == '29' ? 'selected' : '' }}>Andaman and Nicobar Islands</option>
                                                        <option value="30" {{ old('state') == '30' ? 'selected' : '' }}>Chandigarh</option>
                                                        <option value="31" {{ old('state') == '31' ? 'selected' : '' }}>Dadra and Nagar Haveli and Daman and Diu</option>
                                                        <option value="32" {{ old('state') == '32' ? 'selected' : '' }}>Delhi</option>
                                                        <option value="33" {{ old('state') == '33' ? 'selected' : '' }}>Lakshadweep</option>
                                                        <option value="34" {{ old('state') == '34' ? 'selected' : '' }}>Puducherry</option>
                                                        <option value="35" {{ old('state') == '35' ? 'selected' : '' }}>Ladakh</option>
                                                        <option value="36" {{ old('state') == '36' ? 'selected' : '' }}>Jammu and Kashmir</option>
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
                                                <label>Postcode ZIP</label>
                                                <input type="text" id="postcode" name="postcode" class="@error('postcode') is-invalid @enderror" value="{{ old('postcode') }}" placeholder="Postcode">
                                                @error('postcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Order notes (optional)</label>
                                                <textarea id="notes" name="notes" class="textarea_editor border-radius-0" placeholder="Notes" value="{{ old('notes') }}">{{ old('notes') }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
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
                                    <h4>Total</h4>
                                </li>

                                <!-- item list -->
                                @foreach($cartItems as $key => $value)
                                <li class="tp-order-info-list-desc">
                                    <p>{{ $value['product']['name'] }} <span> x {{ $value['quantity'] }}</span></p>
                                    <span>₹ {{ $value['product']['price'] * $value['quantity'] }}</span>
                                </li>
                                @endforeach

                                <!-- subtotal -->
                                <li class="order-info-list-subtotal-sec">
                                    <span>Subtotal</span>
                                    <span>₹ {{ $cartItems->sum(function($item) {
                                        return $item['product']['price'] * $item['quantity'];
                                    }) }}</span>
                                </li>

                                <!-- shipping -->
                                <li class="tp-order-info-list-shipping">
                                    <span>Shipping</span>
                                    <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                                        <span>
                                            <input id="flat_rate" type="radio" name="shipping">
                                            <label for="flat_rate">Flat rate: <span>₹ 200</span></label>
                                        </span>
                                        <span>
                                            <input id="local_pickup" type="radio" name="shipping">
                                            <label for="local_pickup">Local pickup: <span>₹ 200</span></label>
                                        </span>
                                        <span>
                                            <input id="free_shipping" type="radio" name="shipping">
                                            <label for="free_shipping">Free shipping</label>
                                        </span>
                                    </div>
                                </li>

                                <!-- total -->
                                <li class="tp-order-info-list-total">
                                    <span>Total</span>
                                    <span>₹ {{ $cartItems->sum(function($item) {
                                        return $item['product']['price'] * $item['quantity'];
                                    }) + 200 }}</span> <!-- Adding the shipping fee to total -->
                                </li>
                            </ul>
                        </div>
                        <div class="tp-checkout-payment">
                            <div class="tp-checkout-payment-item">
                                <input type="radio" id="back_transfer" name="payment">
                                <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank
                                    Transfer</label>
                            </div>
                            <div class="tp-checkout-payment-item">
                                <input type="radio" id="cheque_payment" name="payment">
                                <label for="cheque_payment">Cheque Payment</label>
                            </div>
                            <div class="tp-checkout-payment-item">
                                <input type="radio" id="cod" name="payment">
                                <label for="cod">Cash on Delivery</label>
                            </div>
                            <div class="tp-checkout-payment-item paypal-payment">
                                <input type="radio" id="paypal" name="payment">
                                <label for="paypal">PayPal
                                    <img src="{{ asset('frontend/assets/img/icon/payment-option.png') }}" alt="payment-option" title="payment-option">
                                    <a href="https://www.paypal.com/" title="What is PayPal?">
                                        What is PayPal?
                                    </a>
                                </label>
                            </div>
                        </div>
                        <div class="tp-checkout-agree">
                            <div class="checkout-option-sec">
                                <input id="read_all" type="checkbox">
                                <label for="read_all">I have read and agree to the website.</label>
                            </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper">
                            <a href="#" class="tp-btn-theme text-center w-100" title="Place Order">
                                <span>Place Order</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout area end -->

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get references to necessary elements
        const cartItems = @json($cartItems); // Get cart items from PHP
        const shippingOptions = document.querySelectorAll('input[name="shipping"]');
        const subtotalElement = document.querySelector('.order-info-list-subtotal-sec span:last-child');
        const totalElement = document.querySelector('.tp-order-info-list-total span:last-child');
        const placeOrderBtn = document.querySelector('.tp-checkout-btn-wrapper a');

        // Function to calculate subtotal
        function calculateSubtotal() {
            const subtotal = cartItems.reduce((total, item) => {
                return total + (item.product.price * item.quantity);
            }, 0);
            return subtotal;
        }

        // Function to update the total with shipping
        function updateTotal() {
            const subtotal = calculateSubtotal();
            let shippingCharge = 0;

            // Get selected shipping option and apply corresponding charge
            shippingOptions.forEach(option => {
                if (option.checked) {
                    if (option.id === 'flat_rate' || option.id === 'local_pickup') {
                        shippingCharge = 200;
                    } else if (option.id === 'free_shipping') {
                        shippingCharge = 0;
                    }
                }
            });

            const total = subtotal + shippingCharge;

            // Update the subtotal and total in the UI
            subtotalElement.textContent = `₹ ${subtotal}`;
            totalElement.textContent = `₹ ${total}`;
        }

        // Event listener for shipping option changes
        shippingOptions.forEach(option => {
            option.addEventListener('change', updateTotal);
        });

        // Initial calculation on page load
        updateTotal();

        // Optional: disable the "Place Order" button if the user hasn't agreed to the terms
        placeOrderBtn.addEventListener('click', function(event) {
            const checkbox = document.getElementById('read_all');
            if (!checkbox.checked) {
                event.preventDefault();
                alert('You must agree to the terms to place an order.');
            }
        });
    });
</script>
@endpush
