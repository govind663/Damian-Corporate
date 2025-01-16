@php
    $company_informations = App\Models\CompanyInformation::orderBy("id","desc")->whereNull('deleted_at')->first();

    // Decode JSON data from the database
    $location_name = json_decode($company_informations->location_name ?? '[]', true);
    $company_address = json_decode($company_informations->company_address ?? '[]', true);
    $location_link = json_decode($company_informations->location_link ?? '[]', true);
@endphp
<!-- Footer Area Start -->
<footer class="main-footer">
    <div class="tp-footer-area tp-footer-style-2 pt-50 pb-50">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-6 mb-20">
                    <div class="tp-footer-widget footer-cols-2-1">
                        <div class="tp-footer-logo">
                            <a href="{{ route('frontend.home') }}" title="Damian Corporate">
                                @if($company_informations->company_logo)
                                    <img src="{{ asset('/damian_corporate/company_information/company_logo/' . $company_informations->company_logo) }}" alt="{{ $company_informations->company_logo }}" title="{{ $company_informations->company_logo }}">
                                @else
                                    <img src="{{ asset('frontend/assets/img/logo/damian-logo.png') }}" alt="damian-logo.png" title="Damian Corporate">
                                @endif
                            </a>
                        </div>
                        <div class="tp-footer-logo tp-footer-para pb-10" style="color: #ffffff !important; text-align: justify !important;">
                            <p>{!! $company_informations->company_description ?? '' !!}</p>
                        </div>

                        <form method="POST" action="{{ route('subscribe-newsletter') }}" class="cs_newsletter_form position-relative" enctype="multipart/form-data">
                            @csrf

                            <div class="tp-footer-input-box">
                                <input type="email" name="email_id" id="email_id" style="color: #f4f4f4 !important;" class="@error('email_id') is-invalid @enderror" value="{{ old('email_id') }}" placeholder="Emai here*">
                                @error('email_id')
                                    <span class="text-light">{{ $message }}</span>
                                @enderror
                                <div class="tp-footer-icon">
                                    <span>
                                        <button type="submit" class="btn btn-light" title="Subscribe">
                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.9727 1.76172L13.2227 13.1094C13.1953 13.3828 13.0312 13.6289 12.7852 13.7656C12.6484 13.8203 12.5117 13.875 12.3477 13.875C12.2383 13.875 12.1289 13.8477 12.0195 13.793L8.68359 12.3984L7.28906 14.4766C7.17969 14.668 6.98828 14.75 6.79688 14.75C6.49609 14.75 6.25 14.5039 6.25 14.2031V11.5781C6.25 11.3594 6.30469 11.168 6.41406 11.0312L12.375 3.375L4.33594 10.6211L1.51953 9.44531C1.21875 9.30859 1 9.03516 1 8.67969C0.972656 8.29688 1.13672 8.02344 1.4375 7.85938L13.6875 0.886719C13.9609 0.722656 14.3438 0.722656 14.6172 0.914062C14.8906 1.10547 15.0273 1.43359 14.9727 1.76172Z"
                                                    fill="currentcolor"
                                                />
                                            </svg>
                                        </button>
                                    </span>
                                 </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 mb-20">
                    <div class="tp-footer-widget footer-cols-2-2">
                        <h4 class="tp-footer-title">Quick Links</h4>
                        <div class="tp-footer-list">
                            <ul>
                                <li><a href="{{ route('frontend.about') }}" title="About Us"><i class="fa-solid fa-angles-right"></i>About Us</a></li>
                                <li><a href="{{ route('frontend.services') }}" title="Services"><i class="fa-solid fa-angles-right"></i>Services</a></li>
                                <li><a href="{{ route('frontend.products') }}" title="Store"><i class="fa-solid fa-angles-right"></i>Store</a></li>
                                <li><a href="{{ route('frontend.awards') }}" title="Awards & Media"><i class="fa-solid fa-angles-right"></i>Awards & Media</a></li>
                                {{-- <li><a href="{{ route('frontend.blogs') }}" title="Blogs"><i class="fa-solid fa-angles-right"></i>Blogs</a> </li> --}}
                                <li><a href="{{ route('frontend.careers') }}" title="Careers"><i class="fa-solid fa-angles-right"></i>Careers</a></li>
                                <li><a href="{{ route('frontend.contact') }}" title="Contact Us"><i class="fa-solid fa-angles-right"></i>Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-6 mb-20">
                    <div class="tp-footer-widget footer-cols-2-4">
                        <div class="tp-footer-contact-box">
                            <div class="tp-footer-contact">
                                <ul>
                                    @if (!empty($location_name) && !empty($company_address) && !empty($location_link))
                                        @foreach ($location_name as $index => $name)
                                            <li>
                                                <span>
                                                    <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.59375 14.4219C3.17188 12.6445 0 8.40625 0 6C0 3.10156 2.32422 0.75 5.25 0.75C8.14844 0.75 10.5 3.10156 10.5 6C10.5 8.40625 7.30078 12.6445 5.87891 14.4219C5.55078 14.832 4.92188 14.832 4.59375 14.4219ZM5.25 7.75C6.20703 7.75 7 6.98438 7 6C7 5.04297 6.20703 4.25 5.25 4.25C4.26562 4.25 3.5 5.04297 3.5 6C3.5 6.98438 4.26562 7.75 5.25 7.75Z"
                                                            fill="currentcolor"
                                                        />
                                                    </svg>
                                                </span>
                                                <a href="{{ $location_link[$index] ?? '#' }}" target="_blank" title="{{ $name }}">
                                                    <b>{{ $name }}</b><br>
                                                    {{ $company_address[$index] ?? '' }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif

                                    <li>
                                        <span>
                                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.9727 11.332L13.3164 14.0938C13.2344 14.5039 12.9062 14.7773 12.4961 14.7773C5.60547 14.75 0 9.14453 0 2.25391C0 1.84375 0.246094 1.51562 0.65625 1.43359L3.41797 0.777344C3.80078 0.695312 4.21094 0.914062 4.375 1.26953L5.66016 4.25C5.79688 4.60547 5.71484 5.01562 5.41406 5.23438L3.9375 6.4375C4.86719 8.32422 6.39844 9.85547 8.3125 10.7852L9.51562 9.30859C9.73438 9.03516 10.1445 8.92578 10.5 9.0625L13.4805 10.3477C13.8359 10.5391 14.0547 10.9492 13.9727 11.332Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                        <a href="tel:+91-{{ $company_informations->company_phone ?? '' }}" title="Phone Number">
                                            <b>Contact number</b><br>
                                            +91-{{ $company_informations->company_phone ?? '' }}
                                        </a>
                                    </li>
                                    <li>
                                        <span>
                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.9727 1.76172L13.2227 13.1094C13.1953 13.3828 13.0312 13.6289 12.7852 13.7656C12.6484 13.8203 12.5117 13.875 12.3477 13.875C12.2383 13.875 12.1289 13.8477 12.0195 13.793L8.68359 12.3984L7.28906 14.4766C7.17969 14.668 6.98828 14.75 6.79688 14.75C6.49609 14.75 6.25 14.5039 6.25 14.2031V11.5781C6.25 11.3594 6.30469 11.168 6.41406 11.0312L12.375 3.375L4.33594 10.6211L1.51953 9.44531C1.21875 9.30859 1 9.03516 1 8.67969C0.972656 8.29688 1.13672 8.02344 1.4375 7.85938L13.6875 0.886719C13.9609 0.722656 14.3438 0.722656 14.6172 0.914062C14.8906 1.10547 15.0273 1.43359 14.9727 1.76172Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                        <a href="mailto:{{ $company_informations->company_email ?? '' }}" title="Email">
                                            <b>E-mail</b><br>
                                            {{ $company_informations->company_email ?? '' }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer area end -->
    <!-- copyright area start -->
    <div class="tp-copyright-area tp-copyright-style-2 black-bg tp-copyright-border tp-copyright-height">
        <div class="container-fluid home-container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="tp-copyright-left text-center text-md-start">
                        <p>©Copyright {{ date('Y') }} Damian Corporate All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="tpoffcanvas__social">
                        <div class="social-icon">
                            <a href="https://www.instagram.com/damiancorporate/" target="_blank" rel="noopener noreferrer" title="Instagram">
                                <img src="{{ asset('frontend/assets/img/social-icon/instagram.png') }}" alt="Instagram" title="Instagram" loading="lazy" width="24" height="24">
                            </a>
                            <a href="https://www.linkedin.com/company/damian-corporate/" target="_blank" rel="noopener noreferrer" title="LinkedIn">
                                <img src="{{ asset('frontend/assets/img/social-icon/linkedin.png') }}" alt="LinkedIn" title="LinkedIn" loading="lazy" width="24" height="24">
                            </a>
                            <a href="https://www.facebook.com/DamianCorporate/" target="_blank" rel="noopener noreferrer" title="Facebook">
                                <img src="{{ asset('frontend/assets/img/social-icon/facebook.png') }}" alt="Facebook" title="Facebook" loading="lazy" width="24" height="24">
                            </a>
                            <a href="https://api.whatsapp.com/send/?phone=918433934664&text&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" title="Whatsapp">
                                <img src="{{ asset('frontend/assets/img/social-icon/whatsapp.png') }}" alt="Whatsapp" title="Whatsapp" loading="lazy" width="24" height="24">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright area end -->
</footer>
