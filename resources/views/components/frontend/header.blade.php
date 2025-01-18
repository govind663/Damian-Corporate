<!-- header area start -->
<header>
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

                                @php
                                    // ==== Fetch Product IDs from the products table
                                    $productIds = DB::table('products')
                                        ->whereNull('deleted_at')
                                        ->pluck('id')
                                        ->toArray();

                                    // ==== Count products in the cart for the authenticated citizen
                                    $cartQuantity = DB::table('carts')
                                        ->whereIn('product_id', $productIds)
                                        ->where('citizen_id', Auth::guard('citizen')->id())
                                        ->where('payment_status', 1)
                                        ->whereNull('deleted_at')
                                        ->sum('quantity'); // Use sum instead of count

                                    // ==== Count products in the wishlist for the authenticated citizen
                                    $wishlistQuantity = DB::table('wishlists')
                                        ->whereIn('product_id', $productIds)
                                        ->where('citizen_id', Auth::guard('citizen')->id())
                                        ->whereNull('deleted_at')
                                        ->sum('quantity'); // Use sum instead of count
                                @endphp

                                <div class="tp-header-icon d-block d-xl-none" style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                                    {{-- Mobile Only display User details --}}
                                    <li class="nav-item dropdown" style="margin-bottom: 5px;">
                                        {{-- Display User's Name --}}
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            @if (!empty(Auth::guard('citizen')->user()->profile_image))
                                                <img src="{{ asset('/damian_corporate/citizen/profile_image/' . Auth::guard('citizen')->user()->profile_image) }}" alt="Profile Image" title="Profile Image" id="profile-image-preview" class="rounded-circle" width="30" height="30">
                                            @else
                                                <img src="{{ asset('frontend/assets/img/icon/profile.png') }}" alt="Profile Image" title="Profile Image" id="profile-image-preview" class="rounded-circle" width="30" height="30">
                                            @endif

                                            @if (Auth::guard('citizen')->check())
                                                <span class="text-capitalize">{{ Auth::guard('citizen')->user()->f_name }} {{ Auth::guard('citizen')->user()->l_name }}</span>
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu"
                                        style="
                                            background-color: transparent !important;
                                            border: 1px solid rgb(203, 196, 179);
                                            margin-bottom: 20px !important;
                                            width: 230px;
                                            padding: 5px;
                                            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                                            border-radius: 8px;
                                            overflow: hidden;
                                            z-index: 1050;
                                            position: absolute;
                                            top: 100%;
                                            left: 0;
                                            transform: translate3d(0px, 10px, 0px);
                                            transition: opacity 0.15s linear, transform 0.15s linear;
                                        ">
                                            @if(Auth::guard('citizen')->check())

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
                                    </li>

                                    {{-- Add Add To Cart --}}
                                    <li>
                                        <a class="nav-link" href="{{ route('frontend.cart') }}" title="Cart" style="position: relative; display: inline-flex; align-items: center; font-size: 18px; text-decoration: none; color: #fcf5f5;">
                                            <i class="fa-solid fa-cart-shopping" style="font-size: 24px;"></i>
                                            @if (!empty($cartQuantity) && $cartQuantity > 0)
                                                <span style="position: absolute; top: -10px; right: -10px; background-color: #ff5722; color: #fff; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: bold; border: 2px solid #fff;">
                                                    <b>{{ $cartQuantity }}</b>
                                                </span>
                                            @else
                                                <span style="position: absolute; top: -10px; right: -10px; background-color: #eee7e7; color: #292828; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 16px; font-weight: normal;">
                                                    <i class="far fa-plus"></i>
                                                </span>
                                            @endif
                                        </a>
                                    </li>

                                    {{-- Add Wishlist --}}
                                    <li>
                                        <a class="nav-link" href="{{ route('frontend.wishlist') }}" title="Wishlist" style="position: relative; display: inline-flex; align-items: center; font-size: 18px; text-decoration: none; color: #f6f3f3;">
                                            <i class="fa-solid fa-heart" style="font-size: 24px;"></i>
                                            @if (!empty($wishlistQuantity) && $wishlistQuantity > 0)
                                                <span style="position: absolute; top: -10px; right: -10px; background-color: #ff5722; color: #fff; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: bold; border: 2px solid #fff;">
                                                    {{ $wishlistQuantity }}
                                                </span>
                                            @else
                                                <span style="position: absolute; top: -10px; right: -10px; background-color: #ffffff; color: #000000; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 16px; font-weight: normal;">
                                                    <i class="far fa-plus"></i>
                                                </span>
                                            @endif
                                        </a>
                                    </li>
                                </div>

                            </ul>

                        </div>

                        {{-- Desktop Only --}}
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
                                    // ==== Fetch Product IDs from the products table
                                    $productIds = DB::table('products')
                                        ->whereNull('deleted_at')
                                        ->pluck('id')
                                        ->toArray();

                                    // ==== Count products in the cart for the authenticated citizen
                                    $cartQuantity = DB::table('carts')
                                        ->whereIn('product_id', $productIds)
                                        ->where('citizen_id', Auth::guard('citizen')->id())
                                        ->where('payment_status', 1)
                                        ->whereNull('deleted_at')
                                        ->sum('quantity'); // Use sum instead of count

                                    // ==== Count products in the wishlist for the authenticated citizen
                                    $wishlistQuantity = DB::table('wishlists')
                                        ->whereIn('product_id', $productIds)
                                        ->where('citizen_id', Auth::guard('citizen')->id())
                                        ->whereNull('deleted_at')
                                        ->sum('quantity'); // Use sum instead of count
                                @endphp

                                {{-- Check Auth Citizen Cart Quantity --}}
                                @if(Auth::guard('citizen')->check())
                                    <div class="tp-header-icon cart d-none d-xl-block">
                                        <a class="cart-icon-new-sec p-relative" href="{{ route('frontend.cart') }}" title="Add to cart">
                                            <i class="fa-sharp fa-solid fa-cart-shopping shopping-cart"></i>

                                            @if(!empty($cartQuantity) && $cartQuantity > 0)
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
                                                    <b>{{ $cartQuantity }}</b>
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
                                                    <b>{{ $wishlistQuantity }}</b>
                                                </span>
                                            @endempty
                                        </a>
                                    </div>
                                @else
                                    <div class="tp-header-icon wishlist d-none d-xl-block">
                                        <a class="cart-icon-new-sec p-relative" href="{{ route('frontend.wishlist') }}" title="Wishlist">
                                            <i class="fa-solid fa-heart" style="color:white !important;"></i>
                                            <span>
                                                <i class="far fa-plus"></i>
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
</header>
<!-- header area end -->
