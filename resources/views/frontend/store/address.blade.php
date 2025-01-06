@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Orders
@endsection

@push('styles')
<style>
    .tp-btn-theme.height {
        height: 40px !important;
        line-height: 40px !important;
        padding: 0px 7px 0px 7px !important;
        border-radius: 2px !important;
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
                            <span>Orders</span>
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
                        <div class="tab-pane fade show active" id="address-edit" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="myaccount-content">
                                        <div class="billing-address">
                                            <h3>Billing Address</h3>
                                            <address>
                                                <p>
                                                    <strong>Lorem Ipsum</strong>
                                                </p>
                                                <p>
                                                    1234 Elm Street, Apt 56
                                                    Springfield, IL 62704
                                                    United States
                                                </p>
                                                <p>
                                                    Mobile : (555) 123-4567
                                                </p>
                                            </address>

                                            <div class="address-button-sec">
                                                <button class="tp-btn-border height">
                                                    <span>Edit</span>
                                                </button>
                                                <button class="tp-btn-border height">
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="myaccount-content">
                                        <div class="shipping-address">
                                            <h3>Shipping Address</h3>
                                            <address>
                                                <p>
                                                    <strong>Lorem Ipsum</strong>
                                                </p>
                                                <p>
                                                    1234 Elm Street, Apt 56
                                                    Springfield, IL 62704
                                                    United States
                                                </p>
                                                <p>
                                                    Mobile : (555) 123-4567
                                                </p>
                                            </address>

                                            <div class="address-button-sec">
                                                <button class="tp-btn-border height">
                                                    <span>Edit</span>
                                                </button>
                                                <button class="tp-btn-border height">
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
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
