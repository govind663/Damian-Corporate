@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Reset Password
@endsection

@push('styles')
<style>
    .login-page .button-group .button-grp-sec {
        height: 45px !important;
        border-radius: 3px !important;
    }

    .tp-btn-border {
        line-height: 42px !important;
        font-size: 14px !important;
        font-weight: 600 !important;
    }

    .tp-btn-border.height {
        height: 45px !important;
        border-radius: 2px !important;
    }

    .invalid-feedback {
        color: #ffffff !important;
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
                            <span>
                                <a href="{{ route('frontend.home') }}" title="Home">Home</a>
                            </span>
                            <span class="dvdr">
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                            <span>Reset Password</span>
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
                            <h3>Reset Password Here</h3>
                        </div>
                        <form method="POST" class="form-horizontal mt-30" action="{{ route('frontend.citizen.password.update') }}" aria-label="{{ __('Reset Password') }}" enctype="multipart/form">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-pwd-sec" for="email"><b>{{ __('Email Address') }} : <span class="text-light">*</span></b></label>
                                        <div class="tp-contact-input-box mt-5">
                                            <input type="email" class="@error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" placeholder="Enter E-Mail Address">
                                            <div class="tp-contact-icon">
                                                <span>
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-pwd-sec" for="pwd"><b>Password : <span class="text-light">*</span></b></label>
                                        <div class="tp-contact-input-box mt-5">
                                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" autocomplete="password" placeholder="Enter Password">
                                            <div class="tp-contact-icon">
                                                <span>
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-pwd-sec" for="pwd"><b>Confirm Password : <span class="text-light">*</span></b></label>
                                        <div class="tp-contact-input-box mt-5">
                                            <input  name="password_confirmation" id="password-confirm" type="password"  type="password" class="@error('password_confirmation') is-invalid @enderror" placeholder="Enter Confirm Password">
                                            <div class="tp-contact-icon">
                                                <span>
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="button-group" style="display: flex; gap: 10px; justify-content: center; margin-top: 10px;">
                                <button class="tp-btn-border button-grp-sec" type="submit" title="Login">
                                    <span>
                                        <i class="fa fa-lock"></i>
                                        {{ __('Reset Password') }}
                                    </span>
                                </button>
                            </div>
                        </form>

                        <div class="login-bottom-text p-3">
                            <a href="{{ route('frontend.citizen.register') }}" title="Sign Up">
                                <p class="mb-0 text-center text-bold">
                                    <strong>
                                        Don't have an account ? <span class="text-primary">Register</span>
                                    </strong>
                                </p>
                            </a>
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
