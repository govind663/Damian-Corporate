<div class="col-lg-3">
    <div class="profile-cont-sec">
        <div class="account-avatar">
            <div class="image">
                @if (!empty(Auth::guard('citizen')->user()->profile_image))
                    <img src="{{ asset('/damian_corporate/citizen/profile_image/' . Auth::guard('citizen')->user()->profile_image) }}" alt="profile" title="profile">
                @else
                    <img src="{{ asset('frontend/assets/img/icon/profile.png') }}" alt="profile" title="profile">
                @endif
            </div>
            <h6 class="my-profile-title">
                Hello, <span>{{ Auth::guard('citizen')->user()->f_name ?? '' }} {{ Auth::guard('citizen')->user()->l_name ?? '' }}</span>
            </h6>
            <p>{{ Auth::guard('citizen')->user()->email ?? '' }}</p>
        </div>
    </div>


    <nav class="nav flex-column myaccount-tab-menu" role="tablist">
        {{-- Dashboard --}}
        <a href="{{ route('frontend.myProfile') }}" class="nav-link {{ Route::currentRouteName() == 'frontend.myProfile' ? 'active' : '' }}">
            <i class="fa-sharp fa-regular fa-house"></i>
            Dashboard
        </a>

        {{-- Order --}}
        <a href="{{ route('frontend.orders') }}" class="nav-link {{ Route::currentRouteName() == 'frontend.orders' ? 'active' : '' }}">
            <i class="fa-regular fa-cart-shopping"></i>
            My Order
        </a>

        {{-- Address --}}
        <a href="{{ route('frontend.address') }}" class="nav-link {{ Route::currentRouteName() == 'frontend.address' ? 'active' : '' }}">
            <i class="fa-regular fa-location-dot"></i>
            Address
        </a>

        {{-- Account Details --}}
        <a href="{{ route('frontend.accountDetails') }}" class="nav-link {{ Route::currentRouteName() == 'frontend.accountDetails' ? 'active' : '' }}">
            <i class="fa-regular fa-user"></i>
            Account Details
        </a>

        {{-- Change Password --}}
        <a href="{{ route('frontend.change-password') }}" class="nav-link {{ Route::currentRouteName() == 'frontend.change-password' ? 'active' : '' }}">
            <i class="fa-regular fa-lock"></i>
            Change Password
        </a>

        {{-- Logout --}}
        <a class="nav-link" href="{{ route('frontend.citizen.logout') }}" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa-regular fa-arrow-right-from-bracket"></i>
            Logout
        </a>
        <form id="logout-form" action="{{ route('frontend.citizen.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>
