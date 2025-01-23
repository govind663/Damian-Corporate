@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store
@endsection

@push('styles')
<style>
    /*.bre-sec {*/
    /*    height: 200px;*/
    /*}*/

    /*.bre-sec .breadcrumb-content {*/
    /*    padding: 155px 0 0;*/
    /*}*/

    /*@media (max-width: 480px) {*/
    /*    .bre-sec {*/
    /*        height: 135px !important;*/
    /*    }*/

    /*    .bre-sec .breadcrumb-content {*/
    /*        padding: 100px 0 0 !important;*/
    /*    }*/
    /*}*/

    /*@media only screen and (min-width: 481px) and (max-width: 767px) {*/
    /*    .bre-sec {*/
    /*        height: 180px !important;*/
    /*    }*/

    /*    .bre-sec .breadcrumb-content {*/
    /*        padding: 140px 0 0 !important;*/
    /*    }*/
    /*}*/

    /*@media only screen and (min-width: 768px) and (max-width:991px) {*/
    /*    .bre-sec {*/
    /*        height: 120px;*/
    /*    }*/

    /*    .bre-sec .breadcrumb-content {*/
    /*        padding: 80px 0 0;*/
    /*    }*/
    /*}*/
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
                       <span>Store</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    <!-- breadcrumb area end -->

    <!-- store area start -->
    <div class="store-one-sec">
        <div class="container-fluid home-container">
            <div class="row">
                {{-- side-bar start --}}
                <div class="col-xl-3 col-lg-3 collection-filter">
                    <!-- side-bar collapse block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-collapse-block open">
                            <div class="accordion collection-accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button pt-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            Categories
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="collection-listing">
                                                @foreach($productCategories as $key => $value)
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="categories[]" type="checkbox" value="{{ $value->id }}" id="checkbox1">
                                                        <label class="form-check-label" for="category_{{ $value->id }}">
                                                            {{ $value->name }}
                                                        </label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            Sub Category
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="collection-listing">
                                                @foreach($productSubCategories as $key => $value)
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sub_categories[]" type="checkbox" value="{{ $value->id }}" id="checkbox2">
                                                        <label class="form-check-label" for="sub_category_{{ $value->id }}">
                                                            {{ $value->name }}
                                                        </label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            Colours
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="collection-listing">
                                                @foreach($colors as $key => $value)
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="colors[]" type="checkbox" value="{{ $value->id }}" id="checkbox3">
                                                        <label class="form-check-label" for="color_{{ $value->id }}">
                                                            {{ $value->name }}
                                                        </label>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                                            Price
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div class="price-input-container">
                                                <label for="min_price">Min Price</label>
                                                <input type="number" id="min_price" placeholder="₹" name="min_price">
                                                <label for="max_price">Max Price</label>
                                                <input type="number" id="max_price" placeholder="₹" name="max_price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- brand filter end -->
                    </div>
                    <!-- side-bar collapse block end here -->
                </div>
                <!-- side-bar collapse block end here -->

                {{-- Start Store Product Section --}}
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <div class="row" id="product-grid">
                        @foreach($products as $key => $value)
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{ route('frontend.product.details', $value->slug) }}" class="image">
                                        @if (!empty($value->image))
                                            <img class="pic-1" src="{{ asset('/damian_corporate/product/project_image/' . $value->image) }}">
                                            <img class="pic-2" src="{{ asset('/damian_corporate/product/project_image/' . $value->image) }}">
                                        @endif
                                    </a>
                                    <span class="product-new-label">
                                        {{ $value->product_type == '1' ? 'New' : ($value->product_type == '2' ? 'Sale' : ($value->product_type == '3' ? 'Best Seller' : 'Featured')) }}
                                    </span>
                                </div>
                                <div class="product-content">
                                    <h3 class="store-pro-title">
                                        <a href="{{ route('frontend.product.details', $value->slug) }}">
                                            {{ $value->name }}
                                        </a>
                                    </h3>
                                    <div class="price">
                                        <span>₹ {{ $value->price }}</span> ₹ {{ number_format($value->discount_price_after_percentage, 0) }} /-
                                    </div>
                                    <ul class="product-buttons">
                                        <li>
                                            <a href="javascript:void(0)" class="add-to-cart addToCart" data-product-id="{{ $value->id }}">
                                                <i class="fas fa-shopping-bag"></i>
                                                Cart
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="quick-view addToWishlist" data-product-id="{{ $value->id }}">
                                                <i class="far fa-heart"></i>
                                                Wishlist
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- End Store Product Section--}}

            </div>
        </div>
    </div>
    <!-- End Store Section -->

    {{-- Start Store Faq Section --}}
    {{-- <div class="store-faq-sec black-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="store-faq-title-box">
                        <h3 class="store-faq-title-sec" id="store-faq-title">FAQ</h3>
                    </div>
                    <div class="tp-service-details-faq tp-faq-inner__customize">
                        <div class="product-det-custom-accordion">
                            <div class="accordion" id="accordionExample">
                                @foreach ($productfaqs as $key => $value)
                                    <div class="accordion-items {{ $key === 0 ? 'tp-faq-active' : '' }}">
                                        <h2 class="accordion-header" id="heading{{ $key }}">
                                            <button class="accordion-buttons {{ $key === 0 ? '' : 'collapsed' }}"
                                                type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key }}"
                                                aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                                aria-controls="collapse{{ $key }}">
                                                {{ $value->title ?? '' }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key }}"
                                             class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}"
                                             aria-labelledby="heading{{ $key }}"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $value->description ?? '' !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- End Store Faq Section --}}

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Set up CSRF token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let addedToCart = [];  // Array to track added products in the cart
        let addedToWishlist = [];  // Array to track added products to the wishlist

        // Check if the user is logged in
        let citizenId = @json(Auth::guard('citizen')->check() ? Auth::guard('citizen')->id() : null);

        // Function to handle login check
        function handleLoginCheck(action) {
            if (!citizenId) {
                let message = 'Please log in to ' + action + ' this product.';
                toastr.error(message, 'Login Required', {
                    timeOut: 5000 // 5 seconds duration
                });

                setTimeout(function () {
                    window.location.href = '{{ route("frontend.citizen.login") }}';
                }, 5000);

                return false;
            }
            return true;
        }

        // Add to Cart (Delegated Event)
        $('#product-grid').on('click', '.add-to-cart', function (e) {
            e.preventDefault();

            let productId = $(this).data('product-id');

            if (!handleLoginCheck('add to cart')) return;

            if (addedToCart.includes(productId)) {
                toastr.error('This product is already in your cart!');
                return;
            }

            // Disable the button to prevent multiple clicks
            $(this).prop('disabled', true);

            $.ajax({
                url: '{{ route('frontend.addToCart') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    citizen_id: citizenId,
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        addedToCart.push(productId); // Add product ID to the cart tracker
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                },
                complete: function () {
                    // Re-enable the button after request completion
                    $('.add-to-cart').prop('disabled', false);
                    location.reload(); // Reload the page to reflect the changes
                }
            });
        });

        // Add to Wishlist (Delegated Event)
        $('#product-grid').on('click', '.quick-view', function (e) {
            e.preventDefault();

            let productId = $(this).data('product-id');

            if (!handleLoginCheck('add to wishlist')) return;

            if (addedToWishlist.includes(productId)) {
                toastr.error('This product is already in your wishlist!');
                return;
            }

            // Disable the button to prevent multiple clicks
            $(this).prop('disabled', true);

            $.ajax({
                url: '{{ route('frontend.addToWishlist') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    citizen_id: citizenId,
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        addedToWishlist.push(productId); // Add product ID to the wishlist tracker
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    toastr.error('An error occurred. Please try again later.');
                },
                complete: function () {
                    // Re-enable the button after request completion
                    $('.quick-view').prop('disabled', false);
                    location.reload(); // Reload the page to reflect the changes
                }
            });
        });

        // Filter Products
        function fetchProducts() {
            let categories = [];
            let subCategories = [];
            let colors = [];
            let minPrice = $('#min_price').val();
            let maxPrice = $('#max_price').val();

            $("input[name='categories[]']:checked").each(function () {
                categories.push($(this).val());
            });

            $("input[name='sub_categories[]']:checked").each(function () {
                subCategories.push($(this).val());
            });

            $("input[name='colors[]']:checked").each(function () {
                colors.push($(this).val());
            });

            $.ajax({
                url: "{{ route('frontend.products.filter') }}",
                method: "POST",
                data: {
                    categories_id: categories,
                    subCategories_id: subCategories,
                    color_id: colors,
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                    _token: "{{ csrf_token() }}",
                },
                success: function (response) {
                    $('#product-grid').empty();
                    if (response.products.length === 0) {
                        $('#product-grid').append(`
                            <div class="empty-cart">
                                <h3 class="text-center">No products found</h3>
                                <p class="text-center">
                                    It looks like no products match your selected filters.
                                    <br>
                                    Please try adjusting the filters to find what you're looking for.
                                </p>
                            </div>
                        `);
                    } else {
                        $.each(response.products, function (index, product) {
                            $('#product-grid').append(`
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="{{ route('frontend.product.details', '') }}/${product.slug}" title="${product.name}" class="image">
                                                ${product.image ? `
                                                    <img class="pic-1" src="{{ asset('/damian_corporate/product/project_image/') }}/${product.image}" alt="${product.image}">
                                                    <img class="pic-2" src="{{ asset('/damian_corporate/product/project_image/') }}/${product.image}" alt="${product.image}">
                                                ` : ''}
                                            </a>
                                            <span class="product-new-label">
                                                ${product.product_type === 1 ? 'New' : (product.product_type === 2 ? 'Sale' : (product.product_type === 3 ? 'Best Seller' : 'Featured'))}
                                            </span>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="store-pro-title">
                                                <a href="{{ route('frontend.product.details', '') }}/${product.slug}">
                                                    ${product.name}
                                                </a>
                                            </h3>
                                            <div class="price">
                                                <span>₹ ${product.discount_price_after_percentage}</span> ₹ ${product.price}
                                            </div>
                                            <ul class="product-buttons">
                                                <li>
                                                    <a href="javascript:void(0)" class="add-to-cart addToCart" data-product-id="${product.id}">
                                                        <i class="fas fa-shopping-bag"></i>
                                                        Add to Cart
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="quick-view addToWishlist" data-product-id="${product.id}">
                                                        <i class="far fa-heart"></i>
                                                        Wishlist
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    }
                }
            });
        }

        $("input[name='categories[]'], input[name='sub_categories[]'], input[name='colors[]']").on('change', fetchProducts);
        $('#min_price, #max_price').on('input', fetchProducts);

    });
</script>

@endpush
