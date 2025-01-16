@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - My Profile
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
                       <span><a href="{{ route('frontend.home') }}" title="Home">Home</a></span>
                       <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                       <span>My Profile</span>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
    <!-- breadcrumb area end -->

    <!-- My Account Section Start -->
    <section class="my-profile-section">
        <div class="container">
            <div class="row">
                <!-- Tab Menu -->
                <x-frontend.tab-menu />

                <!-- Tab Content -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel" aria-labelledby="dashboad-tab">
                            <div class="dash-cont-sec">
                                <h3>Dashboard</h3>
                                <div class="welcome">
                                    <p>
                                        Hello, Lorem Ipsum (If not Lorem Ipsum !<a href="login.html" class="logout">
                                        Logout</a>)
                                    </p>
                                </div>
                                <p>
                                    From your account dashboard you can view your <a href="#">recent orders</a>, manage
                                    your <a href="#">shipping and billing addresses</a>, and <a href="#">edit your
                                    password and account details</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
     </section>
    <!-- My Account Section End -->

@endsection

@push('scripts')

@endpush
