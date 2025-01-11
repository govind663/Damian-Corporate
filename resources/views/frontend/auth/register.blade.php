@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Register
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
                            <span>Register</span>
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
                            <h3>Register Here</h3>
                        </div>
                        <form method="POST" class="form-horizontal mt-30" action="{{ route('frontend.citizen.register.store') }}" enctype="multipart/form">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-email-sec" for="f_name">
                                            <b>First Name : <span class="text-light">*</span></b>
                                        </label>
                                        <div class="tp-contact-input-box mt-5">
                                            <input type="text" class="@error('f_name') is-invalid @enderror" id="f_name" name="f_name" value="{{ old('f_name') }}" placeholder="Enter First Name">
                                            <div class="tp-contact-icon">
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            @error('f_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-email-sec" for="l_name">
                                            <b>Last Name : <span class="text-light">*</span></b>
                                        </label>
                                        <div class="tp-contact-input-box mt-5">
                                            <input type="text" class="@error('l_name') is-invalid @enderror" id="l_name" name="l_name" value="{{ old('l_name') }}" placeholder="Enter Last Name">
                                            <div class="tp-contact-icon">
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            @error('l_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-email-sec" for="email">
                                            <b>E-Mail Address : <span class="text-light">*</span></b>
                                        </label>
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

                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-email-sec" for="phone">
                                            <b>Mobile Number : <span class="text-light">*</span></b>
                                        </label>
                                        <div class="tp-contact-input-box mt-5">
                                            <input type="text" class="@error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Mobile Number">
                                            <div class="tp-contact-icon">
                                                <span>
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-pwd-sec" for="pwd">
                                            <b>Password : <span class="text-light">*</span></b>
                                        </label>
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

                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <label class="cart-pwd-sec" for="password_confirmation">
                                            <b>Confirm Password : <span class="text-light">*</span></b>
                                        </label>
                                        <div class="tp-contact-input-box mt-5">
                                            <input type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" placeholder="Enter Confirm Password">
                                            <div class="tp-contact-icon">
                                                <span>
                                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="button-group" style="display: flex; gap: 10px; justify-content: center; margin-top: 10px;">
                                <button class="tp-btn-border button-grp-sec" type="submit" title="Login">
                                    <span>
                                        <i class="fa fa-lock"></i>
                                        {{ __('Register') }}
                                    </span>
                                </button>
                            </div>
                        </form>

                        <div class="login-bottom-text p-3">
                            <a href="{{ route('frontend.citizen.login') }}" title="Sign Up">
                                <p class="mb-2 text-center text-bold">
                                    <strong>
                                        Already have an account ? <span class="text-primary">Login</span>
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
