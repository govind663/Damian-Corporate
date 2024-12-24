@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | About Us
@endsection

@push('styles')
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="bre-sec">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xxl-12">
                <div class="breadcrumb-content">
                    <div class="breadcrumb__list">
                        <span><a href="{{ route('frontend.home') }}">Home</a></span>
                        <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                        <span>About Us</span>
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
                            <h5 class="tp-section-title">{{ $introductions->title ?? '' }}</h5>
                        </div>
                        <div class="tp-team-details-text about-us-right-text pe-5 text-light" style="text-align: justify !important; font-family: Averta-Regular !important;">
                            {!! $introductions->description ?? '' !!}
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="tp-hero-thumb-box about-us-img-sec p-relative">
                            <div class="tp-hero-thumb about-us-thumb-sec wow fadeInLeft">
                                @if (!empty($introductions->introduction_image))
                                    <img src="{{ asset('/damian_corporate/introduction/introduction_image/'. $introductions->introduction_image) }}" alt="{{ $introductions->introduction_image }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero area end -->

    <!-- Showroom area start -->
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
                @foreach ($showrooms as $key => $value)
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-30 grid-item-2">
                        <div class="tp-project-3-item p-relative active">
                            <div class="tp-project-3-thumb">
                                <img src="{{ asset('/damian_corporate/showroom/office_image/'. $value->office_image) }}" alt="{{ $value->office_image }}">
                            </div>
                            <div class="tp-project-3-content about-content-area">
                                <span>{{ $value->office_name ?? '' }}</span>
                                <h5 class="tp-project-3-title showroom-sub-title">
                                    <a href="{{ $value->location_link ?? '#' }}">{{ $value->office_location ?? '' }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Showroom area end -->

    <!-- Manufacturing Facility area start -->
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
                                @foreach ($manufacturing_facilities as $value)
                                    <div class="swiper-slide">
                                        <div class="tp-project-2-item">
                                            <div class="tp-project-2-thumb mb-30">
                                                <img src="{{ asset('/damian_corporate/manufacturing_facility/manufacturing_facilitie_image/'. $value->manufacturing_facilitie_image) }}" alt="{{ $value->manufacturing_facilitie_image }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
    <!-- Manufacturing Facility area end -->

    <!-- Vision, Values & Strengths area start -->
    <div class="tp-team-details-area tp-team-details-inner-style vision-strength-area">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="tp-team-details-thumb vision-image-area text-sm-center">
                        @if (!empty($visions->image))
                            <img src="{{ asset('/damian_corporate/visions/image/'. $visions->image) }}" alt="{{ $visions->image }}" class="img-fluid" style="height: 640px !important;">
                        @endif
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="tp-team-details-wrap">
                        <div class="tp-team-author-info">
                            <h5 class="tp-section-title">
                                {{ $visions->title ?? '' }}
                            </h5>
                            <p class="tp-team-details-text text-justify">
                                {{ $visions->description ?? '' }}
                            </p>
                        </div>
                    </div>
                    <div class="tp-faq-area p-relative fix pt-20">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                                <div class="vision-values-content-section">
                                    @php
                                        $subTitles = json_decode($visions->sub_title ?? '[]', true);
                                        $subDescriptions = json_decode($visions->sub_description ?? '[]', true);
                                    @endphp

                                    @if (!empty($subTitles) && is_array($subTitles))
                                        @foreach ($subTitles as $index => $subTitle)
                                            <h4 class="vision-header-section">
                                                <i class="fa-solid fa-angles-right"></i>
                                                {{ $subTitle }}
                                            </h4>
                                            <p class="vision-description-section" style="padding-left: 20px;">
                                                {{ $subDescriptions[$index] ?? '' }}
                                            </p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vision, Values & Strengths area end -->

    <!-- Member section start -->
    @foreach ($teams as $value)
        <div class="board-directors-section pt-140">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="tp-blog-title-wrap mb-55">
                        <div class="col-xl-12">
                            <div class="tp-blog-title-box">
                                <span class="tp-section-subtitle tp-split-text tp-split-in-right directors-mega-header">
                                    {{ \Illuminate\Support\Str::afterLast($value->team_name ?? '', ' ') }}
                                </span>
                                <h3 class="tp-section-title tp-split-text tp-split-in-right directors-sub-header">
                                    {{ $value->team_name ?? '' }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    @if (isset($team_members[$value->id]) && $team_members[$value->id]->isNotEmpty())
                        @foreach ($team_members[$value->id] as $member)
                            <div class="col-xl-3 col-lg-3 col-md-6">
                                <div class="board-directors-grid">
                                    <div class="board-directors-image">
                                        <a href="#" class="image">
                                            <img class="pic-1" src="{{ asset('/damian_corporate/team_member/member_profile_image/' . $member->member_profile_image) }}" alt="{{ $member->member_profile_image }}" style="width: 269px !important; height: 480px !important;">
                                        </a>
                                        {{-- <ul class="board-directors-links">
                                            <li>
                                                <a href="#" class="linkedin">
                                                    <img src="{{ asset('frontend/assets/img/icon/linkedin.png') }}" alt="LinkedIn">
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                    <div class="board-directors-content">
                                        <h3 class="board-directors-title">
                                            {{ $member->name ?? '' }}
                                        </h3>
                                        <span class="board-directors-category">
                                            {{ $member->designation ?? '' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>There are no team members for this team.</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <!-- Member area end -->

    <!--International Associates Section-->
    <div class="inter-asso">
        <!-- team area start -->
        <div class="tp-team-area tp-team-style-2 tp-team-style-4 fix pt-80 pb-80 international-associates-area">
            <div class="container-fluid home-container">
                <div class="tp-team-title-wrap mb-60">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tp-team-title-box text-center">
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
                                    @foreach($international_associates as $associate)
                                        <div class="swiper-slide">
                                            <div class="tp-team-item black-bg">
                                                <div class="tp-team-thumb p-relative fix">
                                                    <img src="{{ asset('/damian_corporate/international_associate/international_associate_image/' . $associate->international_associate_image) }}" alt="{{ $associate->international_associate_image }}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
