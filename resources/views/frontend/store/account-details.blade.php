@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Account Details
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
                                        <form action="#" class="form-horizontal p-3">
                                            <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                    <h3>Account Details</h3>
                                                </div>

                                                <div class="col-lg-6">
                                                    <input id="first-name" placeholder="First Name" type="text">
                                                </div>

                                                <div class="col-lg-6">
                                                    <input id="last-name" placeholder="Last Name" type="text">
                                                </div>

                                                <div class="col-12">
                                                    <input id="display-name" placeholder="Display Name" type="text">
                                                </div>

                                                <div class="col-12">
                                                    <input id="email" placeholder="Email Address" type="email">
                                                </div>

                                                <div class="col-lg-12">
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
