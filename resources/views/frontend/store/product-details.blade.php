@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Product Details
@endsection

@push('styles')
<style>
    .bre-sec {
        height: 60px !important;
    }
    .bre-sec .breadcrumb-content {
        padding: 15px 0px 0px !important;
    }

    del {
        font-size: 16px !important;
        margin-left: 12px !important;
        vertical-align: middle !important;
        color: #878787 !important;
        font-family: Averta-Regular !important;
        font-weight: 800 !important;
    }

    .pro-del-atw-sec {
        text-align: center;
    }
    .pro-del-atw-sec {
        display: flex;
        justify-content: space-evenly;
    }

    .pro-del-wi-sec {
        height: 40px;
        width: 40px;
        background-color: #A6A182;
        border-radius: 100%;
        cursor: pointer;
    }

    .pro-del-wi-sec img {
        width: 30px;
        margin: 0 auto;
        position: relative;
        top: 5px;
    }

    .pro-del-atc-sec {
        height: 40px;
        width: 40px;
        background-color: #A6A182;
        border-radius: 100%;
        cursor: pointer;
    }

    .pro-del-atc-sec img {
        width: 25px;
        margin: 0 auto;
        position: relative;
        top: 5px;
    }

    .quantity-sec-new {
        width: 100px;
        margin: 0 auto;
        padding-bottom: 10px;
    }

    .quantity-sec-new input {
        color: #fff !important;
        /* padding-left: 45px !important; */
        height: 30px !important;
        border: 1px solid #A6A182;
        padding-left: 15px;
        border-radius: 0px !important;
        font-family: Averta-Regular;
        font-size: 14px;
    }

    .quantity-sec-new .cart-minus {
        height: 30px;
        width: 30px;
        /* text-align: center; */
        line-height: 35px;
        /* position: absolute; */
        top: 0;
        /* left: 80px; */
        border-radius: 50% !important;
        cursor: pointer;
        color: #fff;
        background: #a6a182;
    }


    .quantity-sec-new .cart-plus {
        height: 30px;
        width: 30px;
        /* text-align: center; */
        line-height: 30px;
        /* position: absolute; */
        top: 0;
        right: 0;
        color: #fff;
        cursor: pointer;
        border-radius: 50% !important;
        background: #a6a182;
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
                        <div class="row d-flex">
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <h3 class="tp-shop-details__title-sm product-details-title-sec">
                                    Epic Table - Danform
                                </h3>
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="pro-del-atw-sec">
                                    <div class="pro-del-wi-sec">
                                        <a href="{{ route('frontend.wishlist') }}" class="add_to_wishlist" title="Wishlist">
                                            <img src="{{ asset('frontend/assets/img/icon/wishlist.png') }}" class="img-responsive" alt="Add To wishlist" title="Add To wishlist">
                                        </a>
                                    </div>
                                    <div class="pro-del-atc-sec">
                                        <a href="{{ route('frontend.cart') }}" class="add_to_cart" title="Add To Cart">
                                            <img src="{{ asset('frontend/assets/img/icon/add-to-cart.png') }}" class="img-responsive" alt="Add To Cart" title="Add To Cart">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <div>

                        <div class="tp-shop-details__price product-price-detail-sec pt-10">
                            <div class="row d-flex">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <span class="product-price-detail-span-sec">₹ 10,000/-</span>
                                        <del>₹ 5,000 /-</del>
                                    <span class="red-color">-34%</span>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="quantity-sec-new p-relative">
                                        <input type="number" class="quantity-input-number" value="1" min="1">
                                        <div class="qty_button cart-minus tp-cart-minus">
                                            <i class="fa-solid fa-caret-up"></i>
                                        </div>
                                        <div class="qty_button cart-plus tp-cart-plus">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details-area-end -->

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.tp-cart-minus').on('click', function () {
            let input = $(this).closest('.quantity-sec-new').find('.quantity-input'); // Find the related input
            let value = parseInt(input.val()) || 0;
            value = Math.max(1, value - 1); // Ensure minimum value is 1
            input.val(value);
        });

        $('.tp-cart-plus').on('click', function () {
            let input = $(this).closest('.quantity-sec-new').find('.quantity-input'); // Find the related input
            let value = parseInt(input.val()) || 0;
            input.val(value + 1);
        });
    });
</script>
@endpush
