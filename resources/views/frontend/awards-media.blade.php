@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Awards & Media
@endsection

@push('styles')
<style>
    .awards-media-grid .awards-media-title {
        font-family: Averta-Regular !important;
        font-size: 20px !important;
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
                            <span><a href="{{ route('frontend.home') }}">Home</a></span>
                            <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                            <span>Awards & Media</span>
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
                    <div class="col-md-4 col-sm-6">
                        <div class="awards-media-grid">
                            <div class="awards-media-image">
                                {{-- <a href="{{ asset('/damian_corporate/award_media/award_image/' . $award_media->award_image) }}"
                                   data-fancybox="awards-gallery"
                                   data-caption="{{ $award_media->description ?? 'Achievement' }}">
                                    <img class="pic-1"
                                         src="{{ asset('/damian_corporate/award_media/award_image/' . $award_media->award_image) }}"
                                         alt="{{ $award_media->award_image ?? '' }}"
                                         style="height: auto; width: 100%;">
                                </a> --}}

                                <img class="pic-1"
                                    src="{{ asset('/damian_corporate/award_media/award_image/' . $award_media->award_image) }}"
                                    alt="{{ $award_media->award_image ?? '' }}"
                                    style="height: auto; width: 100%;">
                            </div>
                            <div class="awards-media-content">
                                <h2 class="awards-media-title" style="min-height: 40">{!! $award_media->description ?? '' !!}</h2>
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
@endpush
