@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store
@endsection

@push('styles')
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-section breadcrumb__pt services-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumbs/services-breadcrumb.jpg') }}) !important;">
        <div class="breadcrumb__area breadcrumb__height p-relative fix">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__section-title-box mb-20">
                                <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Store</h3>
                            </div>
                            <div class="breadcrumb__list">
                                <span><a href="index.html">Home</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>Store</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->
@endsection

@push('scripts')
@endpush
