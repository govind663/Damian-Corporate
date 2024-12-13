@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | About Us
@endsection

@push('styles')
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-section breadcrumb__pt services-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumbs/about-us-breadcrumb.jpg') }}) !important;">
        <div class="breadcrumb__area breadcrumb__height p-relative fix">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__section-title-box mb-20">
                                <h3 class="breadcrumb__title tp-split-text tp-split-in-right">About Us</h3>
                            </div>
                            <div class="breadcrumb__list">
                                <span><a href="index.html">Home</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>About Us</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- hero area start -->
    <div class="tp-slider-2-area tp-slider-2-bg fix p-relative pt-100 pb-80">
        <div class="container-fluid home-container">
            <div class="tp-slider-2-wrap p-relative">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="tp-team-author-info">
                            <h5 class="tp-section-title">About Us</h5>
                        </div>
                        <div class="tp-team-details-text about-us-right-text pe-5">
                            <p class="text-justify">The Damian Group was established in 1962 through the foresight,
                                determination, and
                                wisdom of its founder, Mr. Damian Pereira. Over the years, the group has grown by leaps
                                and bounds under the visionary leadership of Mr. Damian Pereira’s eldest son, Mr.
                                Anselm Pereira. Along with his two sons, Mr. Craig Pereira and Mr. Kyle Pereira, Mr.
                                Anselm Pereira has aggressively led the expansion of the group for the design and build
                                offerings of luxury interior projects under the well-known brand name of Damian
                                Corporate Pvt. Ltd.
                            </p>
                            <p class="text-justify">The company now has its own 30,000 sq. ft. highly automated
                                manufacturing facility,
                                fully equipped with automated CNC machines to ensure the highest level of quality,
                                precision, and workmanship in Bhiwandi, along with display showrooms in both Mumbai and
                                Goa. The dynamic promoters have additionally ventured into the Construction Business
                                under the brand name - Damian Realty LLP, which is developing ultra-luxury bespoke
                                homes in Goa, and also into the Hospitality Business - under the brand name - Damian
                                Hospitality Pvt. Ltd. which operates a well known restaurant in Mumbai.
                            </p>
                            <p class="text-justify">Damian Corporate also prides itself on having strong international
                                affiliations with
                                many well-known brands and having business expertise in various design avenues such as
                                Architectural Design, Corporate & Residential Interior Design, Hospitality Design and
                                Institution Design. Backed by a rich 65-year legacy of excellence that streams down
                                from its promoters, the latest cutting-edge technology being used in its factory, and a
                                passionate and talented team of 50+ professionals along with a workforce of over 250+
                                individuals, we ensure we deliver to our clients on our promise of excellence for every
                                project, be it in any part of India or abroad. Our expertise speaks for itself.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="tp-hero-thumb-box about-us-img-sec p-relative">
                            <div class="tp-hero-thumb about-us-thumb-sec wow fadeInLeft">
                                <img src="{{ asset('frontend/assets/img/about/about-img.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero area end -->

    <!-- project area start -->
    <div class="tp-project-3-area pt-70 pb-70 showroom-section">
        <div class="container-fluid home-container">
            <div class="tp-project-3-title-wrap">
                <div class="row align-items-end">
                    <div class="col-xl-7 col-lg-7">
                        <div class="tp-project-3-title-box">
                            <span class="tp-section-subtitle tp-split-text tp-split-in-right"></span>
                            <h3 class="tp-section-title tp-split-text tp-split-in-right about-us-showroom-header">
                                Our Showroom
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="grid-sizer"></div> -->
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30 grid-item-2">
                    <div class="tp-project-3-item p-relative active">
                        <div class="tp-project-3-thumb">
                            <img src="{{ asset('frontend/assets/img/other/mumbai-showroom.png') }}" alt="">
                        </div>
                        <div class="tp-project-3-content about-content-area">
                            <span>Mumbai</span>
                            <h5 class="tp-project-3-title showroom-sub-title"><a href="#">Showroom & Office</a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30 grid-item-2">
                    <div class="tp-project-3-item p-relative active">
                        <div class="tp-project-3-thumb">
                            <img src="{{ asset('frontend/assets/img/other/damian-de-goa-img.jpg') }}" alt="">
                        </div>
                        <div class="tp-project-3-content about-content-area">
                            <span>Goa</span>
                            <h5 class="tp-project-3-title showroom-sub-title"><a href="#">Showroom & Office</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- project area end -->

    <!-- project area start -->
    <div class="tp-project-2-area infrastructure-area  pt-70 fix pb-70">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-2-title-box pb-60">
                        <span class="manufacturing-subtitle-section tp-split-text tp-split-in-right">Infrastructure</span>
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Manufacturing Facility</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-2-wrapper manufacturing-facility-section p-relative">
                        <div class="swiper-container manufacturing-facility-area-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="tp-project-2-item">
                                        <div class="tp-project-2-thumb mb-30">
                                            <img src="{{ asset('frontend/assets/img/service/manufacturing-facility-1.jpeg') }}"
                                                alt="">
                                        </div>
                                        <!-- <div class="project-info pb-20">
                                           <h4 class="tp-project-2-title"><a href="#">Lorem Ipsum</a></h4>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-project-2-item">
                                        <div class="tp-project-2-thumb mb-30">
                                            <img src="{{ asset('frontend/assets/img/service/manufacturing-facility-2.jpeg') }}"
                                                alt="">
                                        </div>
                                        <!-- <div class="project-info pb-20">
                                           <h4 class="tp-project-2-title"><a href="#">Lorem Ipsum</a></h4>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-project-2-item">
                                        <div class="tp-project-2-thumb mb-30">
                                            <img src="{{ asset('frontend/assets/img/service/manufacturing-facility-3.jpeg') }}"
                                                alt="">
                                        </div>
                                        <!-- <div class="project-info pb-20">
                                           <h4 class="tp-project-2-title"><a href="#">Lorem Ipsum</a></h4>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-project-2-item">
                                        <div class="tp-project-2-thumb mb-30">
                                            <img src="{{ asset('frontend/assets/img/service/manufacturing-facility-4.jpeg') }}"
                                                alt="">
                                        </div>
                                        <!-- <div class="project-info pb-20">
                                           <h4 class="tp-project-2-title"><a href="#">Lorem Ipsum</a></h4>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-project-2-item">
                                        <div class="tp-project-2-thumb mb-30">
                                            <img src="{{ asset('frontend/assets/img/service/manufacturing-facility-5.jpeg') }}"
                                                alt="">
                                        </div>
                                        <!-- <div class="project-info pb-20">
                                           <h4 class="tp-project-2-title"><a href="#">Lorem Ipsum</a></h4>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="manufacturing-facility-arrow-box">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>

                        </div>
                        <div class="tp-project-dots text-center mt-110"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- project area end -->

    <!-- Vision area start -->
    <div class="tp-team-details-area tp-team-details-inner-style vision-strength-area pt-70 pb-70">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="tp-team-details-thumb vision-image-area text-sm-center">
                        <img src="{{ asset('frontend/assets/img/service/vision-values-strength.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="tp-team-details-wrap">
                        <div class="tp-team-author-info">
                            <h5 class="tp-section-title">Vision, Values & Strengths</h5>
                            <p>Over the past 65 years Damian has constantly pushed the boundaries of creativity and
                                comfort
                                to provide ground breaking products of the highest quality to their customers.
                            </p>
                        </div>
                    </div>
                    <div class="tp-faq-area p-relative fix pt-20">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                                <div class="vision-values-content-section">
                                    <h4 class="vision-header-section">
                                        <i class="fa-solid fa-angles-right"></i>
                                        Team Strength
                                    </h4>
                                    <p>
                                        Our team is the backbone of our company, comprising 50+ professionals along with
                                        a workforce of over 250 individuals.
                                    </p>
                                    <h4 class="vision-header-section">
                                        <i class="fa-solid fa-angles-right"></i>
                                        Technological Advancements
                                    </h4>
                                    <p>
                                        We have invested in a state-of-the-art manufacturing facility equipped with fully
                                        automated CNC machines, ensuring the highest level of quality, precision, and
                                        efficiency in our work.
                                    </p>
                                    <h4 class="vision-header-section">
                                        <i class="fa-solid fa-angles-right"></i>
                                        Infrastructure
                                    </h4>
                                    <p>
                                        Our company-owned warehouse and manufacturing units, which are
                                        strategically located in major cities in India, ensure quick turnaround
                                        times without compromising on quality.
                                    </p>
                                    <h4 class="vision-header-section">
                                        <i class="fa-solid fa-angles-right"></i>
                                        Presence
                                    </h4>
                                    <p>
                                        Our head offices and showrooms in major cities in India help us provide
                                        our clients with easy accessibility and the opportunity to experience
                                        our design concepts firsthand.
                                    </p>
                                    <h4 class="vision-header-section">
                                        <i class="fa-solid fa-angles-right"></i>
                                        Extensive range of products and services
                                    </h4>
                                    <p>
                                        We offer an extensive range of products
                                        and services to cater to diverse design needs. From residential and
                                        commercial spaces to
                                        retail and hospitality design, we have expertise in several industries.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vision area end -->

    <!-- board of directors section start -->
    <div class="board-directors-section pt-140 pb-150">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="tp-blog-title-wrap mb-55">
                    <div class="col-xl-12">
                        <div class="tp-blog-title-box">
                            <span
                                class="tp-section-subtitle tp-split-text tp-split-in-right directors-mega-header">Directors</span>
                            <h3 class="tp-section-title tp-split-text tp-split-in-right directors-sub-header">Board of
                                Directors</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="board-directors-grid">
                        <div class="board-directors-image">
                            <a href="#" class="image">
                                <img class="pic-1"
                                    src="{{ asset('frontend/assets/img/team/board-of-directors-image/Leonys-Pereira.jpeg') }}">
                            </a>
                            <ul class="board-directors-links">
                                <li><a href="#"><img src="{{ asset('frontend/assets/img/icon/linkedin.png') }}"
                                            alt=""></a></li>
                            </ul>
                        </div>
                        <div class="board-directors-content">
                            <h3 class="board-directors-title">Leonys Pereira</h3>
                            <span class="board-directors-category">Director - HR, Admin & Finance</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="board-directors-grid">
                        <div class="board-directors-image">
                            <a href="#" class="image">
                                <img class="pic-1"
                                    src="{{ asset('frontend/assets/img/team/board-of-directors-image/Anselm-Pereira.jpeg') }}">
                            </a>
                            <ul class="board-directors-links">
                                <li><a href="#"><img src="{{ asset('frontend/assets/img/icon/linkedin.png') }}"
                                            alt=""></a></li>
                            </ul>
                        </div>
                        <div class="board-directors-content">
                            <h3 class="board-directors-title">Anselm Pereira</h3>
                            <span class="board-directors-category">Chairman & Managing Director</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="board-directors-grid">
                        <div class="board-directors-image">
                            <a href="#" class="image">
                                <img class="pic-1"
                                    src="{{ asset('frontend/assets/img/team/board-of-directors-image/Craig-Pereira.jpeg') }}">
                            </a>
                            <ul class="board-directors-links">
                                <li><a href="#"><img src="{{ asset('frontend/assets/img/icon/linkedin.png') }}"
                                            alt=""></a></li>
                            </ul>
                        </div>
                        <div class="board-directors-content">
                            <h3 class="board-directors-title">Craig Pereira</h3>
                            <span class="board-directors-category">Executive Director Operations</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="board-directors-grid">
                        <div class="board-directors-image">
                            <a href="#" class="image">
                                <img class="pic-1"
                                    src="{{ asset('frontend/assets/img/team/board-of-directors-image/Kyle-Pereira.jpeg') }}">
                            </a>
                            <ul class="board-directors-links">
                                <li><a href="#"><img src="{{ asset('frontend/assets/img/icon/linkedin.png') }}"
                                            alt=""></a></li>
                            </ul>
                        </div>
                        <div class="board-directors-content">
                            <h3 class="board-directors-title">Kyle Pereira</h3>
                            <span class="board-directors-category">Executive Director & Design Principal</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- board of directors area end -->

    <!-- service area start -->
    <div class="tp-service-area pb-80 core-team-area">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-service-title-box mb-60">
                        <span class="tp-section-subtitle tp-split-text tp-split-in-right">Team</span>
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Core Team</h3>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="tp-service-item">
                        <div class="tp-service-thumb-box p-relative">
                            <div class="tp-service-thumb">
                                <img src="{{ asset('frontend/assets/img/team/team-mem-img-1.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="tp-service-content">
                            <h4 class="tp-service-title mb-5"><a href="#">Lorem Ipsum</a></h4>
                            <p class="mb-0">Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="tp-service-item">
                        <div class="tp-service-thumb-box p-relative">
                            <div class="tp-service-thumb">
                                <img src="{{ asset('frontend/assets/img/team/team-mem-img-2.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="tp-service-content">
                            <h4 class="tp-service-title mb-5"><a href="#">Lorem Ipsum</a></h4>
                            <p class="mb-0">Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="tp-service-item">
                        <div class="tp-service-thumb-box p-relative">
                            <div class="tp-service-thumb">
                                <img src="{{ asset('frontend/assets/img/team/team-mem-img-1.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="tp-service-content">
                            <h4 class="tp-service-title mb-5"><a href="#">Lorem Ipsum</a></h4>
                            <p class="mb-0">Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="tp-service-item">
                        <div class="tp-service-thumb-box p-relative">
                            <div class="tp-service-thumb">
                                <img src="{{ asset('frontend/assets/img/team/team-mem-img-2.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="tp-service-content">
                            <h4 class="tp-service-title mb-5"><a href="#">Lorem Ipsum</a></h4>
                            <p class="mb-0">Lorem Ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!--International Associates Section-->
    <div class="inter-asso">
        <!-- team area start -->
        <div class="tp-team-area tp-team-style-2 tp-team-style-4 fix pt-80 pb-80 international-associates-area">
            <div class="container-fluid home-container">
                <div class="tp-team-title-wrap mb-60">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tp-team-title-box text-center">
                                <!-- <span class="tp-section-subtitle tp-split-text tp-split-in-right">Associates</span> -->
                                <h3 class="tp-section-title tp-split-text tp-split-in-right">International Associates
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="tp-team-wrapper">
                            <div class="swiper-container tp-team-active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/Hall Black Douglas.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#">Hall Black Douglas</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/James Law Cybertecture.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#"> James Law Cybertecture</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/Calia Italia.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#">Pacini & Cappellini</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/albed.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#">Cafim</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/Welser Profile.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#"> Welser Profile</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/Fiam Italia.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#">Fiam</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/Artisan Logo.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#">Fantoni</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="tp-team-item black-bg">
                                            <div class="tp-team-thumb p-relative fix">
                                                <img src="{{ asset('frontend/assets/img/international-assosiates/Koinor.png') }}"
                                                    alt="">
                                            </div>
                                            <!-- <div class="tp-team-author-info text-center">
                                              <span>Medical Assistant</span>
                                              <h5 class="tp-team-title"><a href="#">Fantoni</a>
                                              </h5>
                                           </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- team area end -->
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
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
        $(function() {
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
