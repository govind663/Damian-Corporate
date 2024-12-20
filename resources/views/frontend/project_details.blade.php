@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Project Details of {{ $project->project_name }}
@endsection

@push('styles')
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-section breadcrumb__pt" style="background-image: url({{ asset('/damian_corporate/project/project_image/' . $project->project_image) }});">
        <div class="breadcrumb__area breadcrumb__height p-relative fix">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__section-title-box mb-20">
                                <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Project Details</h3>
                            </div>
                            <div class="breadcrumb__list">
                                <span><a href="{{ route('frontend.home') }}">Home</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>Project Details</span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>{{ $project->project_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Projects Details area start -->
    <div class="tp-project-details-area pt-70 pb-70">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="postbox__thumb w-img">
                        <div class="postbox__thumb-slider p-relative">
                            <div class="swiper-container postbox__thumb-slider-active project-details-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/img/portfolio/Commercial Design & Build/balaji-wafers-head-office/1.jpg') }}" alt="1.jpg">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/img/portfolio/Commercial Design & Build/balaji-wafers-head-office/2.jpg') }}" alt="2.jpg">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/img/portfolio/Commercial Design & Build/balaji-wafers-head-office/3.jpg') }}" alt="3.jpg">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/img/portfolio/Commercial Design & Build/balaji-wafers-head-office/4.jpg') }}" alt="4.jpg">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/img/portfolio/Commercial Design & Build/balaji-wafers-head-office/5.jpg') }}" alt="5.jpg">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ asset('frontend/assets/img/portfolio/Commercial Design & Build/balaji-wafers-head-office/6.jpg') }}" alt="6.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="postbox__slider-arrow-wrap d-none d-sm-block">
                                <button class="postbox-arrow-prev">
                                    <i class="fa-sharp fa-regular fa-arrow-left"></i>
                                </button>
                                <button class="postbox-arrow-next">
                                    <i class="fa-sharp fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            <div class="tp-project-details-left-box project-details-left-box">
                                <ul>
                                    <li class="ps-0">
                                        <div class="project-icon-box">
                                            <img src="{{ asset('frontend/assets/img/icon/building-2.png') }}" alt="">
                                        </div>
                                        <div class="project-content-box">
                                            <p class="mb-0">Title:</p>
                                            <h3 class="rc__post-title">
                                                <a href="#">{{ $project->project_name }}</a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li class="ps-0">
                                        <div class="project-icon-box">
                                            <img src="{{ asset('frontend/assets/img/icon/category.png') }}" alt="">
                                        </div>
                                        <div class="project-content-box">
                                            <p class="mb-0">Category:</p>
                                            <h3 class="rc__post-title">
                                                <a href="#">{{ $project->category?->category_name }}</a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li class="ps-0">
                                        <div class="project-icon-box">
                                            <img src="{{ asset('frontend/assets/img/icon/location-2.png') }}" alt="">
                                        </div>
                                        <div class="project-content-box">
                                            <p class="mb-0">Location:</p>
                                            <h3 class="rc__post-title">
                                                <a href="#">Rajkot, Gujarat</a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li class="ps-0">
                                        <div class="project-icon-box">
                                            <img src="{{ asset('frontend/assets/img/icon/ruler.png')  }}" alt="">
                                        </div>
                                        <div class="project-content-box">
                                            <p class="mb-0">Total Constructed Area:</p>
                                            <h3 class="rc__post-title">
                                                <a href="#">60,000 Sq.Ft.</a>
                                            </h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="tp-project-details-content pt-45">
                                <h5 class="tp-project-2-title project-detail-">Project Description:</h5>
                                <p class="mb-0 text-justify">
                                    The Balaji Wafers Head Office, designed & executed by Damian Corporate.
                                    Seamlessly blending sustainability, contemporary design, and green architecture, it
                                    sets a new standard in Rajkot City. Natural elements, expansion space, and modern
                                    aesthetics converge to create a functional yet visually striking workspace,
                                    reflecting the brand's ethos of innovation and progress.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects Details area end -->


    <!-- Projects Details area end -->
    <div class="related-project pt-50 pb-50">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-gallery-title-box text-center mb-60">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Related Projects</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <!-- Slider main container -->
                    <div class="swiper-container related-project-active">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper related-project-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide related-project-slide">
                                <div class="tp-team-area tp-team-style-2">
                                    <div class="tp-team-title-wrap">
                                        <div class="tp-team-wrapper">
                                            <div class="tp-team-active">
                                                <div class="tp-team-item">
                                                    <div class="tp-team-thumb p-relative fix mb-25">
                                                        <img src="{{ asset('frontend/assets/img/portfolio/Commercial Design & Build/Balaji Wafers Head Office/balaji-wafers-head-office-1.jpg') }}" alt="balaji-wafers-head-office-1.jpg">
                                                        <div class="project-info">
                                                            <h4 class="tp-project-2-title">
                                                                <a href="balaji-wafers-head-office.html">
                                                                    Balaji Wafers Head Office
                                                                </a>
                                                            </h4>
                                                            <p>Commercial</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide related-project-slide">
                                <div class="tp-team-area tp-team-style-2">
                                    <div class="tp-team-title-wrap">
                                        <div class="tp-team-wrapper">
                                            <div class="tp-team-active">
                                                <div class="tp-team-item">
                                                    <div class="tp-team-thumb p-relative fix mb-25">
                                                        <img src="{{ asset('frontend/assets/img/portfolio/Residential Design & Build/Ahuja Residence/ahuja-residence-1.jpeg') }}" alt="ahuja-residence-1.jpeg">
                                                        <div class="project-info">
                                                            <h4 class="tp-project-2-title">
                                                                <a href="#">Ahuja Residence</a>
                                                            </h4>
                                                            <p>Residential</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tp-team-area tp-team-style-2">
                                    <div class="tp-team-title-wrap">
                                        <div class="tp-team-wrapper">
                                            <div class="tp-team-active">
                                                <div class="tp-team-item">
                                                    <div class="tp-team-thumb p-relative fix mb-25">
                                                        <img src="{{ asset('frontend/assets/img/portfolio/Architectural Design & Build/Armstrong/1.jpg') }}" alt="1.jpg">
                                                        <div class="project-info">
                                                            <h4 class="tp-project-2-title">
                                                                <a href="#">Armstrong</a>
                                                            </h4>
                                                            <p>Architectural</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related-project-arrow-box">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
       var mySwiper = new Swiper('.related-project-active', {
          spaceBetween: 30,
          loop: true,
          navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
          },
          breakpoints: {
             576: {
                slidesPerView: 1,
             },
             768: {
                slidesPerView: 2,
             },
             992: {
                slidesPerView: 3,
             }
          }
       });
    });
 </script>
@endpush
