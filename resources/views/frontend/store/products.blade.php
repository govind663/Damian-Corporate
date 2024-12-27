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
                       <span><a href="{{ route('frontend.home') }}">Home</a></span>
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
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-4 collection-filter">
                    <!-- side-bar collapse block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-collapse-block open">
                            <div class="accordion collection-accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button pt-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            Categories </button>
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
                                            Sub Category </button>
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
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                         data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                         aria-controls="panelsStayOpen-collapseSix">
                                         Price </button>
                                   </h2>
                                   <div class="price-input-container">
                                      <label for="min_price">Min Price</label>
                                      <input type="number" id="min_price" name="min_price">
                                      <label for="max_price">Max Price</label>
                                      <input type="number" id="max_price" name="max_price">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!-- brand filter end -->
                    </div>
                    <!-- side-bar collapse block end here -->
                </div>


                <div class="col-xl-9 col-lg-8">
                    <div class="store-one-sub-sec">
                        <div class="row">

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{ route('frontend.product.details') }}" class="image">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}">
                                        </a>
                                        <span class="product-new-label">new</span>
                                        <!--<ul class="product-links">-->
                                        <!--   <li><a href="#"><i class="fa fa-random"></i></a></li>-->
                                        <!--   <li><a href="#"><i class="fa fa-search"></i></a></li>-->
                                        <!--</ul>-->
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title">
                                            <a href="{{ route('frontend.product.details') }}">EPIC Table - Danform</a>
                                        </h3>
                                        <div class="price"><span>₹ 500</span> ₹ 1000</div>
                                        <!--<ul class="rating">-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="far fa-star"></li>-->
                                        <!--</ul>-->
                                        <ul class="product-buttons">
                                            <li>
                                                <a href="{{ route('frontend.cart') }}" class="add-to-cart">
                                                    <i class="fas fa-shopping-bag"></i>
                                                    Add To Cart
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}" class="quick-view">
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
                                        <a href="#" class="image">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}">
                                        </a>
                                        <span class="product-sale-label">sale</span>
                                        <!--<ul class="product-links">-->
                                        <!--   <li><a href="#"><i class="fa fa-random"></i></a></li>-->
                                        <!--   <li><a href="#"><i class="fa fa-search"></i></a></li>-->
                                        <!--</ul>-->
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title"><a href="#">ORBIT Chair - Danform</a></h3>
                                        <div class="price"><span>₹ 500</span> ₹ 1000</div>
                                        <!--<ul class="rating">-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="far fa-star"></li>-->
                                        <!--</ul>-->
                                        <ul class="product-buttons">
                                            <li><a href="#" class="add-to-cart"><i class="fas fa-shopping-bag"></i> add to
                                                    cart </a></li>
                                            <li><a href="#" class="quick-view"><i class="far fa-heart"></i> wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#" class="image">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}">
                                        </a>
                                        <span class="product-new-label">new</span>
                                        <!--<ul class="product-links">-->
                                        <!--   <li><a href="#"><i class="fa fa-random"></i></a></li>-->
                                        <!--   <li><a href="#"><i class="fa fa-search"></i></a></li>-->
                                        <!--</ul>-->
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title"><a href="#">BLISS Chair - Danform</a></h3>
                                        <div class="price"><span>₹ 500</span> ₹ 1000</div>
                                        <!--<ul class="rating">-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="far fa-star"></li>-->
                                        <!--</ul>-->
                                        <ul class="product-buttons">
                                            <li><a href="#" class="add-to-cart"><i class="fas fa-shopping-bag"></i> add to
                                                    cart </a></li>
                                            <li><a href="#" class="quick-view"><i class="far fa-heart"></i> wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#" class="image">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}">
                                        </a>
                                        <span class="product-new-label">new</span>
                                        <!--<ul class="product-links">-->
                                        <!--   <li><a href="#"><i class="fa fa-random"></i></a></li>-->
                                        <!--   <li><a href="#"><i class="fa fa-search"></i></a></li>-->
                                        <!--</ul>-->
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title"><a href="#">ROOT Table - Danform</a></h3>
                                        <div class="price"><span>₹ 500</span> ₹ 1000</div>
                                        <!--<ul class="rating">-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="far fa-star"></li>-->
                                        <!--</ul>-->
                                        <ul class="product-buttons">
                                            <li><a href="#" class="add-to-cart"><i class="fas fa-shopping-bag"></i> add to
                                                    cart </a></li>
                                            <li><a href="#" class="quick-view"><i class="far fa-heart"></i> wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#" class="image">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}">
                                        </a>
                                        <span class="product-new-label">new</span>
                                        <!--<ul class="product-links">-->
                                        <!--   <li><a href="#"><i class="fa fa-random"></i></a></li>-->
                                        <!--   <li><a href="#"><i class="fa fa-search"></i></a></li>-->
                                        <!--</ul>-->
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title"><a href="#">Comb Chair - Kristensen</a></h3>
                                        <div class="price"><span>₹ 500</span> ₹ 1000</div>
                                        <!--<ul class="rating">-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="far fa-star"></li>-->
                                        <!--</ul>-->
                                        <ul class="product-buttons">
                                            <li><a href="#" class="add-to-cart"><i class="fas fa-shopping-bag"></i> add to
                                                    cart </a></li>
                                            <li><a href="#" class="quick-view"><i class="far fa-heart"></i> wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-6">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="#" class="image">
                                            <img class="pic-1" src="{{ asset('frontend/assets/img/store-1.jpg') }}">
                                            <img class="pic-2" src="{{ asset('frontend/assets/img/store-2.jpg') }}">
                                        </a>
                                        <span class="product-new-label">new</span>
                                        <!--<ul class="product-links">-->
                                        <!--   <li><a href="#"><i class="fa fa-random"></i></a></li>-->
                                        <!--   <li><a href="#"><i class="fa fa-search"></i></a></li>-->
                                        <!--</ul>-->
                                    </div>
                                    <div class="product-content">
                                        <h3 class="store-pro-title"><a href="#">Facetto Table - Kristensen</a></h3>
                                        <div class="price"><span>₹ 500</span> ₹ 1000</div>
                                        <!--<ul class="rating">-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="fas fa-star"></li>-->
                                        <!--   <li class="far fa-star"></li>-->
                                        <!--</ul>-->
                                        <ul class="product-buttons">
                                            <li><a href="#" class="add-to-cart"><i class="fas fa-shopping-bag"></i> add to
                                                    cart </a></li>
                                            <li><a href="#" class="quick-view"><i class="far fa-heart"></i> wishlist</a>
                                            </li>
                                        </ul>
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
