
<style>
    .dc-header-menu>nav>ul>li>a {
        font-size: 16px !important;
    }
    .navbar-brand img {
        width: 300px;
    }
</style>

<!-- search popup start -->
<div class="search__popup d-none">
    <div class="container-fluid home-container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="search__wrapper">
                    <div class="search__top d-flex justify-content-between align-items-center">
                        <div class="search__logo">
                            <a href="{{ route('frontend.home') }}" title="Home">
                                <img src="{{ asset('/frontend/assets/img/logo/damian-logo.png') }}" alt="damian-logo.png" title="Damian Corporate" width="150">
                            </a>
                        </div>
                        <div class="search__close">
                            <button type="button" class="search__close-btn search-close-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="search__form">
                        <form action="#">
                            <div class="search__input">
                                <input class="search-input-field" type="text" placeholder="Type here to search...">
                                <span class="search-focus-border"></span>
                                <button type="submit">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- search popup end -->

<!-- tp-offcanvus-area-start -->
<div class="tpoffcanvas-area">
    <div class="tpoffcanvas">
        <div class="tpoffcanvas__close-btn">
            <button class="close-btn"><i class="fal fa-times"></i></button>
        </div>
        <div class="tpoffcanvas__logo mob-off-canvas-logo">
            <a href="{{ route('frontend.home') }}" title="Home">
                <img src="{{ asset('/frontend/assets/img/logo/damian-logo.png') }}" alt="damian-logo.png" title="Damian Corporate" width="150">
            </a>
        </div>

        <div class="tp-main-menu-mobile d-xl-none"></div>
        <div class="tpoffcanvas__social mob-off-canvas-sec">
            <div class="social-icon">
                <a href="{{ route('frontend.citizen.login') }}" title="Login">
                    <i class="fa-solid fa-user"></i>
                </a>
                <a href="{{ route('frontend.citizen.register') }}" title="Register">
                    <i class="fa-solid fa-user-plus"></i>
                </a>
                <a href="{{ route('frontend.cart') }}" title="cart">
                    <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart"></i>
                </a>
                <a href="{{ route('frontend.wishlist') }}" title="wishlist">
                    <i class="fa-solid fa-heart"></i>
                </a>
            </div>
        </div>
        <div class="tpoffcanvas__input">
            <form action="#">
                <div class="p-relative">
                    <input type="text" placeholder="Search Here">
                    <button>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
<div class="body-overlay"></div>
<!-- tp-offcanvus-area-end -->


