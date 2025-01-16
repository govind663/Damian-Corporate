@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Home
@endsection

@push('styles')
    <style>
        .tp-form-input-box input {
            color: #f4f4f4 !important;
        }

        .careers-input-box input {
            height: 66px !important;
        }

        .form-control {
            padding: 0.375rem .75rem;
            font-size: 1rem;
            font-weight: 900px;
            background-color: transparent !important;
        }

        .careers-dropdown-select .nice-select {
            height: 65px !important;
        }

        .careers-textarea textarea {
            height: 320px !important;
        }

        .tp-form-textarea-box textarea {
            color: #fffdfd !important;
        }

        .tp-section-subtitle {
            color: #fff !important;
            left: 8% !important;
            position: absolute;
            display: inline-block;
            padding-bottom: 5px;
            font-size: 175px;
            font-style: normal;
            font-weight: 300;
            opacity: .1;
            font-family: var(--tp-ff-heading);
        }

        .tp-about-text b {
            color: #fff !important;
            text-align: justify !important;
        }
    </style>
@endpush

@section('content')
    <!-- Start Hero Area -->
    <div class="hero-slider">
        <div class="video-container">
            @if (!empty($banners->banner_image))
                <img src="{{ asset('/damian_corporate/banner/banner_image/' . $banners->banner_image) }}" alt="{{ $banners->banner_image }}" title="{{ $banners->banner_image }}">
            @elseif (!empty($banners->banner_video))
                <video src="{{ asset('/damian_corporate/banner/banner_video/' . $banners->banner_video) }}" autoplay muted loop
                    alt="{{ $banners->banner_video }}" title="{{ $banners->banner_video }}">
                </video>
            @endif
        </div>
        <div class="heading-container">
            <h1>DESIGN MEETS LUXURY</h1>
        </div>
    </div>
    <!-- End Hero Area -->

    {{-- Start About Area --}}
    <div class="tp-about-area tp-about-bg p-relative">
        <div class="container-fluid home-container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="tp-hero-thumb-box home-about-us-area p-relative pr-40">
                        <div class="tp-hero-thumb wow fadeInLeft">
                            <img src="{{ asset('frontend/assets/img/about/About_Us.png') }}" alt="About_US" title="About_US" width="441" height="300">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="tp-about-content">
                        <div class="tp-about-title-box mb-20">
                            <h3 class="tp-section-title tp-split-text tp-split-in-right">
                                {{ $introductions->title ?? '' }}
                            </h3>
                        </div>
                        <div class="tp-about-text wow fadeInRight mb-25">
                            {{-- Add word Limit count --}}
                            <p class="text-justify">
                                {!! Str::limit($introductions->description ?? '', 540) !!}
                            </p>
                        </div>
                        <a class="tp-btn-black" href="{{ route('frontend.about') }}" title="Know More">
                            <span>Know More</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End About Area --}}

    <!-- Start Project Area -->
    <div class="tp-project-2-area home-portfolio-area pt-80 fix">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-2-title-box home-portfolio-title text-center pb-120">
                        <span class="tp-section-subtitle portfolio-area-subtitle tp-split-text tp-split-in-right">Portfolio</span>
                        <h3 class="tp-section-title tp-split-text tp-split-in-right d-none portfolio-title-section">
                            Portfolio
                        </h3>
                    </div>
                </div>
            </div>

            <div class="tp-project-2-wrapper portfolio-section">
                <div class="row">
                    @foreach ($projects as $value)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="tp-project-2-item">
                                <div class="tp-project-2-thumb portfolio-section-thumb mb-30">
                                    <div class="image-wrapper">
                                        <a href="{{ route('frontend.project.details', $value->slug) }}" class="tp-project-2-thumb-link" title="{{ $value->project_name }}">
                                        <img src="{{ asset('/damian_corporate/project/project_image/' . $value->project_image) }}" alt="{{ $value->project_image }}" title="{{ $value->project_image }}" loading="lazy" width="380px" height="241px">
                                        <div class="image-overlay"></div>
                                    </a>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <h4 class="tp-project-2-title">
                                        <a href="{{ route('frontend.project.details', $value->slug) }}"
                                           title="{{ $value->project_name }}">
                                           {{ $value->project_name ?? '' }}
                                        </a>
                                    </h4>
                                    <p>{{ $value->category?->category_name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="tp-btn-black load-more"href="#" title="Load More">
                            <span>Load More</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Project Area -->

    <!-- Start Services Area -->
    <section class="section-lgx modern-digital-agency-portfolio overflow-hidden portfolio-desktop-version">
        <div class="container-fluid home-container">
            <div class="pbmit-element-portfolio-style-9">
                <div class="pbmit-element-inner">
                    <div class="pbmit-element-posts-wrapper row multi-columns-row">
                        <div class="pbmit-main-hover-slider">
                            <div class="swiper-hover-slide-nav col-md-12 col-lg-6">
                                <div class="tp-testimonial-2-title-box mb-20">
                                    <h3 class="tp-section-title tp-split-text tp-split-in-right">
                                        Services
                                    </h3>
                                </div>
                                <ul class="pbmit-hover-inner">
                                    @foreach ($ourServices as $key => $value)
                                        <li>
                                            <h3 class="pbmit-title-data-hover">
                                                <a class="pbmit-svg-btn" href="{{ route('frontend.services') }}" title="{{ $value->service_title }}">
                                                    <span class="pbminfotech-box-number">{{ $key + 1 }}</span>
                                                    <span>{{ $value->service_title }}</span>
                                                    <i class="fa fa-up-right"></i>
                                                </a>
                                            </h3>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="swiper-hover-slide-images col-md-12 col-lg-6">
                                <div class="swiper-container pbmit-hover-image">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <video
                                                        src="{{ asset('frontend/assets/video/Architectural-Design-Build.mp4') }}" alt="Architectural Design Build"
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
                                                        src="{{ asset('frontend/assets/video/Residential-Design-Build.mp4') }}" alt="Residential Design Build"
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
                                                        src="{{ asset('frontend/assets/video/Commercial-Design-Build.mp4') }}" alt="Commercial Design Build"
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
                                                        src="{{ asset('frontend/assets/video/Modular-Furniture-Design-Build.mp4') }}" alt="Modular Furniture Design Build"
                                                        autoplay muted loop height="425" width="570"></video>
                                                    <!--<img src="frontend/assets/img/service/Partition Systems.jpeg" height="500"-->
                                                    <!--   alt="" />-->
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
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Portfolio-Mobile-Section -->
    <section class="portfolio-mobile-section">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-lg-12">
                <div class="tp-testimonial-2-title-box">
                    <h3 class="tp-section-title tp-split-text tp-split-in-right">Services</h3>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                <h3 class="por-header-sec"><a class="pbmit-svg-btn"
                        href="#">
                        <span class="pbminfotech-box-number">01</span>
                        <span>Architecture Design & Build</span>
                    </a>
                </h3>
                <video
                    src="https://damiancorporate.com/assets/images/All_Media%2Fhomepage%2F2024-10-23%2FDamian_corporates_All_Media_homepage_2024-07-09_Damian_corporates_Architectural%20Design%20&%20Build%20(2)%20(1).mp4?generation=1729686276928998&alt=media"
                    autoplay muted loop playsinline height="80%" width="100%"></video>
                </div>
                <div class="col-lg-12">
                <h3 class="por-header-sec" style="margin-bottom: 0px;">
                    <a class="pbmit-svg-btn" href="#">
                        <span class="pbminfotech-box-number">02</span>
                        <span>Residential Design & Build</span>
                    </a>
                </h3>
                <video
                    src="https://damiancorporate.com/assets/images/All_Media%2Fhomepage%2F2024-10-23%2FDamian_corporates_All_Media_homepage_2024-07-09_Damian_corporates_Residential%20Design%20&%20Build%20(1).mp4?generation=1729686298068447&alt=media"
                    autoplay muted loop playsinline height="90%" width="100%"></video>
                </div>
                <div class="col-lg-12">
                <h3 class="por-header-sec" style="margin-bottom: 0px;">
                    <a class="pbmit-svg-btn" href="#">
                        <span class="pbminfotech-box-number">03</span>
                        <span>Commercial Design & Build</span>
                    </a>
                </h3>
                <video
                    src="https://damiancorporate.com/assets/images/All_Media%2Fhomepage%2F2024-10-23%2FDamian_corporates_All_Media_homepage_2024-07-09_Damian_corporates_Commercial%20Design%20&%20Build%20(1)%20(1).mp4?generation=1729686314441214&alt=media"
                    autoplay muted loop playsinline height="90%" width="100%"></video>
                </div>
                <div class="col-lg-12">
                <h3 class="por-header-sec" style="margin-bottom: 0px;">
                    <a class="pbmit-svg-btn"
                        href="#">
                        <span class="pbminfotech-box-number">04</span>
                        <span>Modular Furniture Design & Build</span>
                    </a>
                </h3>
                <video
                    src="https://damiancorporate.com/assets/images/All_Media%2Fhomepage%2F2024-10-23%2FDamian_corporates_All_Media_homepage_2024-07-09_Damian_corporates_Modular%20Furniture%20Design%20&%20Build.mp4?generation=1729686325406726&alt=media"
                    autoplay muted loop playsinline height="90%" width="100%"></video>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio-Mobile-Section -->

    <!--Testimonial-section-->
    <div class="tp-testimonial-2-area p-relative fix">
        <div class="container-fluid home-testimonial-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-testimonial-2-title-box text-end mb-20">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Testimonials</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-center testimonial-info-sec">
                <div class="col-xl-3 col-lg-3 col-md-3 col">
                    <div class="tp-testimonial-2-thumb">
                        <img src="{{ asset('frontend/assets/img/testimonial/testimonials-img.jpg') }}" alt="testimonials-img" title="testimonials-img" />
                    </div>
                </div>
                <img src="{{ asset('frontend/assets/img/testimonial/chair.png') }}" style="animation-duration:3s;" class="shape-chair wow bounceInRight" alt="chair" title="chair" />
                <div class="col-xl-9 col-lg-9 col-md-9">
                    <div class="tp-testimonial-2-wrapper p-relative">
                        <div class="swiper-container tp-testimonial-2-active">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $key => $value)
                                    <div class="swiper-slide">
                                        <div class="tp-testimonial-2-content">
                                            <div class="tp-testimonial-2-author-info">
                                                <h5>{{ $value->name ?? '' }}</h5>
                                                <p>{{ $value->designation ?? '' }}</p>
                                            </div>
                                            <div class="tp-testimonial-2-text">
                                                <p class="text-justify">{!! $value->description ?? '' !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="tp-testimonial-2-arrow-box d-none d-xl-block">
                            <button class="testimonial-prev">
                                <img src="{{ asset('frontend/assets/img/icon/left-chevron.png') }}" width="30" alt="left-chevron.png" title="left-chevron.png">
                            </button>
                            <button class="testimonial-next">
                                <img src="{{ asset('frontend/assets/img/icon/right-chevron.png') }}" width="30" alt="right-chevron.png" title="right-chevron.png">
                            </button>
                        </div> --}}
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
                        <form method="POST" action="{{ route('send-contact-email') }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="text" name="name" id="name"
                                            style="color: #f4f4f4 !important;"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Name *">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <img width="17px" src="{{ asset('frontend/assets/img/icon/user.png') }}"  alt="user.png" title="user.png"/>
                                            </span>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="email" name="email" id="email"
                                            style="color: #f4f4f4 !important;"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Emai Id *">
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
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="text" maxlength="10" name="phone" id="phone"
                                            style="color: #f4f4f4 !important;"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}" placeholder="Your Phone *">
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
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="text" name="address" id="address"
                                            style="color: #f4f4f4 !important;"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address') }}" placeholder="Address *">
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
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="tp-contact-textarea-box" style="text-align: left !important;">
                                        <textarea placeholder="Messege" rows="5" name="messege" id="messege" style="color: #f4f4f4 !important;"
                                            class="form-control @error('messege') is-invalid @enderror" value="{{ old('messege') }}">{{ old('messege') }}</textarea>
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
                                        @error('messege')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="tp-btn-border height w-100"><span>Send Message</span></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-contact-left">
                        <img src="{{ asset('/frontend/assets/img/contact/get-in-touch-img.jpeg') }}" alt="get-in-touch-img" title="get-in-touch-img" />
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
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="600"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy"
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
        function updateVisibleItems() {
            const windowWidth = $(window).width();
            let initialVisible, loadMoreCount;

            if (windowWidth >= 1200) {
                // For large screens
                initialVisible = 9;
                loadMoreCount = 3;
            } else if (windowWidth >= 992) {
                // For medium screens
                initialVisible = 6;
                loadMoreCount = 2;
            } else {
                // For small screens
                initialVisible = 5;
                loadMoreCount = 2;
            }

            // Hide all items
            $(".tp-project-2-wrapper .col-md-6").hide();

            // Show initial visible items
            $(".tp-project-2-wrapper .col-md-6").slice(0, initialVisible).show();

            // Adjust Load More button
            if ($(".tp-project-2-wrapper .col-md-6:hidden").length === 0) {
                $(".load-more").css('visibility', 'hidden');
            } else {
                $(".load-more").css('visibility', 'visible');
            }

            // Attach click event to Load More button
            $("body").off('click', '.load-more').on('click', '.load-more', function(e) {
                e.preventDefault();
                $(".tp-project-2-wrapper .col-md-6:hidden").slice(0, loadMoreCount).slideDown();
                if ($(".tp-project-2-wrapper .col-md-6:hidden").length === 0) {
                    $(".load-more").css('visibility', 'hidden');
                }
            });
        }

        // Run on page load
        updateVisibleItems();

        // Update on window resize
        $(window).resize(function() {
            updateVisibleItems();
        });
    });
</script>
@endpush
