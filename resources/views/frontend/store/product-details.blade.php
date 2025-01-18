@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Product Details
@endsection

@push('styles')
<style>
    /*.bre-sec {*/
    /*    height: 200px;*/
    /*}*/

    /*.bre-sec .breadcrumb-content {*/
    /*    padding: 155px 0 0;*/
    /*}*/

    @media (max-width: 480px) {
        .bre-sec {
            height: 135px !important;
        }

        .bre-sec .breadcrumb-content {
            padding: 100px 0 0 !important;
        }
    }

    @media only screen and (min-width: 481px) and (max-width: 767px) {
        .bre-sec {
            height: 180px !important;
        }

        .bre-sec .breadcrumb-content {
            padding: 140px 0 0 !important;
        }
    }

    @media only screen and (min-width: 768px) and (max-width:991px) {
        .bre-sec {
            height: 120px;
        }

        .bre-sec .breadcrumb-content {
            padding: 80px 0 0;
        }
    }

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
                                        <div class="magic-zoom">
                                            <img src="{{ asset('/damian_corporate/product/product_other_images/' . $image) }}" alt="Product Image {{ $index + 1 }}" title="Product Image {{ $index + 1 }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Navigation Arrows -->
                            <!--<div class="swiper-button-next pro-details-btn-sec"></div>-->
                            <!--<div class="swiper-button-prev pro-details-btn-sec"></div>-->

                            <!-- Pagination Dots -->
                            <div class="swiper-pagination pro-details-pagination-sec"></div>
                        </div>

                        <!-- Thumbnail Slider -->
                        <div class="swiper-container thumbnail-slider pro-details-thumbnail-nav-sec">
                            <div class="swiper-wrapper">
                                @foreach($productOtherImages as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('/damian_corporate/product/product_other_images/' . $image) }}">
                                    </div>
                                @endforeach
                            </div>

                            <div class="thumbnail-button-next"></div>
                            <div class="thumbnail-button-prev"></div>
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
                                            <img src="{{ asset('frontend/assets/img/icon/wishlist.png') }}" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="pro-del-atc-sec">
                                        <a href="javascript:void(0)" class="add_to_cart" title="Add To Cart" data-product-id="{{ $product->id }}">
                                            <img src="{{ asset('frontend/assets/img/icon/add-to-cart.png') }}" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <div>

                        <div class="tp-shop-details__price product-price-detail-sec pt-10">
                            <div class="row d-flex">
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="prod-pri-det-span-sec">
                                        <span class="product-price-detail-span-sec">
                                        ₹ {{ number_format($product->discount_price_after_percentage, 0) }} /-
                                    </span>
                                        <del>₹ {{ $product->price }} /-</del>
                                    <span class="red-color" style="border-radius: 2px;">-{{ $product->discount_price_in_percentage }}%</span>
                                    </div>
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
                                @if (!empty($product->length))
                                    <li>Length (cm) : {{ $product->length }}</li>
                                @else
                                    <li>Length  : N/A</li>
                                @endif

                                @if (!empty($product->height))
                                    <li>Height (cm) : {{ $product->height }}</li>
                                @else
                                    <li>Height (cm) : N/A</li>
                                @endif

                                @if (!empty($product->width))
                                    <li>Width (cm) : {{ $product->width }}</li>
                                @else
                                    <li>Width (cm) : N/A</li>
                                @endif

                                @if (!empty($product->depth))
                                    <li>Depth (cm) : {{ $product->depth }}</li>
                                @else
                                    <li>Depth (cm) : N/A</li>
                                @endif
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
        // Set up CSRF token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Check if the user is logged in
        let citizenId = @json(Auth::guard('citizen')->check() ? Auth::guard('citizen')->id() : null);

        // Function to handle login check
        function handleLoginCheck(action) {
            if (!citizenId) {
                // Show toaster message with time duration
                let message = 'Please log in to ' + action + ' this product.';
                toastr.error(message, 'Login Required', {
                    timeOut: 5000 // 5 seconds duration
                });

                // Redirect to login page after 5 seconds
                setTimeout(function () {
                    window.location.href = '{{ route("frontend.citizen.login") }}'; // Redirect to login page
                }, 5000); // Wait for 5 seconds before redirecting

                return false;
            }
            return true;
        }

        // Add to Cart
        $('.add_to_cart').on('click', function (e) {
            e.preventDefault(); // Prevent the default behavior

            let productId = $(this).data('product-id'); // Get the product ID

            // Check login status
            if (!handleLoginCheck('add to cart')) return;

            $.ajax({
                url: '{{ route("frontend.addToCart") }}', // Your cart add route
                method: 'POST', // Use POST for modifying data
                data: {
                    product_id: productId,
                    citizen_id: citizenId // Pass citizen_id
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message); // Success message
                        location.reload(); // Reload page to reflect changes
                    } else {
                        toastr.error(response.message); // Error message
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                }
            });
        });

        // Add to Wishlist
        $('.add_to_wishlist').on('click', function (e) {
            e.preventDefault(); // Prevent the default behavior

            let productId = $(this).data('product-id'); // Get the product ID

            // Check login status
            if (!handleLoginCheck('add to wishlist')) return;

            $.ajax({
                url: '{{ route("frontend.addToWishlist") }}', // Your wishlist add route
                method: 'POST', // Use POST for modifying data
                data: {
                    product_id: productId,
                    citizen_id: citizenId // Pass citizen_id
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message); // Success message
                        location.reload(); // Reload page to reflect changes
                    } else {
                        toastr.error(response.message); // Error message
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
        // Set up CSRF token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Check if the user is logged in
        let citizenId = @json(Auth::guard('citizen')->check() ? Auth::guard('citizen')->id() : null);

        // Function to handle login check
        function handleLoginCheck(action) {
            if (!citizenId) {
                // Show toaster message with time duration
                let message = 'Please log in to ' + action + ' this product.';
                toastr.error(message, 'Login Required', {
                    timeOut: 5000 // 5 seconds duration
                });

                // Redirect to login page after 5 seconds
                setTimeout(function () {
                    window.location.href = '{{ route("frontend.citizen.login") }}'; // Redirect to login page
                }, 5000); // Wait for 5 seconds before redirecting

                return false;
            }
            return true;
        }

        // Handle quantity increment and decrement
        $('.qty_button').on('click', function () {
            let action = $(this).data('action'); // Either 'increment' or 'decrement'
            let productId = $(this).data('product-id');
            let quantityInput = $(`.quantity-input-number[data-product-id="${productId}"]`);
            let currentQuantity = parseInt(quantityInput.val());

            // Check if the user is logged in
            if (!handleLoginCheck('update the quantity')) return;

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
                url: '{{ route("frontend.updateCartQuantity") }}', // Replace with your route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: newQuantity,
                },
                success: function (response) {
                    if (response.success) {
                        // Optionally, update the total price dynamically
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

{{-- Initialize Swiper --}}
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

{{-- JavaScript to create the internal zoom functionality --}}
<script>
    // JavaScript to create the internal zoom functionality
    document.addEventListener('DOMContentLoaded', function() {
        const zoomElements = document.querySelectorAll('.magic-zoom');

        zoomElements.forEach(zoomElement => {
            const img = zoomElement.querySelector('img');
            const lens = document.createElement('div');
            lens.classList.add('zoom-lens');
            zoomElement.appendChild(lens);

            const lensWidth = 150; // Width of the lens (adjustable)
            const lensHeight = 150; // Height of the lens (adjustable)

            lens.style.width = `${lensWidth}px`;
            lens.style.height = `${lensHeight}px`;

            zoomElement.addEventListener('mousemove', function(e) {
                const bounds = zoomElement.getBoundingClientRect();
                const posX = e.clientX - bounds.left;
                const posY = e.clientY - bounds.top;

                // Calculate the position of the lens
                const lensX = posX - lensWidth / 2;
                const lensY = posY - lensHeight / 2;

                // Prevent the lens from going outside the image
                if (lensX < 0) lens.style.left = '0';
                else if (lensX + lensWidth > bounds.width) lens.style.left = `${bounds.width - lensWidth}px`;
                else lens.style.left = `${lensX}px`;

                if (lensY < 0) lens.style.top = '0';
                else if (lensY + lensHeight > bounds.height) lens.style.top = `${bounds.height - lensHeight}px`;
                else lens.style.top = `${lensY}px`;

                // Apply the zoom effect to the image
                const zoomFactor = 2; // Adjust zoom factor (1.0 is no zoom, 2.0 is double zoom)
                const imgX = (posX / bounds.width) * 100;
                const imgY = (posY / bounds.height) * 100;
                img.style.transformOrigin = `${imgX}% ${imgY}%`;
                img.style.transform = `scale(${zoomFactor})`;
            });

            zoomElement.addEventListener('mouseleave', function() {
                lens.style.display = 'none';
                img.style.transform = 'scale(1)';
            });

            zoomElement.addEventListener('mouseenter', function() {
                lens.style.display = 'block';
            });
        });
    });

</script>

{{-- create the internal zoom functionality --}}
<script>
    var thumbnailSwiper = new Swiper('.thumbnail-slider', {
        slidesPerView: 6
        , spaceBetween: 10
        , freeMode: true
        , watchSlidesVisibility: true
        , watchSlidesProgress: true
        , navigation: {
            nextEl: '.thumbnail-button-next'
            , prevEl: '.thumbnail-button-prev'
        , }
    , });

    var mainSwiper = new Swiper('.main-slider', {
        loop: true
        , navigation: {
            nextEl: '.swiper-button-next'
            , prevEl: '.swiper-button-prev'
        , }
        , pagination: {
            el: '.swiper-pagination'
            , clickable: true
        , }
        , thumbs: {
            swiper: thumbnailSwiper, // Link the main slider to the thumbnail swiper
        }
    , });

</script>

@endpush