<!-- header area start -->
@if(Route::currentRouteName() === 'frontend.products' || Route::currentRouteName() === 'frontend.product.details' || Route::currentRouteName() === 'frontend.cart' || Route::currentRouteName() === 'frontend.wishlist' || Route::currentRouteName() === 'frontend.checkout')
<div class="tp-header-area z-index-5 dc-header-section">
    <div class="container-fluid home-container">
       <div class="row align-items-center">
          <div class="col-xl-3 col-lg-8 col-6">
              <div class="tp-header-logo dc-header-logo">
                  <a href="{{ route('frontend.home') }}" title="Home">
                      <img src="{{ asset('/frontend/assets/img/logo/damian-logo.png') }}" alt="damian-logo.png" title="Damian Corporate" width="120">
                  </a>
              </div>
          </div>


          <div class="col-xl-7 d-none d-xl-block">
             <div class="dc-header-menu">
                <nav class="tp-main-menu-content">
                   <ul>
                        <li class="nav-item {{ Route::currentRouteName() == 'frontend.about' ? 'active' : '' }}">
                            <a href="{{ route('frontend.about') }}" title="About us">About us </a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'frontend.services' ? 'active' : '' }}">
                            <a href="{{ route('frontend.services') }}" title="Services">Services</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'frontend.products' ? 'active' : '' }}">
                            <a class="" href="{{ route('frontend.products') }}" title="Store">Store</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'frontend.awards' ? 'active' : '' }}">
                            <a class="" href="{{ route('frontend.awards') }}" title="Awards & Media">Awards & Media</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'frontend.blogs' ? 'active' : '' }}">
                            {{-- <a class="" href="{{ route('frontend.blogs') }}">Blogs</a> --}}
                            <a class="" href="#" title="Blogs">Blogs</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'frontend.careers' ? 'active' : '' }}">
                            <a class="" href="{{ route('frontend.careers') }}" title="Careers">Careers</a>
                        </li>
                        <li class="nav-item {{ Route::currentRouteName() == 'frontend.contact' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('frontend.contact') }}" title="Contact us">Contact us</a>
                        </li>
                   </ul>
                </nav>
             </div>
          </div>

          <div class="col-xl-2 col-lg-8 col-6">
             <div class="tp-header-right d-flex align-items-center justify-content-end">
                <div class="tp-header-icon d-none d-xl-block position-relative">
                   <a href="javascript:;" class="login-icon-sec" title="Login">
                      <i class="fa-solid fa-user"></i>
                   </a>
                   <div class="login-dropdown">
                      <ul class="login-dropdown-options">
                         <li><a class="dropdown-item" href="{{ route('frontend.citizen.login') }}" title="citizenLogin">Login</a></li>
                         <li><a class="dropdown-item" href="{{ route('frontend.citizen.register') }}" title="citizenSignup">Signup</a></li>
                      </ul>
                   </div>
                </div>

                <div class="tp-header-icon cart d-none d-xl-block">
                   <a class="cart-icon p-relative" href="{{ route('frontend.cart') }}" title="cart">
                      <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart"></i>
                      <span>
                         <i class="far fa-plus"></i>
                      </span>
                   </a>
                </div>

                <div class="tp-header-icon cart d-none d-xl-block">
                   <a class="cart-icon p-relative" href="{{ route('frontend.wishlist') }}" title="wishlist">
                      <i class="fa-solid fa-heart"></i>
                      <span>
                         <i class="far fa-plus"></i>
                      </span>
                   </a>
                </div>

                <div class="tp-header-icon search d-none d-xl-block">
                   <a href="#" class="search-icon" title="search">
                      <i class="fa-solid fa-magnifying-glass"></i>
                   </a>
                   <div class="dropdown-search">
                      <form class="search-form" action="search.html" method="get">
                         <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search Here" aria-label="Search" />

                            <button class="btn" type="submit" id="search-button" class="dropdown-search-btn-sec">
                               <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                            </button>
                         </div>
                      </form>
                   </div>
                </div>

                <div class="tp-header-bar d-xl-none">
                   <button class="tp-menu-bar"><i class="fa-solid fa-bars"></i></button>
                </div>
             </div>
          </div>         

       </div>
    </div>
</div>
@endif

@if(Route::currentRouteName() === 'frontend.home' || Route::currentRouteName() === 'frontend.about' || Route::currentRouteName() === 'frontend.awards' || Route::currentRouteName() === 'frontend.careers' || Route::currentRouteName() === 'frontend.contact' || Route::currentRouteName() === 'frontend.services')

<header>
    <div class="tp-header-area tp-header-tranparent ">
        <div class="container-fluid">
            <div class="row tp-header-2-menu align-items-center">
                <nav class="navbar navbar-expand-lg fixed-top home-navbar">

                    <div class="col-xl-3 col-lg-8 col-6">
                        <div class="tp-header-logo dc-header-logo">
                            <a href="{{ route('frontend.home') }}" title="Home">
                                <img src="{{ asset('/frontend/assets/img/logo/damian-logo.png') }}" alt="damian-logo.png" title="Damian Corporate" width="120">
                            </a>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.about' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.about') }}">About us </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.services' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.services') }}">Services</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.products' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.products') }}">Store</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.awards' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.awards') }}">Awards & Media</a>
                            </li>
                            {{-- <li class="nav-item {{ Route::currentRouteName() == 'frontend.blogs' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.blogs') }}">Blogs</a>
                            </li> --}}
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.careers' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.careers') }}">Careers</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.contact' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.contact') }}">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
@endif

<!-- header area end -->
