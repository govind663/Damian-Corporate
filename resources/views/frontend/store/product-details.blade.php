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
@endpush
