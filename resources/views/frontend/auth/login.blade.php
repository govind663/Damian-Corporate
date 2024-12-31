@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Login
@endsection

@push('styles')
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
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!--section start-->
    <section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tp-contact-right login-here-form-area">
                        <div class="login-heading">
                            <h3>Login Here</h3>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-email-sec" for="email">E-Mail Address :</label>
                                        <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address (e.g., example@domain.com)">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-pwd-sec" for="pwd">Password :</label>
                                        <input type="password" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label class="remember-sec">
                                        <input type="checkbox" name="remember" id="remember">
                                        &nbsp;Remember me
                                    </label>
                                </div>
                            </div>
                        </form>
                        <div class="button-group"
                            style="display: flex; gap: 10px; justify-content: center; margin-top: 20px;">
                            <button class="tp-btn-border button-grp-sec" type="button"><span>Login</span></button>
                            <button class="tp-btn-border button-grp-sec" type="button"><span>Sign Up</span></button>
                        </div>
                        <div class="forget-password-btn">
                            <a href="#" class="tp-btn-border height w-100"><span>Forgot Your Password?</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <div class="login-right-side-img-sec">
                        <img src="{{ asset('frontend/assets/img/contact/login-sec-img.jpg') }}" alt="login-sec-img" title="login-sec-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection

@push('scripts')
@endpush
