@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Change Password
@endsection

@push('styles')
<style>
    .tp-btn-theme.height {
        height: 40px !important;
        line-height: 40px !important;
        /* padding: 0px 7px 0px 7px !important; */
        border-radius: 2px !important;
    }

    .form-horizontal {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
    }

    .invalid-feedback{
        color: rgb(255, 255, 255);
    }

    .account-details-sec .myaccount-content .account-details-form input {
        margin-bottom: 2px !important;
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
                            <span>Change Password</span>
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
                                        <form method="POST" action="{{ route('frontend.update-password') }}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf

                                            <div class="col-lg-12 mb-2">
                                                <h3>Change Password</h3>
                                            </div>

                                            <div class="row form-group p-3">

                                                <div class="col-lg-12 mb-3">
                                                    <input type="password"  id="current_password" name="current_password" class="@error('current_password') is-invalid @enderror" value="{{ old('current_password') }}" placeholder="Enter Current Password">
                                                    @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <input type="password"  id="password" name="password" class="@error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter New Password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <input type="password"  id="password_confirmation" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Enter Confirm Password">
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-12 pt-3">
                                                    <div class="acc-det-btn-sec">
                                                        <button type="submit" class="tp-btn-theme height">
                                                            Save Changes
                                                        </button>
                                                    </div>
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
@endpush
