@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Checkout
@endsection

@push('styles')
<style>
    .bre-sec {
        height: 60px !important;
    }
    .bre-sec .breadcrumb-content {
        padding: 15px 0px 0px !important;
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
                       <span><a href="{{ route('frontend.home') }}">Home</a></span>
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
                                                <input type="text" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Company name (optional)</label>
                                                <input type="text" placeholder="Example LTD.">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Country</label>
                                                <input type="text" placeholder="India (IN)">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Street address</label>
                                                <input type="text" placeholder="House number and street name">
                                            </div>

                                            <div class="checkout-input-sec">
                                                <input type="text" placeholder="Apartment, suite, unit, etc. (optional)">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>City</label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label>State</label>
                                                <select>
                                                    <option value="">Select State</option>
                                                    <option>Andhra Pradesh</option>
                                                    <option>Arunachal Pradesh</option>
                                                    <option>Assam</option>
                                                    <option>Bihar</option>
                                                    <option>Chhattisgarh</option>
                                                    <option>Goa</option>
                                                    <option>Gujarat</option>
                                                    <option>Haryana</option>
                                                    <option>Himachal Pradesh</option>
                                                    <option>Jharkhand</option>
                                                    <option>Karnataka</option>
                                                    <option>Kerala</option>
                                                    <option>Madhya Pradesh</option>
                                                    <option>Maharashtra</option>
                                                    <option>Manipur</option>
                                                    <option>Meghalaya</option>
                                                    <option>Mizoram</option>
                                                    <option>Nagaland</option>
                                                    <option>Odisha</option>
                                                    <option>Punjab</option>
                                                    <option>Rajasthan</option>
                                                    <option>Sikkim</option>
                                                    <option>Tamil Nadu</option>
                                                    <option>Telangana</option>
                                                    <option>Tripura</option>
                                                    <option>Uttar Pradesh</option>
                                                    <option>Uttarakhand</option>
                                                    <option>West Bengal</option>
                                                    <option>Andaman and Nicobar Islands</option>
                                                    <option>Chandigarh</option>
                                                    <option>Dadra and Nagar Haveli and Daman and Diu</option>
                                                    <option>Delhi</option>
                                                    <option>Lakshadweep</option>
                                                    <option>Puducherry</option>
                                                    <option>Ladakh</option>
                                                    <option>Jammu and Kashmir</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-input-sec">
                                                <label>Postcode ZIP</label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Phone <span>*</span></label>
                                                <input type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Email address <span>*</span></label>
                                                <input type="email" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-option-wrapper-sec">
                                                <div class="checkout-option-sec">
                                                    <input id="create_free_account" type="checkbox">
                                                    <label for="create_free_account">Create an account?</label>
                                                </div>
                                                <div class="checkout-option-sec">
                                                    <input id="ship_to_diff_address" type="checkbox">
                                                    <label for="ship_to_diff_address">Ship to a different address?</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="checkout-input-sec">
                                                <label>Order notes (optional)</label>
                                                <textarea placeholder=""></textarea>
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
                                <li class="tp-order-info-list-desc">
                                    <p>EPIC Table - Danform <span> x 2</span></p>
                                    <span>₹ 10,000</span>
                                </li>
                                <li class="tp-order-info-list-desc">
                                    <p>ORBIT Chair - Danform <span> x 1</span></p>
                                    <span>₹ 10,000</span>
                                </li>
                                <li class="tp-order-info-list-desc">
                                    <p>BLISS Chair - Danform <span> x 3</span></p>
                                    <span>₹ 10,000</span>
                                </li>
                                <li class="tp-order-info-list-desc">
                                    <p>Comb Chair - Kristensen <span> x 1</span></p>
                                    <span>₹ 10,000</span>
                                </li>

                                <!-- subtotal -->
                                <li class="order-info-list-subtotal-sec">
                                    <span>Subtotal</span>
                                    <span>₹ 40,000</span>
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
                                    <span>₹ 40,200</span>
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
                                <label for="paypal">PayPal <img src="{{ asset('frontend/assets/img/icon/payment-option.png') }}" alt=""> <a href="#">What is PayPal?</a></label>
                            </div>
                        </div>
                        <div class="tp-checkout-agree">
                            <div class="checkout-option-sec">
                                <input id="read_all" type="checkbox">
                                <label for="read_all">I have read and agree to the website.</label>
                            </div>
                        </div>
                        <div class="tp-checkout-btn-wrapper">
                            <a href="#" class="tp-btn-theme text-center w-100"><span>Place Order</span></a>
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
    // Initialize Swiper
    var swiper = new Swiper('.swiper-container', {
       slidesPerView: 1,
       spaceBetween: 10,
       loop: true,
       navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
       },
       breakpoints: {
          640: {
             slidesPerView: 1,
             spaceBetween: 20,
          },
          768: {
             slidesPerView: 2,
             spaceBetween: 30,
          },
          1024: {
             slidesPerView: 4,
             spaceBetween: 40,
          },
       },
    });
 </script>
@endpush
