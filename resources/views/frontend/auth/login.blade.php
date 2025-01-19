@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Login
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

    .invalid-feedback strong {
        color: rgb(237, 233, 233);
    }

    .form-control.is-invalid, .was-validated .form-control:invalid {
        border-color: #e9e8e8;
        background-image: none !important;
    }

    /* Media query for mobile view */
    @media (max-width: 768px) {
        .button-group {
            flex-direction: column; /* Stack the buttons vertically */
            gap: 5px; /* Reduce the gap between buttons */
            margin-top: 15px; /* Slightly adjust the margin for mobile view */
        }

        .button-group .tp-btn-border {
            width: 100%; /* Make buttons take full width */
            text-align: center; /* Center align text and icons */
        }

        .button-group a.tp-btn-border {
            text-decoration: none; /* Ensure links are styled consistently */
        }
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
                        <form method="POST" class="form-horizontal mt-30" action="{{ route('frontend.citizen.login.store') }}" enctype="multipart/form">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-email-sec" for="email"><b>E-Mail Address : <span class="text-light">*</span></b></label>
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

                                <input class="form-check-input" type="hidden" name="remember_token" id="remember_token" value="true">
                            </div>

                            <div class="button-group" style="display: flex; gap: 10px; justify-content: center; margin-top: 10px;">
                                <button class="tp-btn-border button-grp-sec" type="submit" title="Login">
                                    <span>
                                        <i class="fa fa-lock"></i>
                                        Login
                                    </span>
                                </button>

                                @if (Route::has('frontend.citizen.forget-password.request'))
                                    <a href="{{ route('frontend.citizen.forget-password.request') }}" class="tp-btn-border height" title="Forgot Your Password?">
                                        <span>
                                            <i class="fa-solid fa-key"></i>
                                            Forgot Your Password?
                                        </span>
                                    </a>
                                @endif
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

                        {{-- <div class="login-three-btn-sec"> --}}
                            {{-- <a href="#" class="tp-btn-border height" title="Google">
                                <span>
                                    <i class="fa-brands fa-google"></i>
                                    With Google
                                </span>
                            </a>
                            <a href="#" class="tp-btn-border height" title="Facebook">
                                <span>
                                    <i class="fa-brands fa-facebook-f"></i>
                                    Facebook
                                </span>
                            </a> --}}
                            {{-- @if (Route::has('frontend.citizen.forget-password.request'))
                                <a href="{{ route('frontend.citizen.forget-password.request') }}" class="tp-btn-border height" title="Forgot Your Password?">
                                    <span>
                                        <i class="fa-solid fa-key"></i>
                                        Forgot Your Password?
                                    </span>
                                </a>
                            @endif
                        </div> --}}
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
