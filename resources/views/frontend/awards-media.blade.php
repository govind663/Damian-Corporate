@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Awards & Media
@endsection

@push('styles')
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
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/1-3.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/1-3.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Outstanding Designer & Entrepreneur Of The Year</h3>
                            <div class="awards-media-year">2023</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/1-4.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/1-4.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Most Prominent & Trusted Interior Design Firm of The Year
                            </h3>
                            <div class="awards-media-year">2023</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/awards-2.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/2-2-new.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Architecture & Interior Design Excellence & Conference</h3>
                            <div class="awards-media-year">2023</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/awards-4.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/4-1-new.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Trendsetter Architecture & Interior Design Awards</h3>
                            <div class="awards-media-year">2023</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/1-2.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/1-2.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Golden Door Award for Excellent Consultancy in Interior
                                Design</h3>
                            <div class="awards-media-year">2023</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/1-5.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/1-5.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Most Futuristic & Leading Interior Design Firm of the Year
                            </h3>
                            <div class="awards-media-year">2022</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/awards-1.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/1-1-new.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Architecture & Interior Design Excellence & Conference</h3>
                            <div class="awards-media-year">2022</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/1-1.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/1-1.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">40 under 40 Best & Trendsetter Interior Designer India</h3>
                            <div class="awards-media-year">2022</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/cty-1.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/1-6.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Company Of The Year Design & Build Firm</h3>
                            <div class="awards-media-year">2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/awards-3.jpg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/3-1-new.jpg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Archid <br> Mumbai</h3>
                            <div class="awards-media-year">2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/awards-5.jpeg" class="image"
                                data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/5-1-new.jpeg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Lorem ipsum dolor sit amet consectetur.</h3>
                            <div class="awards-media-year">----</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/awards-6.jpeg" class="image"
                                data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/6-1-new.jpeg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Enterprise NOC Inaugration Pune</h3>
                            <div class="awards-media-year">2010</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="awards-media-grid">
                        <div class="awards-media-image">
                            <a href="frontend/assets/img/awards-media/7-1-new.jpeg" class="image" data-lightbox="awards-gallery">
                                <img class="pic-1" src="frontend/assets/img/awards-media/7-1-new.jpeg">
                            </a>
                        </div>
                        <div class="awards-media-content">
                            <h3 class="awards-media-title">Eminent Jury Grand Stand Awards</h3>
                            <div class="awards-media-year">2023</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- awards-media-section end -->
@endsection

@push('scripts')
@endpush
