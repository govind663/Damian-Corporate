<!-- header area start -->
<!-- Only For Store Header -->
@if(Route::currentRouteName() === 'frontend.products' || Route::currentRouteName() === 'frontend.product.details' || Route::currentRouteName() === 'frontend.cart' || Route::currentRouteName() === 'frontend.wishlist' || Route::currentRouteName() === 'frontend.checkout' || Route::currentRouteName() === 'frontend.citizen.logout' || Route::currentRouteName() === 'frontend.myProfile' || Route::currentRouteName() === 'frontend.orders' || Route::currentRouteName() === 'frontend.address' || Route::currentRouteName() === 'frontend.accountDetails' || Route::currentRouteName() === 'frontend.citizen.login' || Route::currentRouteName() === 'frontend.citizen.register' || Route::currentRouteName() === 'frontend.change-password' || Route::currentRouteName() === 'frontend.citizen.forget-password.request' || Route::currentRouteName() === 'frontend.citizen.password.reset')
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.about') }}" title="About us">About us </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.services' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.services') }}" title="Services">Services</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.products' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.products') }}" title="Store">Store</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.awards' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.awards') }}" title="Awards & Media">Awards & Media</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blogs</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.careers' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.careers') }}" title="Careers">Careers</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.contact' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.contact') }}" title="Contact us">Contact us</a>
                            </li>
                        </ul>

                    </div>

                    <div class="col-xl-2 col-lg-2 d-none d-xl-block">
                        <div class="tp-header-right d-flex align-items-center justify-content-end">
                            <div class="tp-header-icon d-none d-xl-block position-relative">
                                <a href="javascript:;" class="dc-icon-sec" data-bs-toggle="dropdown" aria-expanded="false" title="Citizen Details">
                                    @if (!empty(Auth::guard('citizen')->user()->profile_image))
                                        <img src="{{ asset('/damian_corporate/citizen/profile_image/' . Auth::guard('citizen')->user()->profile_image) }}" alt="Profile Image" title="Profile Image" id="profile-image-preview" class="rounded-circle" width="30" height="30">
                                    @else
                                        <img src="{{ asset('frontend/assets/img/icon/profile.png') }}" alt="Profile Image" title="Profile Image" id="profile-image-preview" class="rounded-circle" width="30" height="30">
                                    @endif
                                </a>
                                <div class="login-dropdown">
                                    <ul class="login-dropdown-options">
                                        @if(Auth::guard('citizen')->check())

                                            {{-- Display User's Name --}}
                                            <li>
                                                <a class="dropdown-item" href="javascript:;" title="Hello">
                                                    <b>Hello, {{ Auth::guard('citizen')->user()->f_name }} {{ Auth::guard('citizen')->user()->l_name }}</b>
                                                </a>
                                            </li>

                                            {{-- Citizen Profile --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('frontend.myProfile') }}" title="Citizen Profile">
                                                    <i class="fa-solid fa-user"></i> &nbsp; My Profile
                                                </a>
                                            </li>

                                            {{-- Logout --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('frontend.citizen.logout') }}" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa-solid fa-right-from-bracket"></i> &nbsp; Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('frontend.citizen.logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                            {{-- Login --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('frontend.citizen.login') }}" title="Login">
                                                    <i class="fa-solid fa-right-to-bracket"></i> &nbsp; Login
                                                </a>
                                            </li>

                                            {{-- Register --}}
                                            @if (Route::has('frontend.citizen.register'))
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('frontend.citizen.register') }}" title="Register">
                                                        <i class="fa-solid fa-user-plus"></i> &nbsp; Register
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- Forgot Password --}}
                                            <li>
                                                <a class="dropdown-item" href="{{ route('frontend.citizen.forget-password.request') }}" title="Forgot Password">
                                                    <i class="fa-solid fa-lock"></i> &nbsp; Forgot Password
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            @php
                                // ==== Fetch Proroduct ID from the database Pluck
                                $productId = DB::table('products')->pluck('id')->whereNull('deleted_at')->toArray();

                                // ==== Fetch Product Quantity from the cart database Pluck citizen_id and product_id
                                $cartQuantity = DB::table('carts')
                                                // ->whereIn('product_id', $productId)
                                                ->where('citizen_id', Auth::guard('citizen')->id())
                                                ->whereNull('deleted_at')
                                                ->first('quantity');

                                // ==== Fetch Product Quantity from the wishlist database Pluck citizen_id and product_id
                                $wishlistQuantity = DB::table('wishlists')
                                                // ->whereIn('product_id', $productId)
                                                ->where('citizen_id', Auth::guard('citizen')->id())
                                                ->whereNull('deleted_at')
                                                ->first('quantity');
                            @endphp

                            {{-- Check Auth Citizen Cart Quantity --}}
                            @if(Auth::guard('citizen')->check())
                                <div class="tp-header-icon cart d-none d-xl-block">
                                    <a class="cart-icon-new-sec p-relative" href="{{ route('frontend.cart') }}" title="Add to cart">
                                        <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart"></i>

                                        @if(!empty($cartQuantity) && $cartQuantity->quantity > 0)
                                            <span class="cart-count-circle"
                                                style="
                                                    position: absolute;
                                                    top: -14px;
                                                    right: -9px;
                                                    background-color: green;
                                                    color: white;
                                                    border-radius: 50%;
                                                    width: 20px;
                                                    height: 20px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    font-size: 12px;
                                                    padding: 0;
                                                    text-align: center;">
                                                <b>{{ $cartQuantity->quantity }}</b>
                                            </span>

                                        @else
                                            <span>
                                                <i class="far fa-plus"></i>
                                            </span>
                                        @endif
                                    </a>
                                </div>
                            @else
                                <div class="tp-header-icon cart d-none d-xl-block">
                                    <a class="cart-icon-new-sec p-relative" href="{{ route('frontend.cart') }}" title="Add to cart">
                                        <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart"></i>
                                        <span>
                                            <i class="far fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            @endif

                            {{-- Check Auth Citizen Wishlist Quantity --}}
                            @if(Auth::guard('citizen')->check())
                                <div class="tp-header-icon wishlist d-none d-xl-block">
                                    <a class="cart-icon-new-sec p-relative" href="{{ route('frontend.wishlist') }}" title="Wishlist">
                                        <i class="fa-solid fa-heart"></i>

                                        @empty($wishlistQuantity)
                                            <span>
                                                <i class="far fa-plus" ></i>
                                            </span>
                                        @else
                                            <span class="wishlist-count-circle"
                                                style="
                                                    position: absolute;
                                                    top: -14px;
                                                    right: -9px;
                                                    background-color: green;
                                                    color: white;
                                                    border-radius: 50%;
                                                    width: 20px;
                                                    height: 20px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    font-size: 12px;
                                                    padding: 0;
                                                    text-align: center;">
                                                <b>{{ $wishlistQuantity->quantity ?? '0' }}</b>
                                            </span>
                                        @endempty
                                    </a>
                                </div>
                            @else
                                <div class="tp-header-icon wishlist d-none d-xl-block">
                                    <a class="cart-icon-new-sec p-relative" href="{{ route('frontend.wishlist') }}" title="Wishlist">
                                        <i class="fa-solid fa-heart" style="color:white !important;"></i>
                                        <span>
                                            <i class="far fa-plus" style="color:white !important;"></i>
                                        </span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endif
<!-- Only For Store Header End-->

<!-- Without Store Header -->
@if(Route::currentRouteName() == 'frontend.home' || Route::currentRouteName() === 'frontend.project.details' || Route::currentRouteName() == 'frontend.about' || Route::currentRouteName() == 'frontend.services' || Route::currentRouteName() == 'frontend.awards' || Route::currentRouteName() == 'frontend.careers' || Route::currentRouteName() == 'frontend.contact')
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.about') }}" title="About us">About us </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.services' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.services') }}" title="Services">Services</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.products' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.products') }}" title="Store">Store</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.awards' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.awards') }}" title="Awards & Media">Awards & Media</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blogs</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.careers' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.careers') }}" title="Careers">Careers</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteName() == 'frontend.contact' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('frontend.contact') }}" title="Contact us">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endif
<!-- header area end -->
