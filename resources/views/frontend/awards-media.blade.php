@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Awards & Media
@endsection

@push('styles')
<!-- Fancybox CSS -->
<link href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" rel="stylesheet">
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-section breadcrumb__pt services-breadcrumb"
        style="background-image: url({{ asset('frontend/assets/img/breadcrumbs/awards-banner.jpeg') }}) !important;">
        <div class="breadcrumb__area breadcrumb__height p-relative fix">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__section-title-box mb-20">
                                <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Awards & Media</h3>
                            </div>
                            <div class="breadcrumb__list">
                                <span><a href="index.html">Home</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>Awards & Media</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- awards media area start -->
    <div class="awards-media-area-2 pt-70 pb-70">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-team-title-box text-center">
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Our Achievements</h3>
                    </div>
                </div>

                @foreach ($award_medias as $award_media)
                    <div class="col-md-3 col-sm-6">
                        <div class="awards-media-grid">
                            <div class="awards-media-image">
                                <a href="{{ asset('/damian_corporate/award_media/award_image/' . $award_media->award_image) }}"
                                   data-fancybox="awards-gallery"
                                   data-caption="{{ $award_media->description ?? 'Achievement' }}">
                                    <img class="pic-1"
                                         src="{{ asset('/damian_corporate/award_media/award_image/' . $award_media->award_image) }}"
                                         alt="{{ $award_media->award_image ?? '' }}"
                                         style="height: 450px !important;">
                                </a>
                            </div>
                            <div class="awards-media-content">
                                <h3 class="awards-media-title" style="min-height: 40">{!! $award_media->description ?? '' !!}</h3>
                                <div class="awards-media-year">{{ $award_media->year ?? '' }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- awards-media-section end -->
@endsection

@push('scripts')
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
@endpush
