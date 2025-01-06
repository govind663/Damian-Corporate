@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Blogs
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
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-section breadcrumb__pt services-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumbs/blog-breadcrumb.jpg') }}) !important;">
        <div class="breadcrumb__area breadcrumb__height p-relative fix">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__section-title-box mb-20">
                                <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Blogs</h3>
                            </div>
                            <div class="breadcrumb__list">
                                <span><a href="{{ route('frontend.home') }}">Home</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>Blogs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Blog area start -->
    <div class="postbox__area blog-area pt-70 pb-70">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 mb-50">
                    <div class="blog-wrapper">
                        @foreach ($blogs as $blog)
                            <article class="postbox__item blog-item format-image mb-40">
                                <div class="postbox__thumb m-img mb-20">
                                    <div class="postbox__thumb-text-2 d-none d-md-block">
                                        <span>{{ $blog->blog_category?->category_name }}</span>
                                    </div>
                                    <a href="{{ route('frontend.blog_details', $blog->id) }}">
                                        <img src="{{ asset('/damian_corporate/blog/blog_image/' . $blog->blog_image) }}" alt="{{ $blog->blog_title }}">
                                    </a>
                                </div>
                                <div class="postbox__content-2">
                                    <h3 class="postbox__title blog-list-title tp-split-text tp-split-in-right pb-10">
                                        <a href="{{ route('frontend.blog_details', $blog->id) }}">{{ $blog->blog_title }}</a>
                                    </h3>
                                    <div class="blog-content">
                                        <p class="mb-0 text-justify">
                                            {!! Str::limit($blog->description, 530) !!}
                                        </p>
                                    </div>
                                </div>

                                <div class="postbox__read-more blog-read-more-button">
                                    <a href="{{ route('frontend.blog_details', $blog->id) }}" class="tp-btn-border-bottom p-relative">
                                        <span>
                                            Read More
                                            <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.3536 4.35355C10.5488 4.15829 10.5488 3.84171 10.3536 3.64645L7.17157 0.464467C6.97631 0.269205 6.65973 0.269204 6.46447 0.464467C6.2692 0.659729 6.2692 0.976311 6.46447 1.17157L9.29289 4L6.46447 6.82843C6.2692 7.02369 6.2692 7.34027 6.46447 7.53553C6.65973 7.7308 6.97631 7.7308 7.17157 7.53553L10.3536 4.35355ZM-4.37114e-08 4.5L10 4.5L10 3.5L4.37114e-08 3.5L-4.37114e-08 4.5Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                        <span class="bottom-line"></span>
                                    </a>
                                </div>
                            </article>
                        @endforeach

                        <div class="basic-pagination">
                            <nav>
                                <ul>
                                    {{-- Display Current Page and Total Pages --}}
                                    <li class="page-item disabled">
                                        <span class="page-link" aria-current="page" tabindex="-1" aria-disabled="true" style="color: #faf3f3; font-weight: 600px;">
                                            <b>Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} results</b>
                                        </span>
                                    </li>

                                    {{-- Pagination Links --}}
                                    <b>{{ $blogs->links('pagination::bootstrap-4') }}</b>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 mb-50">
                    <div class="sidebar__wrapper blog-sidebar-area">
                        <div class="sidebar__widget blog-sidebar-bg sidebar__widget-theme-bg mb-30">
                            <div class="sidebar__widget-content">
                                <div class="sidebar__search">
                                    <form action="#">
                                        <div class="sidebar__search-input-2">
                                            <input type="text" placeholder="Search here">
                                            <button type="submit"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget blog-sidebar-bg mb-30">
                            <h3 class="sidebar__widget-title blog-sidebar-title">Our Latest Post</h3>
                            <div class="sidebar__widget-content">
                                <div class="sidebar__post">
                                    @foreach ($blogs as $blog)
                                    <div class="rc__post mb-25 d-flex align-items-center">
                                        <div class="rc__post-thumb blog-sidebar-thumb-img mr-20">
                                            <a href="{{ route('frontend.blog_details', $blog->id) }}">
                                                <img src="{{ asset('/damian_corporate/blog/blog_image/' . $blog->blog_image) }}" alt="{{ $blog->blog_title }}">
                                            </a>
                                        </div>
                                        <div class="rc__post-content">
                                            <div class="rc__meta blog-list-box">
                                                <span>
                                                    <i class="fa-light fa-clock"></i>
                                                    {{ \Carbon\Carbon::parse($blog->inserted_at)->format('F d, Y') }}
                                                </span>
                                            </div>
                                            <h3 class="rc__post-title">
                                                <a href="blog-details.html">
                                                    {{ $blog->blog_title }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__widget blog-sidebar-bg mb-30">
                            <h3 class="sidebar__widget-title blog-sidebar-title">Catagories</h3>
                            <div class="sidebar__widget-content">
                                <ul>
                                    @foreach ($blogCategories  as $blogCategory)
                                    <li class="mb-10">
                                        <a href="#" class="d-flex align-items-center" style="font-size: 14px !important;">{{ $blogCategory->category_name }}
                                            <span class="ml-auto float-right"><i class="fa-sharp fa-solid fa-arrow-right"></i></span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar__widget blog-sidebar-bg mb-30">
                            <h3 class="sidebar__widget-title blog-sidebar-title">Tags</h3>
                            <div class="sidebar__widget-content">
                                <div class="tagcloud">
                                    @foreach (explode(',', $blog->tags) as $tag)
                                        <a href="#">{{ trim($tag) }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog area end -->

    <!-- contact area start -->
    <div class="tp-contact-area p-relative black-bg fix pt-70 pb-70 z-index">
        <div class="tp-contact-shape-1">
            <img src="{{ asset('frontend/assets/img/contact/shape-1-1.png') }}" alt="">
        </div>
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-contact-left">
                        <div class="tp-contact-title-box mb-20">
                            <!-- <span class="tp-section-subtitle tp-split-text tp-split-in-right">Message</span> -->
                            <h3 class="tp-section-title text-white tp-split-text tp-split-in-right">
                                Get in Touch with Our Designing Experts</h3>
                        </div>
                        <p class="text-justify">
                            Nemo design enim ipsam voluptatem quim voluptas sit aspernatur aut odit
                            auting fugit sed thisnquia consequuntur magni dolores eos designer heresm
                            qui ratione
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
                    <div class="tp-contact-right">
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-20">
                                    <div class="tp-contact-input-box">
                                        <input type="text" placeholder="Your Name">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <img width="17px" src="./assets/img/icon/user.png" />
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
                                <div class="col-lg-12 mb-20">
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
                                        <textarea placeholder="Write Message.."></textarea>
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
            </div>
        </div>
    </div>
    <!-- contact area end -->

@endsection

@push('scripts')
@endpush
