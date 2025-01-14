@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Wishlist
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
                       <span class="active">Wishlist</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    <!-- breadcrumb area end -->

    <!--section start-->
    <section class="wishlist-section">
        <div class="container">
            <div class="table-responsive">
                <table class="table wishlist-table">
                    <thead>
                        <tr class="table-head wishlist-table-head">
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlistItems as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('frontend.product.details', $item->product?->slug) }}" title="Product Details" class="img-link">
                                        <img src="{{ asset('/damian_corporate/product/project_image/' . $item->product?->image) }}" alt="{{ $item->product?->image }}" title="{{ $item->product?->image }}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('frontend.product.details', $item->product?->slug) }}" title="Product Details" class="product-name">
                                        {{ $item->product?->name }}
                                    </a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <p>in stock</p>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                {{ number_format($item->product?->discount_price_after_percentage, 0) }}
                                            </h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="{{ route('frontend.cart') }}" class="cart" title="cart">
                                                    <i class="fa-regular fa-cart-shopping"></i>
                                                </a>
                                                <a href="{{ route('frontend.wishlist') }}" class="icon me-1" title="Whishlist">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>₹ {{ number_format($item->product?->discount_price_after_percentage, 0) }}</h2>
                                </td>
                                <td>
                                    <p>in stock</p>
                                </td>
                                <td>
                                    <div class="icon-box d-flex gap-2 justify-content-center">
                                        <a href="{{ route('frontend.cart') }}" class="cart add_to_cart" title="cart">
                                            <i class="fa-regular fa-cart-shopping"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="icon me-1 remove-wishlist-item" data-id="{{ $item->id }}" title="Whishlist">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="wishlist-buttons">
                <a href="{{ route('frontend.products') }}" class="tp-btn-border" title="Continue Shopping">
                    <i class="fa-sharp fa-regular fa-arrow-left"></i>
                    <span>continue shopping</span>
                </a>
                <a href="{{ route('frontend.checkout') }}" class="tp-btn-border" title="Checkout">
                    <span>Checkout</span>
                </a>
            </div>
        </div>
    </section>
    <!--section end-->


@endsection

@push('scripts')
{{-- Remove from wishlist AJAX request --}}
<script>
    $(document).on('click', '.remove-wishlist-item', function () {
        let itemId = $(this).data('id');
        let url = '{{ route("wishlist.destroy", ":id") }}';
        url = url.replace(':id', itemId); // Replace the placeholder with the actual item ID

        if (confirm('Are you sure you want to remove this item from your wishlist?')) {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message); // Show success message
                        location.reload(); // Reload the page to reflect the changes
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('An error occurred while removing the item.');
                }
            });
        }
    });
</script>

@endpush
