@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Cart
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
                            <span><a href="{{ route('frontend.products') }}" title="Home">Store</a></span>
                            <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                            <span>Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Cart area start-->
    <section class="add-to-cart form-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="card-order">
                        @foreach ($cartItems as $value)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="img-wrapper">
                                        <a href="{{ route('frontend.product.details', $value->product?->slug) }}" title="wishlist-product-3" class="img-link">
                                            @if (!empty($value->product?->image))
                                                <img src="{{ asset('/damian_corporate/product/project_image/' . $value->product?->image) }}" alt="{{ $value->product?->image }}" title="{{ $value->product?->image }}" class="img-responsive">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="product-price">
                                        <p>₹ {{ number_format($value->product?->discount_price_after_percentage, 0) }} /- </p>
                                    </div>
                                    <div class="product-heading">
                                        <h3>
                                            <a href="{{ route('frontend.product.details', $value->product?->slug) }}" title="{{ $value->product?->name }}">
                                                {{ $value->product?->name }}
                                            </a>
                                        </h3>
                                        <a href="javascript:void(0)" title="Remove this item" class="remove" data-product-id="{{ $value->id }}">
                                            <p>
                                                <i class="fa fa-trash"></i>
                                                Remove Item
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quantity-sec-new p-relative">
                                        <input type="number" class="quantity-input-number" value="{{ $value->quantity }}" min="1" data-product-id="{{ $value->product_id }}" />
                                        <div class="qty_button cart-minus tp-cart-minus" data-action="decrement" data-product-id="{{ $value->product_id }}">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </div>
                                        <div class="qty_button cart-plus tp-cart-plus" data-action="increment" data-product-id="{{ $value->product_id }}">
                                            <i class="fa-solid fa-caret-up"></i>
                                        </div>
                                    </div>
                                    {{-- <div class="total-price" id="total-price-{{ $value->id }}">
                                        ₹{{ $value->price }}
                                    </div> --}}
                                </div>
                            </div>
                            <hr class="hr-line">
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="cart-item-div">
                        <h2>Cart Totals </h2>
                        <div class="cart-total-sec">
                            <ul class="cart-listing-sec">
                                <li>Total
                                    <span class="total-price" id="total-price-{{ $value->id ?? '' }}">
                                        ₹ <span id="price-content-{{ $value->id ?? '' }}">{{ number_format($value->product_total_price ?? 0) }}</span> /-
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="payment-way mT20 mB20">
                                <h2> We Accept </h2>
                                <ul>
                                    <li>
                                        <img src="{{ asset('frontend/assets/img/icon/visa.png') }}" class="img-responsive" alt="visa" title="visa">
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/assets/img/icon/mastercard.jpg') }}" class="img-responsive" alt="mastercard" title="mastercard">
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/assets/img/icon/american-express.png') }}" class="img-responsive" alt="american express" title="american express">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sign-up-btn-wrap">
                            <div class="btn-sec">
                                <a href="{{ route('frontend.checkout') }}" title="checkout">
                                    <button class="tp-btn-theme" name="update_cart" type="submit">
                                        <span>Proceed to Checkout</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart area end-->
@endsection

@push('scripts')
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
            } else if (action === 'decrement' && currentQuantity <= 1) {
                toastr.error('Invalid quantity. Quantity cannot be less than 1.');
                return; // Stop further execution
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
                        // Update the product's total price
                        $(`#price-content-${productId}`).text(response.new_total_price.toLocaleString('en-IN'));

                        // Optionally update a cart-wide total if needed
                        updateCartTotal();
                        toastr.success(response.message);
                    } else if (response.logged_in === false) {
                        // User not logged in
                        toastr.error('Please log in to add products to your cart.');
                        window.location.href = '{{ route('frontend.citizen.login') }}'; // Redirect to login page
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                }
            });
        }

        // Update cart-wide total dynamically
        function updateCartTotal() {
            let total = 0;
            $('.price-content').each(function () {
                total += parseFloat($(this).text().replace(/,/g, '')); // Remove commas and parse to float
            });

            $('#cart-total').text(`₹${total.toLocaleString('en-IN')}`);
        }
    });
</script>

{{-- Remove Item --}}
<script>
    $(document).ready(function () {
        $('.remove').on('click', function (e) {
            e.preventDefault(); // Prevent the default link action

            let productId = $(this).data('product-id'); // Get the product ID
            let row = $(this).closest('.cart-item-row'); // Get the row to remove after success (if applicable)

            // Confirm deletion
            if (!confirm('Are you sure you want to remove this item from the cart?')) {
                return;
            }

            // AJAX request to remove the item
            $.ajax({
                url: '{{ route('frontend.removeCartItem') }}', // Replace with your route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    product_id: productId,
                },
                success: function (response) {
                    if (response.success) {
                        // Remove the cart item row dynamically
                        row.remove();

                        // Update total cart price or count dynamically (if needed)
                        $('#cart-total').text(`₹${response.new_total_price}`);
                        toastr.success(response.message);
                        location.reload(); // Reload the page to reflect the changes
                    } else if (response.logged_in === false) {
                        // User not logged in
                        toastr.error('Please log in to remove items from your cart.');
                        window.location.href = '{{ route('frontend.citizen.login') }}'; // Redirect to login page
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                }
            });
        });
    });
</script>

{{-- Detect Page Reload --}}
<script>
    // Function to detect page reload
    window.addEventListener('load', function () {
        if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
            // Update the price for reloads
            const priceElement = document.getElementById('price-content-{{ $value->id ?? '' }}');
            if (priceElement) {
                priceElement.textContent = "{{ number_format($value->product_total_price ?? 0) }}";
            }
        }
    });
</script>
@endpush
