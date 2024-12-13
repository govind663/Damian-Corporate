@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Home
@endsection

@push('styles')
@endpush

@section('content')
    <!-- Start Hero Area -->
    <div class="hero-slider">
        <video autoplay loop muted width="100%" height="auto" src="{{ asset('frontend/assets/video/banner-video.mp4') }}"
            type="video/mp4">
        </video>
        <div class="container-fluid home-container">
            <div data-wow-duration="0.15" class="hero-info text-center wow fadeInDownBig">
                <h1>Design meets Luxury</h1>
            </div>
        </div>
    </div>
    <!-- End Hero Area -->

    <div class="tp-about-area tp-about-bg p-relative pt-150">
        <div class="container-fluid home-container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="tp-hero-thumb-box home-about-us-area p-relative pr-40">
                        <div class="tp-hero-thumb wow fadeInLeft">
                            <img src="{{ asset('frontend/assets/img/about/about-us-img.jpeg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="tp-about-content">
                        <div class="tp-about-title-box mb-20">
                            <h3 class="tp-section-title tp-split-text tp-split-in-right">About Us</h3>
                        </div>
                        <div class="tp-about-text wow fadeInRight mb-25">
                            <p>The Damian Group was established in 1962 through the foresight,
                                determination, and wisdom of its founder, Mr. Damian Pereira. Over the
                                years, the group has grown by leaps and bounds under the visionary
                                leadership of Mr. Damian Pereira’s eldest son, Mr. Anselm Pereira. Along
                                with his two sons, Mr. Craig Pereira and Mr. Kyle Pereira, Mr. Anselm
                                Pereira has aggressively led the expansion of the group for the Design and
                                Build offerings of Luxury Interior Projects under the well-known brand name
                                of Damian Corporate Pvt. Ltd.
                            </p>
                            <p>The company now has its own 30,000 sq. ft. highly automated manufacturing
                                facility, fully equipped with automated CNC machines to ensure the highest
                                level of quality, precision, and workmanship in Bhiwandi, along with display
                                showrooms in both Mumbai and Goa. The dynamic promoters have additionally
                                ventured into the Construction Business under the brand name - Damian Realty
                                LLP, which is developing ultra-luxury bespoke homes in Goa, and also into
                                the Hospitality Business - under the brand name - Damian Hospitality Pvt.
                                Ltd. which operates a well known restaurant in Mumbai.
                            </p>
                            <p>Damian Corporate also prides itself on having strong international
                                affiliations with many well-known brands and having business expertise in
                                various design avenues such as Architectural Design, Corporate & Residential
                                Interior Design, Hospitality Design and Institution Design. Backed by a rich
                                65-year legacy of excellence that streams down from its promoters, the
                                latest cutting-edge technology being used in its factory, and a passionate
                                and talented team of 50+ professionals along with a workforce of over 250+
                                individuals, we ensure we deliver to our clients on our promise of
                                excellence for every project, be it in any part of India or abroad. Our
                                expertise speaks for itself.
                            </p>
                        </div>
                        <a class="tp-btn-black" href="about-us.html">
                            <span>Know More</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="tp-project-2-area home-portfolio-area pt-135 fix pb-60">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-2-title-box home-portfolio-title text-center pb-120">
                        <span class="tp-section-subtitle tp-split-text tp-split-in-right">Portfolio</span>
                        <h3 class="tp-section-title tp-split-text tp-split-in-right d-none portfolio-title-section">
                            Portfolio
                        </h3>
                    </div>
                </div>
            </div>
            <div class="tp-project-2-wrapper portfolio-section">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/1.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Balaji Wafers Head Office</a>
                                </h4>
                                <p>Commercial Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/2.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Ambica Corporation Ltd.</a>
                                </h4>
                                <p>Commercial Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/3.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Khatan Residence</a>
                                </h4>
                                <p>Residential Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/4.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Dr. Kumar Residence</a>
                                </h4>
                                <p>Residential Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/5.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Tyaani Jewellery</a>
                                </h4>
                                <p>Commercial Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/6.png') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Monteiro Apartment</a>
                                </h4>
                                <p>Residential Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/7.jpeg') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Ahuja Residence</a>
                                </h4>
                                <p>Residential Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/8.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title"><a href="#">Armstrong</a></h4>
                                <p>Architecture Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/9.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">GIFT City</a>
                                </h4>
                                <p>Commercial Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/10.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Bhatia Residence</a>
                                </h4>
                                <p>Residential Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/11.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Olar Apartment</a>
                                </h4>
                                <p>Residential Design & Build</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="tp-project-2-item">
                            <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                <a href="#"><img src="{{ asset('frontend/assets/img/portfolio/12.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="project-info">
                                <h4 class="tp-project-2-title">
                                    <a href="#">Vora Residence</a>
                                </h4>
                                <p>Residential Design & Build</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="tp-btn-black load-more" href="#">
                            <span>Load More</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Portfolio Start -->
    <section class="section-lgx modern-digital-agency-portfolio overflow-hidden">
        <div class="container-fluid home-container">
            <div class="pbmit-element-portfolio-style-9">
                <div class="pbmit-element-inner">
                    <div class="pbmit-element-posts-wrapper row multi-columns-row">
                        <div class="pbmit-main-hover-slider">
                            <div class="swiper-hover-slide-nav col-md-12 col-lg-6">
                                <div class="tp-testimonial-2-title-box mb-65">
                                    <h3 class="tp-section-title tp-split-text tp-split-in-right">Services
                                    </h3>
                                </div>
                                <ul class="pbmit-hover-inner">
                                    <li>
                                        <h3 class="pbmit-title-data-hover"><a class="pbmit-svg-btn" href="services.html">
                                                <span class="pbminfotech-box-number">01</span>
                                                <span>Architecture Design & Build
                                                </span><i class="fa fa-up-right"></i></a>
                                        </h3>
                                    </li>
                                    <li>
                                        <h3 class="pbmit-title-data-hover"><a class="pbmit-svg-btn" href="services.html">
                                                <span class="pbminfotech-box-number">02</span>
                                                <span>Residential Design & Build
                                                </span><i class="fa fa-up-right"></i></a>
                                        </h3>
                                    </li>
                                    <li>
                                        <h3 class="pbmit-title-data-hover"><a class="pbmit-svg-btn" href="services.html">
                                                <span class="pbminfotech-box-number">03</span>
                                                <span>Commercial Design & Build</span><i class="fa fa-up-right"></i></a>
                                        </h3>
                                    </li>
                                    <li>
                                        <h3 class="pbmit-title-data-hover"><a class="pbmit-svg-btn" href="services.html">
                                                <span class="pbminfotech-box-number">04</span>
                                                <span>Modular Furniture & Partition Systems</span><i
                                                    class="fa fa-up-right"></i></a>
                                        </h3>
                                    </li>
                                    <!-- <li>
                                       <h3 class="pbmit-title-data-hover"><a class="pbmit-svg-btn" href="#">
                                             <span class="pbminfotech-box-number">05</span>
                                             <span>Partition Systems</span><i class="fa fa-up-right"></i></a>
                                       </h3>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="swiper-hover-slide-images col-md-12 col-lg-6">
                                <div class="swiper-container pbmit-hover-image">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <video
                                                        src="{{ asset('frontend/assets/video/Architectural-Design-Build.mp4') }}"
                                                        autoplay muted loop height="425" width="570"></video>
                                                    <!--<img src="frontend/assets/img/service/architecture-design-build.png"-->
                                                    <!--   height="500px" alt="">-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <video
                                                        src="{{ asset('frontend/assets/video/Residential-Design-Build.mp4') }}"
                                                        autoplay muted loop height="425" width="570"></video>
                                                    <!--<img src="frontend/assets/img/service/Residential Design & Build.jpeg"-->
                                                    <!--   height="500px" alt="">-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <video
                                                        src="{{ asset('frontend/assets/video/Commercial-Design-Build.mp4') }}"
                                                        autoplay muted loop height="425" width="570"></video>
                                                    <!--<img src="frontend/assets/img/service/Commercial Design & Build.jpeg"-->
                                                    <!--   height="500" alt="" />-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <video
                                                        src="{{ asset('frontend/assets/video/Modular-Furniture-Design-Build.mp4') }}"
                                                        autoplay muted loop height="425" width="570"></video>
                                                    <!--<img src="frontend/assets/img/service/Partition Systems.jpeg" height="500"-->
                                                    <!--   alt="" />-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="swiper-slide">
                                          <div class="pbmit-featured-img-wrapper">
                                             <div class="pbmit-featured-wrapper">
                                                <img src="frontend/assets/img/service/services-3.jpg" height="500" alt="" />
                                             </div>
                                          </div>
                                       </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio End -->

    <!--Testimonial-section-->
    <div class="tp-testimonial-2-area p-relative fix pb-140">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-testimonial-2-title-box text-end mb-65">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Testimonials</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center testimonial-info-sec">
                <div class="col-xl-3 col-lg-3 col-md-3 col">
                    <div class="tp-testimonial-2-thumb">
                        <img src="{{ asset('frontend/assets/img/testimonial/testimonials-img.jpg') }}" />
                    </div>
                </div>
                <img src="{{ asset('frontend/assets/img/testimonial/chair.png') }}" style="animation-duration:3s;"
                    class="shape-chair wow bounceInRight" />
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <div class="tp-testimonial-2-wrapper p-relative">
                        <div class="swiper-container tp-testimonial-2-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="tp-testimonial-2-content">
                                        <div class="tp-testimonial-2-author-info">
                                            <h5>Mr. Sanjay Ahuja</h5>
                                            <p>Businessman</p>
                                        </div>
                                        <div class="tp-testimonial-2-text">
                                            <p>We got our home done by Damian Corporate; we loved the
                                                overall design; the quality of wood workmanship was
                                                excellent; and the best part about working with them was the
                                                team led by Kyle. I look forward to getting our next home
                                                done by them soon as well.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-testimonial-2-content">
                                        <div class="tp-testimonial-2-author-info">
                                            <h5>Mrs. Amisha Ahuja</h5>
                                            <p>Businesswoman</p>
                                        </div>
                                        <div class="tp-testimonial-2-text">
                                            <p>Kyle, as a designer, transforms spaces, blending aesthetics
                                                with functionality. He and his design team curate elements
                                                like colours, furniture, and lighting to create harmonious
                                                environments that reflect your tastes, preferences, and
                                                lifestyles perfectly.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-testimonial-2-content">
                                        <div class="tp-testimonial-2-author-info">
                                            <!-- <h5>Wade Warren</h5> -->
                                            <h5>Malcolm Monteiro</h5>
                                            <p>CEO, DHL (Asia Pacific)</p>
                                        </div>
                                        <div class="tp-testimonial-2-text">
                                            <p>We have had a long and fruitful association with Damian
                                                Corporate... Since the beginning of the 1990s to date, they
                                                have planned, designed, and effectively executed the entire
                                                interior of our residences in Mumbai and Goa. Their
                                                professionalism, personal touch, expertise, quality of
                                                materials used, and timely execution impressed us.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tp-testimonial-2-content">
                                        <div class="tp-testimonial-2-author-info">
                                            <!-- <h5>Wade Warren</h5> -->
                                            <h5>Dr. Shishir Kumar</h5>
                                            <p class="mb-0">Chief Diabetologist, Bombay Hospital</p>
                                        </div>
                                        <div class="tp-testimonial-2-text">
                                            <p>Damian Corporate and Anslem Pereira have been part of every
                                                home I have ever owned and lived in.. Starting with our
                                                first apartment that they did for us in 1989, they have
                                                since done multiple homes for us and the key to us going
                                                back to them repeatedly is that they know how to convert an
                                                apartment to a home. It is a rare talent that they possess
                                                to look beyond space and create something special. For us as
                                                a family, Interior Design =Damian Corporate</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="tp-testimonial-2-content">
                                        <div class="tp-testimonial-2-author-info">
                                            <!-- <h5>Wade Warren</h5> -->
                                            <h5>Pooja Hingorani</h5>
                                            <p class="mb-0">Brand Vertical Head & Chief Manager, Bennett
                                                Coleman & Co. Ltd. (Times Group)</p>
                                        </div>
                                        <div class="tp-testimonial-2-text">
                                            <p>Damian... One of the oldest names in the furniture world. I
                                                grew up seeing this brand. When I first met the Damian
                                                team—Kyle and U. Anselm—I was sure that there was no going
                                                back. I actually went there to see their furniture without
                                                realising that my entire house would be designed and
                                                developed by them. Yes, they not only designed my whole
                                                house, but they even helped me structure the walls and
                                                everything else. Today it's been 5 years, and I have the
                                                same finish on all my wardrobes, platforms, kitchen,
                                                bedrooms, and bathrooms.Thank you, team Damian Corporate,
                                                for making this house feel like home.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="tp-testimonial-2-content">
                                        <div class="tp-testimonial-2-author-info">
                                            <!-- <h5>Wade Warren</h5> -->
                                            <h5>Siddharth Bhatia</h5>
                                            <p class="mb-0">AVP - Marketing, Nucleus Office Parks, A
                                                Blackstone Company</p>
                                        </div>
                                        <div class="tp-testimonial-2-text">
                                            <p>From the initial conceptualization phase to the final
                                                execution, every aspect of the architectural process was
                                                handled with the utmost professionalism, creativity, and
                                                attention to detail. The Damian Corporate team demonstrated
                                                an unparalleled dedication to understanding my vision while
                                                incorporating innovative design solutions that elevated the
                                                project to new heights. Furthermore, their commitment to
                                                open communication and collaboration throughout the entire
                                                project ensured that my needs and preferences were always
                                                prioritised.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tp-testimonial-2-arrow-box d-none d-xl-block">
                            <button class="testimonial-prev">
                                <img src="{{ asset('frontend/assets/img/icon/left-chevron.png') }}" width="30"
                                    alt="">
                                <!-- <svg width="56" height="24" viewBox="0 0 56 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M0.939335 10.9393C0.35355 11.5251 0.35355 12.4749 0.939335 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939335 10.9393ZM56 10.5L2 10.5V13.5L56 13.5V10.5Z"
                                       fill="currentcolor" />
                                 </svg> -->
                            </button>
                            <button class="testimonial-next">
                                <img src="{{ asset('frontend/assets/img/icon/right-chevron.png') }}" width="30"
                                    alt="">
                                <!-- <svg width="56" height="24" viewBox="0 0 56 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M55.0607 10.9393C55.6465 11.5251 55.6465 12.4749 55.0607 13.0607L45.5147 22.6066C44.9289 23.1924 43.9792 23.1924 43.3934 22.6066C42.8076 22.0208 42.8076 21.0711 43.3934 20.4853L51.8787 12L43.3934 3.51472C42.8076 2.92893 42.8076 1.97919 43.3934 1.3934C43.9792 0.807611 44.9289 0.807611 45.5147 1.3934L55.0607 10.9393ZM0 10.5L54 10.5V13.5L0 13.5L0 10.5Z"
                                       fill="currentcolor" />
                                 </svg> -->
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Testimonial-section end-->

    <!--Start Contact Area-->
    <div class="tp-contact-area p-relative black-bg fix">
        <div class="container-fluid home-container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".7s">
                    <div class="tp-contact-right">
                        <h2 class="text-center tp-split-text tp-split-in-right mb-30">Get in Touch</h2>
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <input type="text" placeholder="Full Name">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <img width="17px"
                                                    src="{{ asset('frontend/assets/img/icon/user.png') }}" />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <input type="email" placeholder="Your Email">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9727 1.76172L13.2227 13.1094C13.1953 13.3828 13.0312 13.6289 12.7852 13.7656C12.6484 13.8203 12.5117 13.875 12.3477 13.875C12.2383 13.875 12.1289 13.8477 12.0195 13.793L8.68359 12.3984L7.28906 14.4766C7.17969 14.668 6.98828 14.75 6.79688 14.75C6.49609 14.75 6.25 14.5039 6.25 14.2031V11.5781C6.25 11.3594 6.30469 11.168 6.41406 11.0312L12.375 3.375L4.33594 10.6211L1.51953 9.44531C1.21875 9.30859 1 9.03516 1 8.67969C0.972656 8.29688 1.13672 8.02344 1.4375 7.85938L13.6875 0.886719C13.9609 0.722656 14.3438 0.722656 14.6172 0.914062C14.8906 1.10547 15.0273 1.43359 14.9727 1.76172Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <input type="text" placeholder="Your Phone">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.9727 11.332L13.3164 14.0938C13.2344 14.5039 12.9062 14.7773 12.4961 14.7773C5.60547 14.75 0 9.14453 0 2.25391C0 1.84375 0.246094 1.51562 0.65625 1.43359L3.41797 0.777344C3.80078 0.695312 4.21094 0.914062 4.375 1.26953L5.66016 4.25C5.79688 4.60547 5.71484 5.01562 5.41406 5.23438L3.9375 6.4375C4.86719 8.32422 6.39844 9.85547 8.3125 10.7852L9.51562 9.30859C9.73438 9.03516 10.1445 8.92578 10.5 9.0625L13.4805 10.3477C13.8359 10.5391 14.0547 10.9492 13.9727 11.332Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box">
                                        <input type="text" placeholder="Your Address">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.59375 14.4219C3.17188 12.6445 0 8.40625 0 6C0 3.10156 2.32422 0.75 5.25 0.75C8.14844 0.75 10.5 3.10156 10.5 6C10.5 8.40625 7.30078 12.6445 5.87891 14.4219C5.55078 14.832 4.92188 14.832 4.59375 14.4219ZM5.25 7.75C6.20703 7.75 7 6.98438 7 6C7 5.04297 6.20703 4.25 5.25 4.25C4.26562 4.25 3.5 5.04297 3.5 6C3.5 6.98438 4.26562 7.75 5.25 7.75Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="tp-contact-textarea-box">
                                        <textarea placeholder="Write Message"></textarea>
                                        <div class="tp-contact-icon">
                                            <span>
                                                <svg width="14" height="11" viewBox="0 0 14 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.6875 0.5C13.3984 0.5 14 1.10156 14 1.8125C14 2.25 13.7812 2.63281 13.4531 2.87891L7.51953 7.33594C7.19141 7.58203 6.78125 7.58203 6.45312 7.33594L0.519531 2.87891C0.191406 2.63281 0 2.25 0 1.8125C0 1.10156 0.574219 0.5 1.3125 0.5H12.6875ZM5.93359 8.04688C6.5625 8.51172 7.41016 8.51172 8.03906 8.04688L14 3.5625V9.25C14 10.2344 13.207 11 12.25 11H1.75C0.765625 11 0 10.2344 0 9.25V3.5625L5.93359 8.04688Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button class="tp-btn-border height w-100"><span>Send Message</span></button>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-contact-left">
                        <img src="./frontend/assets/img/contact/get-in-touch-img.jpeg" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Start Form Area -->
    <div class="tp-form-area pt-60">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-testimonial-2-title-box text-center mb-65">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Contact us</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tp-map-box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3147.614091929121!2d72.8212547742511!3d19.052991752696336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c952c459fe63%3A0x4749213890924bcb!2sDamian%20Corporate%20Private%20Limited!5e1!3m2!1sen!2sin!4v1705318600227!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Area -->
@endsection

@push('scripts')
    <script>
        $(function() {
            $(".tp-project-2-wrapper .col-md-4").slice(0, 9).show();
            $("body").on('click touchstart', '.load-more', function(e) {
                e.preventDefault();
                $(".tp-project-2-wrapper .col-md-4:hidden").slice(0, 3).slideDown();
                if ($(".tp-project-2-wrapper .col-md-4:hidden").length == 0) {
                    $(".load-more").css('visibility', 'hidden');
                }
            });
        });

        // 01. PreLoader Js
        windowOn.on('load', function() {
            $("#loading").fadeOut(500);
        });
    </script>
@endpush
