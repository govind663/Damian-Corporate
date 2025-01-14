@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Product Details
@endsection

@push('styles')
<style>
    /* Container for image zoom effect */
    .swiper-slide img {
        transition: transform 0.3s ease-in-out; /* Smooth transition effect */
        animation: none; /* Reset animation by default */
    }

    /* Apply zoom effect on hover */
    .swiper-slide:hover img {
        transform: scale(1.1); /* Zoom in by 10% */
        animation: zoomIn 0.3s ease-in-out; /* Apply animation */
    }

    /* Keyframes for zoom-in animation */
    @keyframes zoomIn {
        0% {
            transform: scale(1); /* Initial scale */
        }
        100% {
            transform: scale(1.1); /* Final scale */
        }
    }

    /* Ensure the thumbnails have a proper layout */
    .thumbnail-slider .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        overflow: hidden;
        /* border: 1px solid #ddd; */
        /* border-radius: 5px; */
        transition: transform 0.3s ease;
    }

    /* Add hover effect for thumbnails */
    .thumbnail-slider .swiper-slide:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Ensure proper spacing between thumbnails */
    .thumbnail-slider {
        margin-top: 20px;
    }

    /* Style for navigation arrows */
    .swiper-button-next, .swiper-button-prev {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 30px; /* Small arrow button size */
        height: 30px;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        border-radius: 50%; /* Make the button round */
        color: #fff; /* White arrow color */
        font-size: 18px; /* Adjust arrow size */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Optional: Adjust arrow visibility when not hovered */
    .swiper-button-next, .swiper-button-prev {
        opacity: 0.6;
    }

    .swiper-button-next:hover, .swiper-button-prev:hover {
        opacity: 1; /* Full opacity on hover */
    }

    /* Position the arrows centrally */
    .swiper-button-next {
        right: 10px; /* Right arrow */
    }

    .swiper-button-prev {
        left: 10px; /* Left arrow */
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
                {{-- product-details-image-area start --}}
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-shop-details__wrapper product-shop-detail-wrapper">
                        <!-- Main Slider -->
                        <div class="swiper-container main-slider pro-details-slider-sec">
                            <div class="swiper-wrapper">
                                @foreach ($productOtherImages as $index => $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('/damian_corporate/product/product_other_images/' . $image) }}" alt="Product Image {{ $index + 1 }}" title="Product Image {{ $index + 1 }}" style="width: 600px; height: 425px">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Navigation Arrows -->
                            <div class="swiper-button-next pro-details-btn-sec"></div>
                            <div class="swiper-button-prev pro-details-btn-sec"></div>

                            <!-- Pagination Dots -->
                            <div class="swiper-pagination pro-details-pagination-sec"></div>
                        </div>

                        <!-- Thumbnail Slider -->
                        <div class="swiper-container thumbnail-slider pro-details-thumbnail-nav-sec">
                            <div class="swiper-wrapper">
                                @foreach($productOtherImages as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('/damian_corporate/product/product_other_images/' . $image) }}" alt="Product Image {{ $index + 1 }}" title="Product Image {{ $index + 1 }}" style="width: 90px; height: 90px">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Add navigation buttons -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>

                {{-- Product Details --}}
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
                                        <a href="javascript:void(0)" class="add_to_wishlist" title="Wishlist" data-product-id="{{ $product->id }}">
                                            <img src="{{ asset('frontend/assets/img/icon/wishlist.png') }}" class="img-responsive" alt="Add To wishlist" title="Add To wishlist">
                                        </a>
                                    </div>
                                    <div class="pro-del-atc-sec">
                                        <a href="javascript:void(0)" class="add_to_cart" title="Add To Cart" data-product-id="{{ $product->id }}">
                                            <img src="{{ asset('frontend/assets/img/icon/add-to-cart.png') }}" class="img-responsive" alt="Add To Cart" title="Add To Cart">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <div>

                        <div class="tp-shop-details__price product-price-detail-sec pt-10">
                            <div class="row d-flex">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <span class="product-price-detail-span-sec">
                                        ₹ {{ number_format($product->discount_price_after_percentage, 0) }} /-
                                    </span>
                                        <del>₹ {{ $product->price }} /-</del>
                                    <span class="red-color" style="border-radius: 2px;">-{{ $product->discount_price_in_percentage }}%</span>
                                </div>

                                {{-- Quantity --}}
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="quantity-sec-new p-relative">
                                        <input type="number" class="quantity-input-number" value="1" min="1" data-product-id="{{ $product->id }}" />
                                        <div class="qty_button cart-minus tp-cart-minus" data-action="decrement" data-product-id="{{ $product->id }}">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </div>
                                        <div class="qty_button cart-plus tp-cart-plus" data-action="increment" data-product-id="{{ $product->id }}">
                                            <i class="fa-solid fa-caret-up"></i>
                                        </div>
                                    </div>
                                    {{-- <div class="total-price" id="total-price-{{ $product->id }}">
                                        ₹{{ $product->price }}
                                    </div> --}}
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
{{-- Add to Cart and Wishlist --}}
<script>
    $(document).ready(function () {
        // Get citizenId from the Blade template
        let citizenId = '{{ Auth::guard('citizen')->id() }}';  // Use the citizen id from Laravel session

        // Add to Cart
        $('.add_to_cart').on('click', function (e) {
            e.preventDefault(); // Prevent the default behavior (i.e., redirection)

            let productId = $(this).data('product-id'); // Get the product ID from the data attribute

            $.ajax({
                url: '{{ route('frontend.addToCart') }}', // Your cart add route
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    citizen_id: citizenId, // Pass citizen_id
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message); // Show success toaster message
                        // toastr.info(response.message); // Show info toaster message
                        // toastr.warning(response.message); // Show info toaster message
                        location.reload(); // Reload the page to reflect the changes
                    } else {
                        toastr.error(response.message); // Show error toaster message
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                }
            });
        });

        // Add to Wishlist
        $('.add_to_wishlist').on('click', function (e) {
            e.preventDefault(); // Prevent the default behavior (i.e., redirection)

            let productId = $(this).data('product-id'); // Get the product ID from the data attribute

            $.ajax({
                url: '{{ route('frontend.addToWishlist') }}', // Your wishlist add route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    citizen_id: citizenId, // Pass citizen_id
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message); // Show success toaster message
                        // toastr.info(response.message); // Show info toaster message
                        // toastr.warning(response.message); // Show info toaster message
                        location.reload(); // Reload the page to reflect the changes
                    } else {
                        toastr.error(response.message); // Show error toaster message
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                }
            });
        });
    });
