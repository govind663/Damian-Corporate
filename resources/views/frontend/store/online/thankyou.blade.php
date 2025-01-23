@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Thank You
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
                            <span><a href="{{ route('frontend.home') }}" title="Home">Home</a></span>
                            <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                            {{-- <span><a href="{{ route('frontend.products') }}" title="Home">Store</a></span>
                            <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span> --}}
                            <span>Thank You</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Thank You area start-->
    <section class="thank-you-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="company-about-thumb thank-you-img-area text-center">
                        <img src="{{ asset('frontend/assets/img/icon/thank-you-img.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="thank-you-content-sec">
                        <h3 class="title">Thank You</h3>

                            <p class="text-center m-0 text-justify">
                                Thank you for placing your order with us! Your trust in our services means a lot to us.
                                If you have any questions or need further assistance, please don't hesitate to contact us.
                                We look forward to serving you again!
                            </p>

                            <div class="cta-btn text-center">
                                <a class="tp-btn-black" href="{{ route('frontend.orders') }}" title="Back to Home">
                                    <i class="fa-solid fa-shopping-basket"></i>
                                    <span>View Order</span>
                                </a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Thank You area end-->
@endsection

@push('scripts')
@endpush
