@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - My Order
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
                            <span>My Order</span>
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
                        <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="order-sec">
                                <div class="myaccount-content">
                                    <h3>My Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <!-- Page 1 -->
                                                <tr>
                                                    <td>1</td>
                                                    <td>EPIC Table - Danform</td>
                                                    <td>Aug 22, 2018</td>
                                                    <td>Pending</td>
                                                    <td>₹ 10,000</td>
                                                    <td>
                                                        <a class="tp-btn-theme height pro-btn-sec" href="#" title="View">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>ROOT Table - Danform</td>
                                                    <td>July 22, 2018</td>
                                                    <td>Approved</td>
                                                    <td>₹ 10,000</td>
                                                    <td>
                                                        <a class="tp-btn-theme height pro-btn-sec" href="#" title="View">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- Page 2 -->
                                                <tr>
                                                    <td>3</td>
                                                    <td>Facetto Table - Kristensen</td>
                                                    <td>June 12, 2017</td>
                                                    <td>On Hold</td>
                                                    <td>₹ 10,000</td>
                                                    <td>
                                                        <a class="tp-btn-theme height pro-btn-sec" href="#" title="View">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>BLISS Chair - Danform</td>
                                                    <td>May 08, 2017</td>
                                                    <td>Delivered</td>
                                                    <td>₹ 10,000</td>
                                                    <td>
                                                        <a class="tp-btn-theme height pro-btn-sec" href="#" title="View">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Comb Chair - Kristensen</td>
                                                    <td>Jan 03, 2017</td>
                                                    <td>Returned</td>
                                                    <td>₹ 10,000</td>
                                                    <td>
                                                        <a class="tp-btn-theme height pro-btn-sec" href="#" title="View">
                                                            <i class="fa fa-eye"></i>
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
