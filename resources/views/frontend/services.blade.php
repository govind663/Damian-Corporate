@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Services
@endsection

@push('styles')
<style>
    .tp-project-filter button.active {
        color: var(--tp-common-white);
        background-color: var(--tp-theme-1);
    }

    .tp-project-filter button {
        color: #ffffff !important;
        font-family: Averta-Regular;
        font-size: 14px;
    }
    .tp-project-filter button {
        color: #24231D;
        font-size: 12px;
        /* font-weight: 500; */
        letter-spacing: 1.2px;
        text-transform: capitalize;
        height: 60px;
        line-height: 60px;
        padding: 0 20px;
        margin: 0 12px;
        border: 1px solid var(--tp-theme-1);
    }

    .portfolio-area .box img {
        width: 100%;
        height: auto;
        transform: scale3d(1.1, 1.1, 1);
        transition: all 0.25s linear;
    }

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
                            <span>Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- service area start -->
    <div class="our-services-area pt-70">
        <div class="container-fluid home-container">

            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-title-box text-center mb-30">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Our Services</h3>
                    </div>
                </div>
                @foreach ($ourServices as $value)
                    <div class="col-lg-6 col-md-12 col-sm-12 mb-30" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                        <div class="serviceBox">
                            <div class="service-content service-one-area" style="background-image: url({{ asset('/damian_corporate/our_service/service_image/' . $value->service_image) }}) !important; background-size: cover !important;">
                                <div class="service-img">
                                    <img src="{{ asset('/damian_corporate/our_service/service_logo/' . $value->service_logo) }}" width="72" alt="{{ $value->service_logo }}" title="{{ $value->service_logo }}">
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
    <div class="tp-project-area tp-project-style-2 portfolio-area project-tab-sec fix">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-title-box text-center mb-30">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Projects</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="tp-project-filter masonary-menu text-center pb-30">
                        <!-- Dynamically Generated Category Buttons -->
                        @foreach ($categories as $category)
                            <button data-filter=".{{ Str::slug($category->category_name) }}"
                                class="{{ request('category') == $category->id ? 'active' : '' }}"
                                style="margin-bottom: 30px;"
                                data-category="{{ $category->id }}">
                                @php
                                    $categoryName = '';
                                    if ($category->unique_number == '1') {
                                        $categoryName = 'Architectural';
                                    } elseif ($category->unique_number == '2') {
                                        $categoryName = 'Residential';
                                    } elseif ($category->unique_number == '3') {
                                        $categoryName = 'Commercial';
                                    } elseif ($category->unique_number == '4') {
                                        $categoryName = 'Hospitality';
                                    } elseif ($category->unique_number == '5') {
                                        $categoryName = 'Modular Furniture & Partition Systems';
                                    }
                                @endphp
                                <span>{{ $categoryName }}</span>
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
                                <img src="{{ asset('/damian_corporate/project/project_image/' . $value->project_image) }}" alt="{{ $value->project_image }}" title="{{ $value->project_image }}">
                                <div class="box-content">
                                    <div class="inner-content">
                                        <h3 class="title">{{ $value->project_name }}</h3>
                                        <ul class="icon">
                                            <li>
                                                <a href="{{ route('frontend.project.details', $value->slug) }}"  title="{{ $value->project_name }}">
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
<!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Then include Isotope -->
<script src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>

<script>
    $(document).ready(function () {
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });

        // Handle category button clicks
        $('.tp-project-filter button').on('click', function () {
            var categoryId = $(this).data('category');
            var filterValue = $(this).attr('data-filter');

            // Update the URL with the selected category
            var url = new URL(window.location);
            url.searchParams.set('category', categoryId);
            window.history.pushState({}, '', url);

            // Set active class for the clicked button
            $('.tp-project-filter button').removeClass('active');
            $(this).addClass('active');

            // Filter the grid items
            $grid.isotope({ filter: filterValue });
        });

        // Retain the filter state on page load based on URL parameter
        var categoryParam = new URLSearchParams(window.location.search).get('category');
        if (categoryParam) {
            var activeButton = $('.tp-project-filter button[data-category="' + categoryParam + '"]');
            activeButton.addClass('active');
            var filterValue = activeButton.attr('data-filter');
            $grid.isotope({ filter: filterValue });
        }
    });
</script>
@endpush
