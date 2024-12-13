@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Careers
@endsection

@push('styles')
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-section breadcrumb__pt services-breadcrumb"
        style="background-image: url({{ asset('frontend/assets/img/breadcrumbs/careers-breadcrumb.png') }}) !important;">
        <div class="breadcrumb__area breadcrumb__height p-relative fix">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__section-title-box mb-20">
                                <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Careers</h3>
                            </div>
                            <div class="breadcrumb__list">
                                <span><a href="index.html">Home</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>Careers</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- careers section start -->
    <div class="tp-about-area tp-about-bg p-relative pt-70">
        <div class="container-fluid home-container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="p-relative">
                        <div class="tp-hero-thumb wow fadeInLeft career-area-bg-img">
                            <img src="{{ asset('frontend/assets/img/testimonial/career-img.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-about-content">
                        <h4 class="tp-blog-2-title pb-15">
                            Passion for Excellence
                        </h4>
                        <div class="tp-about-text wow fadeInRight mb-25">
                            <p>Damian Corporate has excelled in its efforts to deliver a cutting-edge range of design
                                and furniture systems, right from traditional to modern, as per customer needs.</p>
                        </div>
                    </div>

                    <div class="tp-about-content">
                        <h4 class="tp-blog-2-title pb-15">
                            Nurturing Ideas
                        </h4>
                        <div class="tp-about-text wow fadeInRight mb-25">
                            <p>Damian Corporate works day in and day out to bring out creative ideas and transform the
                                best and most intelligent solutions, right from ideation and concept to practical
                                development and furniture products. We aim to meet the end-to-end needs of every
                                customer and believe in making their lives easier.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- careers section end -->

    <!-- expart-feature area start -->
    <div class="tp-exp-fea-area fix pt-70">
        <div class="container-fluid home-container">
            <div class="tp-exp-fea-top">
                <div class="row align-items-center">

                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="tp-exp-fea-right">
                            <h4 class="tp-blog-2-title">
                                Designing is just the beginning
                            </h4>
                            <div class="careers-section-para">
                                <p>Lead customers through the most innovative and creative end-to-end design and build
                                    solutions, focusing on:</p>
                            </div>

                            <div class="tp-about-list career-section-list mb-40">
                                <ul>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Innovative and practical design
                                    </li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Deliverables of products on time
                                    </li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Best back-end or customer service
                                    </li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Enhancing productivity</li>
                                    <li><i class="fa-sharp fa-solid fa-circle-check"></i>Nurturing creativity and quality
                                        production and design</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="tp-exp-fea-thumb me-0">
                            <div class="tp-hover-distort-wrapper career-area-bg-img">
                                <img src="{{ asset('frontend/assets/img/testimonial/design-bg.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- expart-feature area end -->

    <!-- faq area start -->
    <div class="tp-faq-area p-relative fix pt-70 pb-70">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-faq-title-box text-center pb-50">
                        <h4 class="tp-section-title">Open Positions</h4>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 mb-50 wow tpfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                    <div class="tp-custom-accordion careers-opening-area">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-items tp-faq-active">
                                <h2 class="accordion-header" id="headingOne1">
                                    <button class="accordion-buttons collapsed careers-opening-buttons" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="false"
                                        aria-controls="collapseOne1">
                                        Corporate Sales</button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p><b>Requirement:</b></p>
                                        <div class="tp-about-list pb-30">
                                            <ul>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Graduate in any
                                                    stream.</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Age between 30 - 35
                                                    years</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Experience of 8 -10
                                                    years</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Knowledge of ERP</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Preferred candidate
                                                    from the following industries - Modular Furniture, Architects, Interior
                                                    Contracting Firms, Flooring, Air Conditioning, Glass, Armstrong, gypsum,
                                                    Paint, etc.
                                                </li>
                                            </ul>
                                        </div>
                                        <p><b>Key Responsibilities:</b></p>
                                        <div class="tp-about-list pb-30">
                                            <ul>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Scouting market to
                                                    know upcoming projects.</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Meeting Clients and
                                                    generating inquiries</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Meeting Architects,
                                                    Interior Designers, and PMCs regularly to get the
                                                    details
                                                    on the projects
                                                    handled by them.</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Cultivating
                                                    relationships with them.</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Giving product
                                                    presentations.</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Understanding
                                                    requirements from the client and submitting quotations.</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Techno-commercial
                                                    discussions and attending tender negotiation meetings.</li>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Order finalization.
                                                </li>
                                            </ul>
                                        </div>
                                        <p><b>CTC:</b></p>
                                        <div class="tp-about-list pb-30">
                                            <ul>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Incentive based
                                                    package matching with industry standards.
                                                </li>
                                            </ul>
                                        </div>

                                        <p><b>Job Type:</b></p>
                                        <div class="tp-about-list mb-30">
                                            <ul>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i> Full-time</li>
                                            </ul>
                                        </div>

                                        <!--<p><b>Salary:</b></p>
                                           <div class="tp-about-list mb-30">
                                         <ul>
                                             <li><i class="fa-sharp fa-solid fa-circle-check"></i> ₹500,000.00
                                                 ₹750,000.00 per year</li>
                                           </ul>
                                        </div>-->
                                        <p><b>Location:</b></p>
                                        <div class="tp-about-list">
                                            <ul>
                                                <li><i class="fa-sharp fa-solid fa-circle-check"></i>Mumbai</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-items">
                                <h2 class="accordion-header" id="headingTwo2">
                                    <button class="accordion-buttons collapsed careers-opening-buttons" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false"
                                        aria-controls="collapseTwo2">
                                        3D Visualizer</button>
                                </h2>
                                <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi animi vero
                                        omnis sint voluptatem quod veritatis fugit repellendus minima maiores possimus
                                        temporibus, vel doloribus ducimus! Fuga voluptatum natus laborum suscipit
                                        repellat nihil maiores veritatis? Suscipit, molestiae dolorum. Cupiditate
                                        adipisci aliquam tempora, ipsum consequuntur ipsam atque maiores, explicabo ullam
                                        sint inventore laborum repellendus quia quae at architecto nisi. Distinctio
                                        provident itaque fuga rerum voluptatum optio impedit cum nisi possimus voluptates
                                        quae, hic assumenda, maxime commodi perferendis temporibus. Cum placeat hic
                                        voluptas, mollitia distinctio quibusdam dignissimos minus iusto minima aliquam
                                        rem in quis omnis praesentium veniam aut reprehenderit corrupti earum. Molestias,
                                        dolorem!
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-items">
                                <h2 class="accordion-header" id="headingThree3">
                                    <button class="accordion-buttons collapsed careers-opening-buttons" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree3">
                                        Digital Marketing
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree3" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere
                                        viverra
                                        .Aliquam eros justo, posuere lobortis viverra laoreet augue mattis fmentum
                                        ullamcorper
                                        viverra laoreet Aliquam eros justo,
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-items">
                                <h2 class="accordion-header" id="headingFour4">
                                    <button class="accordion-buttons collapsed careers-opening-buttons" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour4" aria-expanded="false"
                                        aria-controls="collapseFour4">
                                        Business Development
                                    </button>
                                </h2>
                                <div id="collapseFour4" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour4" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere
                                        viverra
                                        .Aliquam eros justo, posuere lobortis viverra laoreet augue mattis fmentum
                                        ullamcorper
                                        viverra laoreet Aliquam eros justo,
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq area end -->

    <!-- Application form area -->
    <div class="tp-appointment-area careers-area pt-70 pb-70 z-index">
        <!--<div class="tp-contact-shape-1">-->
        <!--   <img src="assets/img/contact/shape-1-1.png" alt="">-->
        <!--</div>-->
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="tp-form-box pb-50 text-center">
                        <h4 class="tp-section-title tp-split-text tp-split-in-right pb-60">Apply Now</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="text" placeholder="Name*">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="text" placeholder="Address*">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="text" placeholder="Your Phone*">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="email" placeholder="Email*">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box">
                                        <!-- <div class="postbox__select"> -->
                                        <div class="careers-dropdown-select">
                                            <select>
                                                <option>Position Applying For</option>
                                                <option>Lorem Ipsum</option>
                                                <option>Lorem Ipsum</option>
                                                <option>Lorem Ipsum</option>
                                                <option>Lorem Ipsum</option>
                                                <option>Lorem Ipsum</option>
                                            </select>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="text" placeholder="Years Of experience*">
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 mb-30">
                                    <div class="tp-form-textarea-box careers-textarea">
                                        <textarea placeholder="Messege"></textarea>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <button class="tp-btn-theme theme-lg careers-section-buttons w-100 mb-30"><span>Upload
                                            Resume</span></button>
                                    <button class="tp-btn-theme theme-lg careers-section-buttons w-100 mt-2"><span>Upload
                                            Portfolio</span></button>
                                </div>
                            </div>
                        </form>
                        <button class="tp-btn-theme theme-lg"><span>SUBMIT</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- application form area end -->
@endsection

@push('scripts')
@endpush
