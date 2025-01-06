@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Blogs Details
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
                                <span><a href="{{ route('frontend.blogs') }}">Blogs</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>{{ $blogs->blog_title }}</span>
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
                        <article class="postbox__item blog-item format-image mb-40">
                            <div class="postbox__thumb m-img mb-20">
                                <div class="postbox__thumb-text-2 d-none d-md-block">
                                    <span>{{ $blogs->blog_category?->category_name }}</span>
                                </div>
                                <img src="{{ asset('/damian_corporate/blog/blog_image/' . $blogs->blog_image) }}" alt="{{ $blogs->blog_title }}">
                            </div>
                            <div class="postbox__content-2">
                                <h3 class="postbox__title blog-list-title tp-split-text tp-split-in-right pb-10">
                                    {{ $blogs->blog_title ?? '' }}
                                </h3>
                                <div class="blog-content" style="color: #f7f1f1 !important; text-align:justify !important;">
                                    {!! $blogs->description ?? '' !!}
                                </div>
                            </div>
                        </article>

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
                                    @foreach ($latestPosts as $blog)
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
                                    @foreach (explode(',', $blogs->tags) as $tag)
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

@endsection

@push('scripts')
@endpush
