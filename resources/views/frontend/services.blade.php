@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Services
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
                            <span>Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- service area start -->
    <div class="our-services-area pt-70 pb-70">
        <div class="container-fluid home-container">

            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-title-box text-center mb-30">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Our Services</h3>
                    </div>
                </div>
                @foreach ($ourServices as $value)
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-60" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                        <div class="serviceBox">
                            <div class="service-content service-one-area" style="background-image: url({{ asset('/damian_corporate/our_service/service_image/' . $value->service_image) }}) !important; background-size: cover !important;">
                                <div class="service-img">
                                    <img src="{{ asset('/damian_corporate/our_service/service_logo/' . $value->service_logo) }}" width="72" alt="{{ $value->service_logo }}">
                                </div>
                                <h4 class="services-title">
                                    {{ $value->service_title }}
                                </h4>
                                <p class="description" style="text-align: justify !important;">
                                    {!! $value->service_description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!-- project area start -->
    <div class="tp-project-area tp-project-style-2 portfolio-area fix">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-title-box text-center mb-30">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Projects</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="tp-project-filter masonary-menu text-center pb-60">
                        <!-- Dynamically Generated Category Buttons -->
                        @foreach ($categories as $category)
                            <button data-filter=".{{ Str::slug($category->category_name) }}" class="{{ request('category') == $category->id ? 'active' : '' }}" style="margin-bottom: 30px;">
                                <span>{{ $category->category_name ?? '' }}</span>
                            </button>
                        @endforeach
                        <!-- "All Projects" Button -->
                        <button data-filter="*" class="active"><span>All Projects</span></button>
                    </div>
                </div>
            </div>

            <div class="row grid">
                <!-- Dynamically Rendered Projects -->
                @foreach ($projects as $value)
                    <div class="col-lg-4 col-md-4 grid-item {{ Str::slug($value->category->category_name) }}">
                        <div class="p-relative portfolio-section-item">
                            <div class="box">
                                <img src="{{ asset('/damian_corporate/project/project_image/' . $value->project_image) }}" alt="{{ $value->project_image }}" style="width: 418.36px !important; height: 348.49px !important;">
                                <div class="box-content">
                                    <div class="inner-content">
                                        <h3 class="title">{{ $value->project_name }}</h3>
                                        <ul class="icon">
                                            <li>
                                                <a href="{{ route('frontend.project.details', $value->slug) }}" title="{{ $value->project_name }}" target="_blank">
                                                    <i class="fa fa-external-link"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- project area end -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                layoutMode: 'fitRows'
            });

            $('.tp-project-filter button').on('click', function () {
                $('.tp-project-filter button').removeClass('active');
                $(this).addClass('active');

                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });
        });
    </script>
@endpush
