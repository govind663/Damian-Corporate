@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Account Details
@endsection

@push('styles')
<style>
    .invalid-feedback{
        color: rgb(255, 255, 255);
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
                            <span>Account Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- My Account Section Start -->
    <section class="my-profile-section">
        <div class="container">
            <div class="row">
                <!-- Tab Menu -->
                <x-frontend.tab-menu />

                <!-- Tab Content -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account-info" role="tabpanel" aria-labelledby="account-tab">
                            <div class="account-details-sec">
                                <div class="myaccount-content">
                                    <div class="account-details-form">
                                        <form method="POST" action="{{ route('frontend.updateAccountDetails', encrypt(Auth::guard('citizen')->user()->id)) }}" method="POST" class="form-horizontal p-3" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" name="citizen_id" id="citizen_id" value="{{ Auth::guard('citizen')->user()->id }}">

                                            <div class="col-lg-12 mb-2">
                                                <h3>Account Details</h3>
                                            </div>

                                            <div class="row">
                                                <!-- Profile Image Upload Section -->
                                                <div class="col-lg-12 text-center p-4">
                                                    <div class="profile-upload-container">
                                                        <label for="profile_image" class="profile-upload-label">
                                                            <div id="profile-preview">
                                                                @if (!empty(Auth::guard('citizen')->user()->profile_image))
                                                                    <img src="{{ asset('/damian_corporate/citizen/profile_image/' . Auth::guard('citizen')->user()->profile_image) }}" alt="Profile Image" title="Profile Image" id="profile-image-preview" class="rounded-circle" width="150" height="150">
                                                                @else
                                                                    <img src="{{ asset('frontend/assets/img/icon/profile.png') }}" alt="Profile Image" title="Profile Image" id="profile-image-preview" class="rounded-circle" width="150" height="150">
                                                                @endif
                                                            </div>
                                                            <input type="file" id="profile_image" name="profile_image" accept=".png, .jpg, .jpeg" class="d-none @error('profile_image') is-invalid @enderror" onchange="previewProfileImage()" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/img/icon/profile.png') }}';" value="{{ old('profile_image') ?? Auth::guard('citizen')->user()->profile_image }}" />
                                                            <i class="fa-solid fa-camera fa-1x text-white"></i>
                                                            <span class="profile-upload-text text-white">Upload Profile Image</span>
                                                        </label>
                                                        @error('profile_image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <p class="p-1">
                                                            <small>
                                                                (Note : The file size should be less than 2MB.) <br>
                                                                (Note : only files in .jpg, .jpeg, .png format can be uploaded.)
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- End of Profile Image Upload Section -->

                                                <div class="col-lg-6">
                                                    <input type="text" id="f_name" name="f_name" class="@error('f_name') is-invalid @enderror"  value="{{ Auth::guard('citizen')->user()->f_name }}"  placeholder="First Name *" readonly>
                                                    @error('f_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" id="l_name" name="l_name" class="@error('l_name') is-invalid @enderror"  value="{{ Auth::guard('citizen')->user()->l_name }}"  placeholder="Last Name *" readonly>
                                                    @error('l_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6">
                                                    <input id="email" name="email" type="email" class="@error('email') is-invalid @enderror"  value="{{ Auth::guard('citizen')->user()->email }}"  placeholder="Email Email Id * " readonly>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6">
                                                    <input id="phone" name="phone" type="text" maxlength="10" class="@error('phone') is-invalid @enderror"  value="{{ Auth::guard('citizen')->user()->phone }}"  placeholder="Phone Number *" readonly>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6">
                                                    <input id="postcode" name="postcode" maxlength="6" type="text" class="@error('postcode') is-invalid @enderror"  value="{{ old('postcode') ? old('postcode') : Auth::guard('citizen')->user()->postcode }}"  placeholder="Postcode *">
                                                    @error('postcode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6">
                                                    <input id="city" name="city" type="text" class="@error('city') is-invalid @enderror"  value="{{ old('city') ? old('city') : Auth::guard('citizen')->user()->city }}"  placeholder="City *">
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6">
                                                    <select class="form-select form-select-xl @error('state') is-invalid @enderror" name="state" id="state">
                                                        <option value="">Select State *</option>
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

                                                <div class="col-lg-6">
                                                    <input type="text" id="country" name="country" class="@error('country') is-invalid @enderror" placeholder="Country *" value="{{ old('country') ? old('country') : Auth::guard('citizen')->user()->country }}" >
                                                    @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-12 pt-30">
                                                <div class="acc-det-btn-sec">
                                                    <button type="submit" class="tp-btn-theme height">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- My Account Section End -->
@endsection

@push('scripts')
<script>
    function previewProfileImage() {
        const fileInput = document.getElementById('profile_image');
        const previewImage = document.getElementById('profile-image-preview');
        const file = fileInput.files[0];

        // If a new image is selected, update the preview
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            // If no new file is selected, use the existing profile image
            const existingImage = "{{ asset('/damian_corporate/citizen/profile_image/' . Auth::guard('citizen')->user()->profile_image) }}";
            previewImage.src = existingImage;
        }
    }

    // Run this function on page load if there is an existing image
    document.addEventListener('DOMContentLoaded', function () {
        previewProfileImage();
    });
</script>
@endpush
