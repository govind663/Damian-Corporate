@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Product Details
@endsection

@push('styles')
<style>
    .tp-shop-details__tab-big-img img {
    width: 100%; /* Ensure the image takes up the full width of the container */
    height: auto; /* Maintain aspect ratio */
    object-fit: cover; /* Ensures the image covers the container without stretching */
    display: block;
}

.tp-shop-details__tab-big-img {
    display: flex; /* Centers the image inside the container */
    justify-content: center;
    align-items: center;
    overflow: hidden; /* Ensures no overflow for larger images */
    width: 100%; /* Match the container width */
    height: 400px; /* Set a consistent height */
    background-color: #f8f8f8; /* Optional: Placeholder background */
}

.nav img {
    width: 100%; /* Ensure the thumbnail takes full width of the button */
    height: auto; /* Maintain aspect ratio */
    object-fit: contain; /* Prevents cutting off parts of the thumbnail */
    max-height: 80px; /* Restrict thumbnail height */
    border: 1px solid #ddd; /* Optional: Add a border for better appearance */
    padding: 4px; /* Optional: Add padding */
    background-color: #fff; /* Optional: Background for the thumbnails */
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
                       <span><a href="{{ route('frontend.products') }}">Store</a></span>
                       <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                       <span>{{ $product->name }}</span>
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
                                @foreach ($productOtherImages as $index => $image)
                                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                         id="nav-{{ $index }}"
                                         role="tabpanel"
                                         aria-labelledby="nav-{{ $index }}-tab">
                                        <div class="tp-shop-details__tab-big-img">
                                            {{-- Add Image Path --}}
                                            <img src="{{ asset('damian_corporate/product/product_other_images/' . $image) }}" alt="Product Image {{ $index + 1 }}" title="Product Image {{ $index + 1 }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pd-store-tab-btn tp-shop-details__tab-btn-box">
                            <nav>
                                <div class="nav nav-tab pd-nav-tab-sec" id="nav-tab" role="tablist">
                                    @foreach ($productOtherImages as $index => $image)
                                        <button class="nav-links {{ $index === 0 ? 'active' : '' }}"
                                                id="nav-{{ $index }}-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nav-{{ $index }}"
                                                type="button"
                                                role="tab"
                                                aria-controls="nav-{{ $index }}"
                                                aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                            <img src="{{ asset('damian_corporate/product/product_other_images/' . $image) }}" alt="Product Image {{ $index + 1 }}" title="Product Image {{ $index + 1 }}">
                                        </button>
                                    @endforeach
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
                                    {{ $product->name }}
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
                                    <span class="product-price-detail-span-sec">₹ {{ $product->price }} /-</span>
                                        <del>₹ {{ $product->discount_price_after_percentage }} /-</del>
                                    <span class="red-color" style="border-radius: 2px;">-{{ $product->discount_price_in_percentage }}%</span>
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
                            <p class="product-det-add-sec-p" style="text-align: justify !important;">
                                {!! $product->description !!}
                            </p>
                        </div>
                        <div class="tp-shop-details__text-2 product-dimension-sec">
                            <h6 class="pro-dim-title-sec">Product Dimensions :</h6>
                            <ul class="pro-dimen-listing-sec">
                                <li>Height (cm) : {{ $product->height }}</li>
                                <li>Width (cm) : {{ $product->width }}</li>
                                <li>Depth (cm) : {{ $product->depth }}</li>
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
