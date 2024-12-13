@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Services
@endsection

@push('styles')
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="breadcrumb-section breadcrumb__pt services-breadcrumb" style="background-image: url({{ asset('frontend/assets/img/breadcrumbs/services-breadcrumb.jpg') }}) !important;">
        <div class="breadcrumb__area breadcrumb__height p-relative fix">
            <div class="container-fluid home-container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__section-title-box mb-20">
                                <h3 class="breadcrumb__title tp-split-text tp-split-in-right">Services</h3>
                            </div>
                            <div class="breadcrumb__list">
                                <span><a href="index.html">Home</a></span>
                                <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                                <span>Services</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- service area start -->
    <div class="our-services-area pt-70 pb-70">
        <div class="container-fluid home-container">

            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-title-box text-center mb-30">
                        <!-- <span class="tp-section-subtitle tp-split-text tp-split-in-right">Latests Project</span> -->
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Our Services</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="serviceBox">
                        <div class="service-content service-one-area">
                            <div class="service-img">
                                <img src="frontend/assets/img/icon/blueprint.png" width="72" alt="">
                            </div>
                            <h4 class="services-title">Architecture Design & Build</h4>
                            <p class="description">
                                Our esteemed team of architects and designers provides personalised guidance and
                                support to each client, from the inception of the project's concept to its impeccable
                                execution. We boast an in-house 3D visualisation team dedicated to ensuring a
                                comprehensive understanding of the project well before construction commences.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="serviceBox">
                        <div class="service-content service-two-area">
                            <div class="service-img">
                                <img src="frontend/assets/img/icon/house.png" width="72" alt="">
                            </div>
                            <h4 class="services-title">Residential Design & Build</h4>
                            <p class="description">We specialise in providing a comprehensive design and build solution
                                tailored for luxury residential interiors. With a team of seasoned architects and interior
                                designers at your service, we ensure meticulous assistance throughout every phase, from
                                conceptualization and material selection right until the flawless site execution of the
                                project. All angles are supervised and led by our senior team. We have dedicated senior
                                project managers, supported by a state-of-the-art automated factory, to guarantee a seamless
                                experience and deliver superior execution to our discerning clients.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-50">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="serviceBox">
                        <div class="service-content service-three-area">
                            <div class="service-img">
                                <img src="frontend/assets/img/icon/skyline.png" width="72" alt="">
                            </div>
                            <h4 class="services-title">Commercial Design & Build</h4>
                            <p class="description">We proudly offer a comprehensive design and build solution tailored
                                specifically for luxury commercial interiors. With a team of highly skilled architects and
                                interior designers, we provide unwavering support throughout the entire process for our
                                clients, from initial conceptualization to impeccable execution on site. Furthermore, our
                                esteemed senior project team, fortified by a fully equipped automated factory, ensures a
                                seamless journey and delivers unparalleled execution and superior quality to our esteemed
                                clientele.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="serviceBox">
                        <div class="service-content service-four-area">
                            <div class="service-img">
                                <img src="frontend/assets/img/icon/partition.png" width="72" alt="">
                            </div>
                            <h4 class="services-title">Modular Furniture & Partition Systems</h4>
                            <p class="description">At Damian Corporate, we present a diverse array of demountable acoustic
                                partition systems. Being one of the leading firms in the country for demountable partition
                                systems, our offerings encompass solid and glazed options, available in single- and
                                double-skin systems, each distinguished by its own unique advantages depending on the
                                project requirement. Moreover, tailored to specific needs, our systems allow for
                                individualised doors, offering the option of single-glazed or double-glazed configurations,
                                pocket doors, and solid flushed doors meticulously designed to align with each varying
                                partition system.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->

    <!-- project area start -->
    <div class="tp-project-area tp-project-style-2 portfolio-area fix">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="tp-project-title-box text-center mb-30">
                        <!-- <span class="tp-section-subtitle tp-split-text tp-split-in-right">Latests Project</span> -->
                        <h3 class="tp-section-title tp-split-text tp-split-in-right">Projects</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="tp-project-filter masonary-menu text-center pb-60">
                        <button data-filter="*" class="active"><span>All Projects</span></button>
                        <button data-filter=".residential"><span>Residential</span></button>
                        <button data-filter=".commercial"><span>Commercial</span></button>
                        <button data-filter=".architectural"><span>Architectural</span></button>
                        <button data-filter=".partition"><span>Modular Furniture & Partition Systems</span></button>
                    </div>
                </div>
            </div>
            <div class="row grid">

                <!-- Commercial-project -->
                <div class="col-lg-4 col-md-4 grid-item commercial">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Commercial Design & Build/Balaji Wafers Head Office/balaji-wafers-head-office-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Balaji Wafers Head Office</h3>
                                    <ul class="icon">
                                        <li><a href="portfolio-details.html"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architectural-project -->
                <div class="col-lg-4 col-md-4 grid-item architectural">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Architectural Design & Build/Armstrong/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Armstrong</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Residential Design & Build/Ahuja Residence/ahuja-residence-1.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Ahuja Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partition-project-7-->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/7.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Mount Meru - Lusaka</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Residential Design & Build/Bhatia Residence/bhatia-residence-1.JPG">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Bhatia Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Residential Design & Build/Dr. Kumar Residence/dr-kumar-residence-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Dr. Kumar Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Residential Design & Build/Hingorani Residence/hingorani-residence-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Hingorani Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Residential Design & Build/Khatan Residence/khatan-residence-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Khatan Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Residential Design & Build/Olar Apartment/olar-apartment-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Olar Apartment</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Residential Design & Build/Pereira Residence/pereira-residence-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Pereira Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Residential Design & Build/Vora Residence/vora-residence-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Vora Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Residential-project -->
                <div class="col-lg-4 col-md-4 grid-item residential">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img
                                src="frontend/assets/img/portfolio/Residential Design & Build/Agrawal Residence/agrawal-residence-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Agrawal Residence</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Commercial-project -->
                <div class="col-lg-4 col-md-4 grid-item commercial">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Commercial Design & Build/ACL/acl-1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Ambica Corporation Ltd.</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Commercial-project -->
                <div class="col-lg-4 col-md-4 grid-item commercial">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Commercial Design & Build/GIFT City/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">GIFT City</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Commercial-project -->
                <div class="col-lg-4 col-md-4 grid-item commercial">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Commercial Design & Build/Tyaani Jewellery/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Tyaani Jewellery</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Commercial-project -->
                <div class="col-lg-4 col-md-4 grid-item commercial">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Commercial Design & Build/UPL/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">UPL</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Commercial-project -->
                <div class="col-lg-4 col-md-4 grid-item commercial">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Commercial Design & Build/Yashmun Engineers Office/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Yashmun Engineers Office</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- Architectural-project -->
                <div class="col-lg-4 col-md-4 grid-item architectural">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Architectural Design & Build/Casa de Damiao/1.png">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Casa de Damiao</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architectural-project -->
                <div class="col-lg-4 col-md-4 grid-item architectural">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Architectural Design & Build/Goa Project 1/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Goa Project 1</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architectural-project -->
                <div class="col-lg-4 col-md-4 grid-item architectural">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Architectural Design & Build/Goa Project 2/1.png">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Goa Project 2</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architectural-project -->
                <div class="col-lg-4 col-md-4 grid-item architectural">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Architectural Design & Build/Goa Project 3/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Goa Project 3</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Architectural-project -->
                <div class="col-lg-4 col-md-4 grid-item architectural">
                    <div class="portfolio-section-item p-relative">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Architectural Design & Build/Goa Project 4/1.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Goa Project 4</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Partition-project-1 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/1.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Conduent</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partition-project-2 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/2.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Coworks</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-3 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/3.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">EQ Tech</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-4 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/4.png">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Idea Cellular</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-5 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/5.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">KPMG</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partition-project-6 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/6.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Lunkad SkyBue</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partition-project-8 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/8.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Nissan</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-9 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/9.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Panschshil SEZ</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-10 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/10.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">PTC Office</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-11 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/11.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Qualys</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-12 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/12.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Reliance - Jamnagar</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-13 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/13.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Rubrik</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-14 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/14.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Wework - Vikhroli</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-15 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/15.jpeg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Wework Chromium</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-16 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/16.jpg">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Heat & Control</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Partition-project-17 -->
                <div class="col-lg-4 col-md-4 grid-item partition">
                    <div class="p-relative portfolio-section-item">
                        <div class="box">
                            <img src="frontend/assets/img/portfolio/Partition Systems/17.JPG">
                            <div class="box-content">
                                <div class="inner-content">
                                    <h3 class="title">Virtela Site Pictures</h3>
                                    <ul class="icon">
                                        <li><a href="#"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- project area end -->
@endsection

@push('scripts')
@endpush
