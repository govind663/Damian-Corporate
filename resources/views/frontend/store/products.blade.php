@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store
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
                <div class="col-xl-3 col-lg-4 collection-filter">
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
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox1">
                                                        <label class="form-check-label" for="checkbox1">
                                                            Imported Collection
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox2">
                                                        <label class="form-check-label" for="checkbox2">
                                                            Modular Collection
                                                        </label>
                                                    </div>
                                                </li>

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

                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox11">
                                                        <label class="form-check-label" for="checkbox11">
                                                            Table
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox12">
                                                        <label class="form-check-label" for="checkbox12">
                                                            Chair
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox13">
                                                        <label class="form-check-label" for="checkbox13">
                                                            Glass Frame
                                                        </label>
                                                    </div>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox14">
                                                        <label class="form-check-label" for="checkbox14">
                                                            Glass Art
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox15">
                                                        <label class="form-check-label" for="checkbox15">
                                                            Sofa
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox16">
                                                        <label class="form-check-label" for="checkbox16">
                                                            Modular Wardrobe
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox16">
                                                        <label class="form-check-label" for="checkbox16">
                                                            Modular Kitchen
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            Colours </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <ul class="collection-listing">
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox31">
                                                        <label class="form-check-label" for="checkbox31">
                                                            Blue </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox32">
                                                        <label class="form-check-label" for="checkbox32">
                                                            Green </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox33">
                                                        <label class="form-check-label" for="checkbox33">
                                                            Red </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox34">
                                                        <label class="form-check-label" for="checkbox34">
                                                            Beige </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox35">
                                                        <label class="form-check-label" for="checkbox35">
                                                            Black </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox36">
                                                        <label class="form-check-label" for="checkbox36">
                                                            Brown </label>
                                                    </div>
                                                </li>
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
                <div class="col-xl-9 col-lg-8">
                    <div class="store-one-sub-sec">
                        <div class="row">

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('frontend.product.details') }}" title="EPIC Table - Danform" class="image">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}" alt="store-1.jpg" title="store-1.jpg">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}" alt="store-2.jpg" title="store-2.jpg">
                                        </a>
                                        <span class="product-new-label">new</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title">
                                            <a href="{{ route('frontend.product.details') }}" title="EPIC Table - Danform">EPIC Table - Danform</a>
                                        </h3>
                                        <div class="price"><span>₹ 500</span> ₹ 1000</div>
                                        <ul class="product-buttons">
                                            <li>
                                                <a href="{{ route('frontend.cart') }}" title="Add To Cart" class="add-to-cart">
                                                    <i class="fas fa-shopping-bag"></i> 
                                                    Add to Cart 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}" title="Wishlist" class="quick-view">
                                                    <i class="far fa-heart"></i> 
                                                    wishlist
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('frontend.product.details') }}" class="image" title="ORBIT Chair - Danform">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}" title="store-1.jpg" alt="store-1.jpg">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}" title="store-2.jpg" alt="store-2.jpg">
                                        </a>
                                        <span class="product-new-label">new</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title">
                                            <a href="{{ route('frontend.product.details') }}" title="ORBIT Chair - Danform">ORBIT Chair - Danform</a>
                                        </h3>
                                        <div class="price">
                                            <span>₹ 500</span> ₹ 1000
                                        </div>
                                        <ul class="product-buttons">
                                            <li>
                                                <a href="{{ route('frontend.cart') }}" title="Add To Cart" class="add-to-cart">
                                                    <i class="fas fa-shopping-bag"></i> 
                                                    Add to Cart 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}" title="Wishlist" class="quick-view">
                                                    <i class="far fa-heart"></i> 
                                                    wishlist
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('frontend.product.details') }}" class="image" title="BLISS Chair - Danform">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}" title="store-1.jpg" alt="store-1.jpg">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}" title="store-2.jpg" alt="store-2.jpg">
                                        </a>
                                        <span class="product-new-label">new</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title">
                                            <a href="{{ route('frontend.product.details') }}" title="BLISS Chair - Danform">BLISS Chair - Danform</a>
                                        </h3>
                                        <div class="price">
                                            <span>₹ 500</span> ₹ 1000
                                        </div>
                                        <ul class="product-buttons">
                                            <li>
                                                <a href="{{ route('frontend.cart') }}" title="Add To Cart" class="add-to-cart">
                                                    <i class="fas fa-shopping-bag"></i> 
                                                    Add to Cart 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}" title="Wishlist" class="quick-view">
                                                    <i class="far fa-heart"></i> 
                                                    wishlist
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('frontend.product.details') }}" class="image" title="ROOT Table - Danform">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}" title="store-1.jpg" alt="store-1.jpg">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}" title="store-2.jpg" alt="store-2.jpg">
                                        </a>
                                        <span class="product-new-label">new</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title">
                                            <a href="{{ route('frontend.product.details') }}" title="ROOT Table - Danform">ROOT Table - Danform</a>
                                        </h3>
                                        <div class="price">
                                            <span>₹ 500</span> ₹ 1000
                                        </div>
                                        <ul class="product-buttons">
                                            <li>
                                                <a href="{{ route('frontend.cart') }}" title="Add To Cart" class="add-to-cart">
                                                    <i class="fas fa-shopping-bag"></i> 
                                                    Add to Cart 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}" title="Wishlist" class="quick-view">
                                                    <i class="far fa-heart"></i> 
                                                    wishlist
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('frontend.product.details') }}" class="image" title="Comb Chair - Kristensen">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}" title="store-1.jpg" alt="store-1.jpg">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}" title="store-2.jpg" alt="store-2.jpg">
                                        </a>
                                        <span class="product-new-label">new</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title">
                                            <a href="{{ route('frontend.product.details') }}" title="Comb Chair - Kristensen }}">Comb Chair - Kristensen</a>
                                        </h3>
                                        <div class="price">
                                            <span>₹ 500</span> ₹ 1000
                                        </div>
                                        <ul class="product-buttons">
                                            <li>
                                                <a href="{{ route('frontend.cart') }}" title="Add To Cart" class="add-to-cart">
                                                    <i class="fas fa-shopping-bag"></i> 
                                                    Add to Cart 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}" title="Wishlist" class="quick-view">
                                                    <i class="far fa-heart"></i> 
                                                    wishlist
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('frontend.product.details') }}" class="image" title="Facetto Table - Kristensen">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}" title="store-1.jpg" alt="store-1.jpg">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}" >
                                        </a>
                                        <span class="product-new-label">new</span>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title">
                                            <a href="{{ route('frontend.product.details') }}" title="Facetto Table - Kristensen }}">Facetto Table - Kristensen</a>
                                        </h3>
                                        <div class="price">
                                            <span>₹ 500</span> ₹ 1000
                                        </div>
                                        <ul class="product-buttons">
                                            <li>
                                                <a href="{{ route('frontend.cart') }}" title="Add To Cart" class="add-to-cart">
                                                    <i class="fas fa-shopping-bag"></i> 
                                                    Add to Cart 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}" title="Wishlist" class="quick-view">
                                                    <i class="far fa-heart"></i> 
                                                    wishlist
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                {{-- End Store Product Section--}}

            </div>
        </div>
    </div>

    <div class="store-faq-sec black-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="store-faq-title-box">
                        <h3 class="store-faq-title-sec" id="store-faq-title">FAQ</h3>
                    </div>
                    <div class="tp-service-details-faq tp-faq-inner__customize">
                        <div class="product-det-custom-accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-items tp-faq-active">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-buttons " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Why Internet is so popular amonth others?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            A G.xber has its own IP address, which is made
                                            public instead. While a rather seemingly
                                            insignificant change, the G.xber IP address can be
                                            used for a number of vital business to everything
                                            from security to customer experience.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            What makes Cretive best creative template?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            A G.xber has its own IP address, which is made
                                            public instead. While a rather seemingly
                                            insignificant change, the G.xber IP address can be
                                            used for a number of vital business to everything
                                            from security to customer experience.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How can we get the best from G.xber template?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            A G.xber has its own IP address, which is made
                                            public instead. While a rather seemingly
                                            insignificant change, the G.xber IP address can be
                                            used for a number of vital business to everything
                                            from security to customer experience.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- store area end -->

@endsection

@push('scripts')
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
@endpush