</script>

{{-- Quantity Increment and Decrement --}}
<script>
    $(document).ready(function () {
        // Handle quantity increment and decrement
        $('.qty_button').on('click', function () {
            let action = $(this).data('action'); // Either 'increment' or 'decrement'
            let productId = $(this).data('product-id');
            let quantityInput = $(`.quantity-input-number[data-product-id="${productId}"]`);
            let currentQuantity = parseInt(quantityInput.val());

            // Update quantity value
            if (action === 'increment') {
                quantityInput.val(currentQuantity + 1);
            } else if (action === 'decrement' && currentQuantity > 1) {
                quantityInput.val(currentQuantity - 1);
            }

            // Trigger AJAX request to update the cart
            updateCartQuantity(productId, quantityInput.val());
        });

        // Update cart quantity via AJAX
        function updateCartQuantity(productId, newQuantity) {
            $.ajax({
                url: '{{ route('frontend.updateCartQuantity') }}', // Replace with your route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: newQuantity,
                },
                success: function (response) {
                    if (response.success) {
                        // Update the total price dynamically
                        // $(`#total-price-${productId}`).text(`₹${response.new_total_price}`);
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                }
            });
        }
    });
</script>

<script>
    // Initialize the Thumbnail Slider
    var thumbnailSwiper = new Swiper('.thumbnail-slider', {
       slidesPerView: 6, // Number of thumbnails visible
       spaceBetween: 10, // Spacing between thumbnails
       freeMode: true, // Allows free movement of thumbnails
       watchSlidesVisibility: true,
       watchSlidesProgress: true,
    });

    // Initialize the Main Slider
    var mainSwiper = new Swiper('.main-slider', {
       loop: true,
       navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
       },
       pagination: {
          el: '.swiper-pagination',
          clickable: true, // Makes dots clickable
       },
       thumbs: {
          swiper: thumbnailSwiper, // Link to the Thumbnail Slider
       },
    });
</script>

<script>
    $(function () {
       var mySwiper = new Swiper('.manufacturing-facility-area-active', {
          spaceBetween: 30,
          loop: true,
          navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
          },
          breakpoints: {
             576: {
                slidesPerView: 1
             },
             768: {
                slidesPerView: 2
             },
             992: {
                slidesPerView: 3
             },
             1200: {
                slidesPerView: 3
             }
          }
       });
    });
</script>

<script>
    $(function () {
       var mySwiper = new Swiper('.directors-area-active', {
          spaceBetween: 30,
          slidesPerView: 3,
          loop: true,
          navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
          },
       });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const thumbnailSlider = new Swiper('.thumbnail-slider', {
            loop: true, // Enable looping
            spaceBetween: 10, // Space between thumbnails
            slidesPerView: 4, // Number of thumbnails visible at a time
            autoplay: {
                delay: 2000, // Slide every 2 seconds
                disableOnInteraction: false, // Continue autoplay after user interaction
            },
            breakpoints: {
                640: { slidesPerView: 3 },
                768: { slidesPerView: 4 },
                1024: { slidesPerView: 5 },
            },
            // Enable navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
@endpush
