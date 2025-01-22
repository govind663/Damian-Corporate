<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>Initiate Payment API</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/fav-dp.png') }}">

    <link rel="stylesheet" href="{{ asset('easebuzz/assets/css/style.css') }}">

</head>

<body>
    <div class="grid-container">
        <header class="wrapper">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('easebuzz/assets/images/eb-logo.svg') }}" alt="Easebuzz">
                </a>
            </div>

            {{-- <div class="hedding">
                <h2><a class="highlight" href="../index.html">Back</a></h2>
            </div> --}}
        </header>

        <div class="form-container">
            <h2>INITIATE PAYMENT API</h2>
            <hr>
            <form method="POST" action="{{ asset('paywitheasebuzz-php-lib-master/easebuzz.php?api_name=initiate_payment') }}">
                @csrf
                <div class="main-form">
                    <h3>Mandatory Parameters</h3>
                    <hr>
                    <div class="row mandatory-data">
                        <div class="form-field">
                            <label for="txnid"><b>Transaction ID : <sup>*</sup></b></label>
                            <input id="txnid" class="form-control @error('txnid') is-invalid @enderror" name="txnid" value="{{ old('txnid') ?? $txnid }}"  placeholder="T31Q6JT8HB">
                            @error('txnid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="amount"><b>Amount : <sup>(should be float)*</sup></b></label>
                            <input id="amount" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount', isset($amount) ? number_format($amount, 2, '.', '') : '') }}"  placeholder="125.25">
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="firstname"><b>Full Name<sup>*</sup></b></label>
                            <input id="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ Auth::guard('citizen')->user()->f_name . ' ' . Auth::guard('citizen')->user()->l_name }}"  placeholder="Easebuzz Pvt. Ltd.">
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="email"><b>Email ID<sup>*</sup></b></label>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::guard('citizen')->user()->email }}"  placeholder="initiate.payment@easebuzz.in">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="phone"><b>Phone<sup>*</sup></b></label>
                            <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ Auth::guard('citizen')->user()->phone }}" placeholder="0123456789">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="productinfo"><b>Product NAme<sup>*</sup></b></label>
                            <input id="productinfo" class="form-control @error('productinfo') is-invalid @enderror" name="productinfo"  value="{{ $product->name }}" placeholder="Product Info">
                            @error('productinfo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="surl"><b>Success URL<sup>*</sup></b></label>
                            <input id="surl" class="form-control @error('surl') is-invalid @enderror" name="surl" value="{{ asset('paywitheasebuzz-php-lib-master/response.php') }}" placeholder="Success URL">
                            @error('surl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="furl"><b>Failure URL<sup>*</sup></b></label>
                            <input id="furl" class="form-control @error('furl') is-invalid @enderror" name="furl" value="{{ asset('paywitheasebuzz-php-lib-master/response.php') }}" placeholder="Failure URL">
                            @error('furl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <h3>Shipping Address</h3>
                    <hr>
                    <div class="optional-data">

                        <div class="form-field">
                            <label for="city"><b>City : </b></label>
                            <input id="city" class="city" name="city" value="{{ old('city') ? old('city') : Auth::guard('citizen')->user()->city }}"  placeholder="Pune">
                        </div>

                        @php
                            $state = DB::table('states')->where('id', Auth::guard('citizen')->user()->state)->value('state_name');

                        @endphp

                        <div class="form-field">
                            <label for="state"><b>State : </b></label>
                            <input type="hidden" id="state" class="state" name="state" value="{{ old('state') ? old('state') : Auth::guard('citizen')->user()->state }}" placeholder="Maharashtra">
                            <input id="stateId" class="state" name="stateId" value="{{ old('state') ? old('state') : $state }}"  placeholder="Maharashtra">
                        </div>

                        <div class="form-field">
                            <label for="country"><b>Country : </b></label>
                            <input id="country" class="country" name="country" value="{{ old('country') ? old('country') : Auth::guard('citizen')->user()->country }}"  placeholder="India">
                        </div>

                        <div class="form-field">
                            <label for="zipcode"><b>Zip-Code : </b></label>
                            <input id="zipcode" class="zipcode" name="zipcode" value="{{ old('zipcode') ? old('zipcode') : Auth::guard('citizen')->user()->postcode }}"  placeholder="123456">
                        </div>

                        <div class="form-field">
                            <label for="address1"><b>Address 1 : </b></label>
                            <input id="address1" class="address1" name="address1" value="{{ old('address1') }}" placeholder="#250, Main 5th cross,">
                        </div>

                        <div class="form-field">
                            <label for="address2"><b>Address 2 : </b></label>
                            <input id="address2" class="address2" name="address2" value="{{ old('address2') }}" placeholder="Saket nagar, Pune">
                        </div>

                    </div>

                    <div class="btn-submit">
                        <button type="submit" class="tp-btn-theme">Proceed to Pay</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</body>

</html>
