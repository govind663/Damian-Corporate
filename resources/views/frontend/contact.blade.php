@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Contact US
@endsection

@push('styles')
<style>
    .tp-form-input-box input {
        color: #f4f4f4 !important;
    }

    .careers-input-box input {
        height: 66px !important;
    }

    .{
        padding: 0.375rem .75rem;
        font-size: 1rem;
        font-weight: 900px;
        background-color: transparent !important;
    }

    .careers-dropdown-select .nice-select {
        height: 65px !important;
    }

    .careers-textarea textarea {
        height: 320px !important;
    }

    .tp-form-textarea-box textarea {
        color: #fffdfd !important;
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

    .invalid-feedback{
        color: rgb(253, 253, 253);
        font-weight: 600;
    }

    .form-control.is-invalid, .was-validated .form-control:invalid {
        border-color: #ece8e9;
        background-image: none !important;
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
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- contact area start -->
    <div class="tp-contact-area p-relative fix pt-70 pb-70 contact-us-one-sec">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="tp-contact-left">
                        <div class="tp-contact-title-box mb-20">
                            <h3 class="tp-section-title text-white tp-split-text tp-split-in-right">
                                Let's
                                Get In Touch
                            </h3>
                        </div>
                    </div>
                    <div class="tp-contact-box">
                        <ul>
                            <li>
                                <div class="tp-contact-item d-flex align-items-center">
                                    <div class="tp-contact-icon-2">
                                        <span>
                                            <svg width="15" height="21" viewBox="0 0 15 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.5625 20.0312C4.53125 17.4922 0 11.4375 0 8C0 3.85938 3.32031 0.5 7.5 0.5C11.6406 0.5 15 3.85938 15 8C15 11.4375 10.4297 17.4922 8.39844 20.0312C7.92969 20.6172 7.03125 20.6172 6.5625 20.0312ZM7.5 10.5C8.86719 10.5 10 9.40625 10 8C10 6.63281 8.86719 5.5 7.5 5.5C6.09375 5.5 5 6.63281 5 8C5 9.40625 6.09375 10.5 7.5 10.5Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="tp-contact-content">
                                        <h6 class="contact-heading content-header-area">Address</h6>
                                        <a href="{{ $location_link }}" target="_blank" class="text-white" title="Google Map">
                                            {{ $company_address }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tp-contact-item d-flex align-items-center">
                                    <div class="tp-contact-icon-2">
                                        <span>
                                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.125 0C19.1406 0 20 0.859375 20 1.875C20 2.5 19.6875 3.04688 19.2188 3.39844L10.7422 9.76562C10.2734 10.1172 9.6875 10.1172 9.21875 9.76562L0.742188 3.39844C0.273438 3.04688 0 2.5 0 1.875C0 0.859375 0.820312 0 1.875 0H18.125ZM8.47656 10.7812C9.375 11.4453 10.5859 11.4453 11.4844 10.7812L20 4.375V12.5C20 13.9062 18.8672 15 17.5 15H2.5C1.09375 15 0 13.9062 0 12.5V4.375L8.47656 10.7812Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="tp-contact-content">
                                        <h6 class="contact-heading content-header-area">Email</h6>
                                        <a href="mailto:{{ $company_informations->company_email ?? '' }}" class="text-white" title="Email">
                                            {{ $company_informations->company_email ?? '' }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="tp-contact-item d-flex align-items-center">
                                    <div class="tp-contact-icon-2">
                                        <span>
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.9609 15.6172L19.0234 19.5625C18.9062 20.1484 18.4375 20.5391 17.8516 20.5391C8.00781 20.5 0 12.4922 0 2.64844C0 2.0625 0.351562 1.59375 0.9375 1.47656L4.88281 0.539062C5.42969 0.421875 6.01562 0.734375 6.25 1.24219L8.08594 5.5C8.28125 6.00781 8.16406 6.59375 7.73438 6.90625L5.625 8.625C6.95312 11.3203 9.14062 13.5078 11.875 14.8359L13.5938 12.7266C13.9062 12.3359 14.4922 12.1797 15 12.375L19.2578 14.2109C19.7656 14.4844 20.0781 15.0703 19.9609 15.6172Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="tp-contact-content">
                                        <h6 class="contact-heading content-header-area">Phone number</h6>
                                        <a href="tel:+91-{{ $company_informations->company_phone ?? '' }}" class="text-white" title="Phone">
                                            +91-{{ $company_informations->company_phone ?? '' }}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7  wow tpfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
                    <div class="tp-contact-right contact-us-form-area">

                        <form method="POST" action="{{ route('send-contact-email') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="text" name="name" id="name" style="color: #f4f4f4 !important;" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name *">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <img width="17px" src="{{ asset('frontend/assets/img/icon/user.png') }}"  alt="user.png" title="user.png" />
                                            </span>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="email" name="email" id="email" style="color: #f4f4f4 !important;" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Emai Id *">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M14.9727 1.76172L13.2227 13.1094C13.1953 13.3828 13.0312 13.6289 12.7852 13.7656C12.6484 13.8203 12.5117 13.875 12.3477 13.875C12.2383 13.875 12.1289 13.8477 12.0195 13.793L8.68359 12.3984L7.28906 14.4766C7.17969 14.668 6.98828 14.75 6.79688 14.75C6.49609 14.75 6.25 14.5039 6.25 14.2031V11.5781C6.25 11.3594 6.30469 11.168 6.41406 11.0312L12.375 3.375L4.33594 10.6211L1.51953 9.44531C1.21875 9.30859 1 9.03516 1 8.67969C0.972656 8.29688 1.13672 8.02344 1.4375 7.85938L13.6875 0.886719C13.9609 0.722656 14.3438 0.722656 14.6172 0.914062C14.8906 1.10547 15.0273 1.43359 14.9727 1.76172Z"
                                                        fill="currentcolor"
                                                    />
                                                </svg>
                                            </span>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="text" maxlength="10" name="phone" id="phone" style="color: #f4f4f4 !important;" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Your Phone *">
                                        <div class="tp-contact-icon">
                                            <span>
                                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.9727 11.332L13.3164 14.0938C13.2344 14.5039 12.9062 14.7773 12.4961 14.7773C5.60547 14.75 0 9.14453 0 2.25391C0 1.84375 0.246094 1.51562 0.65625 1.43359L3.41797 0.777344C3.80078 0.695312 4.21094 0.914062 4.375 1.26953L5.66016 4.25C5.79688 4.60547 5.71484 5.01562 5.41406 5.23438L3.9375 6.4375C4.86719 8.32422 6.39844 9.85547 8.3125 10.7852L9.51562 9.30859C9.73438 9.03516 10.1445 8.92578 10.5 9.0625L13.4805 10.3477C13.8359 10.5391 14.0547 10.9492 13.9727 11.332Z"
                                                        fill="currentcolor"
                                                    />
                                                </svg>
                                            </span>
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-20">
                                    <div class="tp-contact-input-box" style="text-align: left !important;">
                                        <input type="text" name="address" id="address" style="color: #f4f4f4 !important;" class="@error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Address *">
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
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="tp-contact-textarea-box" style="text-align: left !important;">
                                        <textarea placeholder="Messege" rows="5" name="messege" id="messege" style="color: #f4f4f4 !important;" class="@error('messege') is-invalid @enderror" value="{{ old('messege') }}" >{{ old('messege') }}</textarea>
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
                                        @error('messege')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-30">
                                    <div class="tp-contact-textarea-box" style="display: flex; justify-content: center; text-align: center;">
                                        {!! NoCaptcha::display() !!}

                                        @error('g-recaptcha-response')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="tp-contact-input-btn" style="display: flex; justify-content: center; text-align: center;">
                                        <button class="tp-btn-border height"><span>Send Message</span></button>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

    <!-- maps section start -->
    <div class="maps-section">
        <!-- service area start -->
        <div class="tp-service-area pt-70 pb-70 maps-one-sec">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                        data-wow-delay=".3s">
                        <div class="tp-service-item">
                            <div class="tp-service-thumb-box p-relative">
                                <div class="tp-service-thumb">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3147.614091929121!2d72.8212547742511!3d19.052991752696336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c952c459fe63%3A0x4749213890924bcb!2sDamian%20Corporate%20Private%20Limited!5e1!3m2!1sen!2sin!4v1705318600227!5m2!1sen!2sin"
                                        width="100%" height="400" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="tp-service-content map-address-section text-center">
                                <h4 class="tp-service-title">
                                    <a href="https://maps.app.goo.gl/u9Cft4XDtCUsgnNz6" target="_blank" rel="noopener noreferrer" title="Corporate Office">
                                        Corporate Office</a>
                                    </h4>
                                <p>Damian Corporate Pvt Ltd, Damian House Ground Floor, 14, Hill Rd, Bandra
                                    West, Mumbai, Maharashtra 400050</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                        data-wow-delay=".3s">
                        <div class="tp-service-item">
                            <div class="tp-service-thumb-box p-relative">
                                <div class="tp-service-thumb">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6208.595870439674!2d73.06992300000002!3d19.267053!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bd45553ffb51%3A0x63e9daaa0ba97e79!2sDamian%20Corporate%20Private%20Limited!5e1!3m2!1sen!2sin!4v1709700990845!5m2!1sen!2sin"
                                        width="100%" height="400" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="tp-service-content map-address-section text-center">
                                <h4 class="tp-service-title">
                                    <a href="https://maps.app.goo.gl/jm6NX6vUddrv3txz7" target="_blank" rel="noopener noreferrer" title="Registered Office">
                                        Registered Office
                                    </a>
                                </h4>
                                <p>Damian Corporate Pvt Ltd, Bldg No. F10 Unit No. 19 & 20, Bhumi Industrial Park, Mumbai
                                    Nasik Highway, Pimplas, Bhiwandi, Maharashtra 421302</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30 wow tpfadeUp" data-wow-duration=".9s"
                        data-wow-delay=".3s">
                        <div class="tp-service-item">
                            <div class="tp-service-thumb-box p-relative">
                                <div class="tp-service-thumb">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6336.361679137069!2d73.81998!3d15.545676000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbfc01f2543afdf%3A0x2f0a71c59a261a16!2sDamian%20De%20Goa!5e1!3m2!1sen!2sin!4v1709701037583!5m2!1sen!2sin"
                                        width="100%" height="400" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                            <div class="tp-service-content map-address-section text-center">
                                <h4 class="tp-service-title">
                                    <a href="https://maps.app.goo.gl/CnDfih5JzHCN1BYi6"  target="_blank" rel="noopener noreferrer" title="Goa Office & Showroom">
                                        Goa Office & Showroom
                                    </a>
                                </h4>
                                <p>Damian de Goa 903/1, Damian House, Porvorim, Goa <br> 403501</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service area end -->
    </div>
    <!-- service area end -->
@endsection

@push('scripts')
{!! NoCaptcha::renderJs() !!}
@endpush
