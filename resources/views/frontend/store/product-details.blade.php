@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Product Details
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
                       <span><a href="{{ route('frontend.home') }}">Home</a></span>
                       <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                       <span>Product Details</span>
                       <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                       <span>Product Name</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    <!-- breadcrumb area end -->

    <!--product-details-area-start -->
    <div class="tp-product-details-area product-detail-sec">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-shop-details__wrapper product-shop-detail-wrapper">
                        <div class="tp-shop-details__tab-content-box mb-20">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                                    <div class="tp-shop-details__tab-big-img">
                                        <img src="{{ asset('frontend/assets/img/pro-det-1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                                    <div class="tp-shop-details__tab-big-img">
                                        <img src="{{ asset('frontend/assets/img/pro-det-2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                                    <div class="tp-shop-details__tab-big-img">
                                        <img src="{{ asset('frontend/assets/img/pro-det-3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">
                                    <div class="tp-shop-details__tab-big-img">
                                        <img src="{{ asset('frontend/assets/img/pro-det-4.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pd-store-tab-btn tp-shop-details__tab-btn-box">
                            <nav>
                                <div class="nav nav-tab pd-nav-tab-sec" id="nav-tab" role="tablist">
                                    <button class="nav-links active" id="nav-one-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">
                                        <img src="{{ asset('frontend/assets/img/pro-det-1-sm.jpg') }}" alt="">
                                    </button>
                                    <button class="nav-links" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">
                                        <img src="{{ asset('frontend/assets/img/pro-det-2-sm.jpg') }}" alt="">
                                    </button>
                                    <button class="nav-links" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false">
                                        <img src="{{ asset('frontend/assets/img/pro-det-3-sm.jpg') }}" alt="">
                                    </button>
                                    <button class="nav-links" id="nav-four-tab" data-bs-toggle="tab" data-bs-target="#nav-four" type="button" role="tab" aria-controls="nav-four" aria-selected="false">
                                        <img src="{{ asset('frontend/assets/img/pro-det-4-sm.jpg') }}" alt="">
                                    </button>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-shop-details__right-warp product-details-right-warp-sec">
                        <h3 class="tp-shop-details__title-sm product-details-title-sec">
                            Epic Table - Danform
                        </h3>
                        <div class="tp-shop-details__price product-price-detail-sec">
                            <span class="product-price-detail-span-sec">₹ 1000</span>
                            <del>₹ 5000</del>
                            <span class="red-color">-34%</span>
                        </div>
                        <div class="tp-shop-details__text-2 product-text-detail-sec">
                            <h6 class="product-det-add-sec">Description :</h6>
                            <p class="text-justify">
                                The EPIC table is a grand statement piece with a luxurious
                                trumpet base of veneered wood. The tempered glass top creates
                                the illusion of lightness and allows for a view into the
                                architectual construction of the table. This glass table top
                                is 12 mm thick.
                            </p>
                        </div>
                        <div class="tp-shop-details__text-2 product-dimension-sec">
                            <h6 class="pro-dim-title-sec">Product Dimensions :</h6>
                            <ul class="pro-dimen-listing-sec">
                                <li>Height (cm) : 74.5</li>
                                <li>Width (cm) : 150</li>
                                <li>Depth (cm) : 150</li>
                            </ul>
                        </div>

                        <div class="tp-shop-details__quantity-wrap product-shop-detail-quantity-section">
                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="tp-shop-details__quantity-box">
                                        <div class="pd-store-quan-sec-one">
                                            <input type="text" value="1">
                                            <div class="tp-cart-minus"><i class="fal fa-minus"></i></div>
                                            <div class="tp-cart-plus"><i class="fal fa-plus"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="tp-shop-details__btn">
                                        <a class="tp-btn-theme height pro-btn-sec" href="{{ route('frontend.cart') }}" title="Add To Cart">
                                            Add To Cart
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="tp-shop-details__btn">
                                        <a class="tp-btn-theme height pro-btn-sec" href="{{ route('frontend.wishlist') }}" title="Add ToWishlist">
                                            Wishlist
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-area-end -->

@endsection

@push('scripts')

@endpush
