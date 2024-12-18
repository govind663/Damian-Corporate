<!-- header area start -->
<header>
    <div class="tp-header-area tp-header-tranparent ">
        <div class="container-fluid home-container">
            <div class="row tp-header-2-menu align-items-center">
                <nav class="navbar navbar-expand-lg fixed-top home-navbar">
                    <!--<div class="container">-->
                    <a class="navbar-brand" href="{{ route('frontend.home') }}">
                        <img src="{{ asset('/frontend/assets/img/logo/damian-logo.png') }}">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.about') }}">About us </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.services') }}">Services</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="portfolio.html">Portfolio</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.store') }}">Store</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.awards') }}">Awards & Media</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.blogs') }}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.careers') }}">Careers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.contact') }}">Contact us</a>
                            </li>
                        </ul>
                    </div>
                    <!--</div>-->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->
