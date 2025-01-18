@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Project Details of {{ $project->project_name }}
@endsection

@push('styles')
<style>
    .bre-sec {
        background-image: url(https://www.mbihosting.in/damiancorporate/demo1/assets/img/footer/footer-background.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 139px !important;
    }
    .bre-sec .breadcrumb-content {
        padding: 100px 0 0;
    }
</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="bre-sec">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}" title="Home">Home</a></span>
                            <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                            <span><a href="{{ route('frontend.services') }}" title="Home">Projects</a></span>
                            <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                            <span>{{ $project->project_name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Projects Details area start -->
    <div class="tp-project-details-area project-details-section">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="postbox__thumb w-img">
                        <div class="postbox__thumb-slider p-relative">
                            <div class="swiper-container postbox__thumb-slider-active project-details-slider">
                                @if(isset($banner_image))
                                    @php
                                        // Decode the JSON string to get the array of banner images
                                        $bannerImages = json_decode($banner_image, true);
                                    @endphp

                                    <div class="swiper-wrapper">
                                        @if(!empty($bannerImages) && is_array($bannerImages))
                                            @foreach($bannerImages as $image)
                                                <div class="swiper-slide">
                                                    <a href="{{ asset('/damian_corporate/project_details/banner_image/' . $image) }}" data-lightbox="project-gallery">
                                                        <img src="{{ asset('/damian_corporate/project_details/banner_image/' . $image) }}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No images available.</p>
                                        @endif
                                    </div>
                                @else
                                    <p>Banner image data is not available.</p>
                                @endif
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
                                            <img src="{{ asset('frontend/assets/img/icon/building-2.png') }}" alt="building-2.png" title="building-2.png">
                                        </div>
                                        <div class="project-content-box">
                                            <p class="mb-0">Title:</p>
                                            <h3 class="rc__post-title">
                                                {{ $project->project_name }}
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
                                                {{ $project->category?->category_name }}
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
                                                <a href="{{ $projectDetails->location_url ?? '#' }}" title=" {{ $projectDetails->location ?? '' }}" rel="noopener noreferrer">
                                                    {{ $projectDetails->location }}
                                                </a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li class="ps-0">
                                        <div class="project-icon-box">
                                            <img src="{{ asset('frontend/assets/img/icon/ruler.png')  }}" alt="ruler.png" title="ruler.png">
                                        </div>
                                        <div class="project-content-box">
                                            <p class="mb-0">Total Constructed Area:</p>
                                            <h3 class="rc__post-title">
                                                {{ $projectDetails->total_constructed_area ?? '' }}
                                            </h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="tp-project-details-content pt-45">
                                <h5 class="tp-project-2-title project-detail-">Project Description:</h5>
                                <p class="mb-0 text-justify" style="text-align: justify !important;">
                                    {!! $projectDetails->project_description ?? '' !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- Projects Details area end -->


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
                            @foreach ($relatedProjects as $relatedProject)
                            <!-- Slide -->
                            <div class="swiper-slide related-project-slide">
                                <div class="tp-team-area tp-team-style-2">
                                    <div class="tp-team-title-wrap">
                                        <div class="tp-team-wrapper">
                                            <div class="tp-team-active">
                                                <div class="tp-team-item">
                                                    <div class="tp-team-thumb p-relative fix mb-25">
                                                        <img src="{{ asset('/damian_corporate/project/project_image/' . $relatedProject->project_image) }}" alt="{{ $relatedProject->project_name }}">
                                                        <div class="project-info">
                                                            <h4 class="tp-project-2-title">
                                                                <a href="{{ route('frontend.project.details', $relatedProject->slug) }}">
                                                                    {{ $relatedProject->project_name }}
                                                                </a>
                                                            </h4>
                                                            <p>{{ $relatedProject->category->name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="related-project-arrow-box">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var relatedProjectSwiper = new Swiper('.related-project-active', {
            spaceBetween: 30, // Space between slides
            loop: true, // Enable looping
            navigation: {
                nextEl: '.swiper-button-next', // Next button selector
                prevEl: '.swiper-button-prev', // Previous button selector
            },
            breakpoints: {
                576: {
                    slidesPerView: 1, // 1 slide per view for small screens
                },
                768: {
                    slidesPerView: 2, // 2 slides per view for tablets
                },
                992: {
                    slidesPerView: 3, // 3 slides per view for desktops
                },
                1200: {
                    slidesPerView: 4, // 4 slides per view for larger screens
                }
            }
        });
    });
</script>

<script>
    var swiper = new Swiper('.postbox__thumb-slider-active', {
        loop: true,
        autoplay: {
            delay: 3000, // Adjust the delay as needed
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.postbox-arrow-next',
            prevEl: '.postbox-arrow-prev',
        },
        slidesPerView: 1,
        spaceBetween: 10,
    });
</script>


<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'alwaysShowNavOnTouchDevices': true,
        'showImageNumberLabel': false,
        'keyPress': false,
        'fadeDuration': 500,
        'imageFadeDuration': 500,
        'disableScrolling': true,
        'disableScrollingOnTouch': true,
        'disableScrollingOnMobile': true,
        'disableScrollingOnDesktop': true,
        'disableScrollingOnTablet': true,
        'disableScrollingOnLaptop': true,
        'disableScrollingOnMonitor': true
    });
</script>
@endpush
