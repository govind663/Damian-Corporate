@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Careers
@endsection

@push('styles')
<style>
    .tp-form-input-box input {
        color: #f4f4f4 !important;
    }

    .careers-input-box input {
        height: 66px !important;
    }

    .form-control {
        padding: 0.375rem .75rem;
        font-size: 1rem;
        font-weight: 900px;
        line-height: 3.5 !important;
        background-color: transparent !important;
    }

    .careers-dropdown-select .nice-select {
        height: 65px !important;
    }

    .careers-textarea textarea {
        height: 270px !important;
    }

    .tp-form-textarea-box textarea {
        color: #fffdfd !important;
    }
</style>
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
                                <span><a href="{{ route('frontend.home') }}">Home</a></span>
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
                            @if (!empty($careers->careers_image))
                                <img src="{{ asset('/damian_corporate/careers/careers_image/'. $careers->careers_image) }}" alt="{{ $careers->careers_image }}">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="tp-about-content">

                        <div class="tp-about-text wow fadeInRight mb-25" style="color: rgb(255, 255, 255) !important; text-align: justify !important;">
                            {!! $careers->description !!}
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
                                {{ $aboutcareers->title ?? '' }}
                            </h4>
                            <div class="careers-section-para">
                                <p>
                                    {!! $aboutcareers->description ?? '' !!}
                                </p>
                            </div>

                            <div class="tp-about-list career-section-list mb-40">
                                <ul>
                                    @foreach ($aboutcareers->short_description as $description)
                                        <li>
                                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                                            {{ $description }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="tp-exp-fea-thumb me-0">
                            <div class="tp-hover-distort-wrapper career-area-bg-img">
                                @if (!empty($aboutcareers->image))
                                    <img src="{{ asset('/damian_corporate/aboutcareer/image/'. $aboutcareers->image) }}" alt="{{ $aboutcareers->image }}">
                                @endif
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
                            @foreach ($jobpositiondetails as $key => $value)
                                <div class="accordion-items tp-faq-active">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-buttons collapsed careers-opening-buttons" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $key }}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{ $key }}">
                                            {{ $value->job_position?->job_title ?? '' }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $key }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                <b>Job Description :</b>
                                            </p>
                                            @if (!empty($value->job_description))
                                                <div class="tp-about-list pb-30">
                                                    {!! $value->job_description ?? '' !!}
                                                </div>
                                            @endif
                                            <p>
                                                <b>Experience :</b>
                                            </p>
                                            <div class="tp-about-list pb-30">
                                                <ul>
                                                    @if (!empty($value->experience))
                                                        <li>
                                                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                            {{ $value->experience ?? '' }}
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>

                                            <p>
                                                <b>Requirement :</b>
                                            </p>
                                            @if (!empty($value->requirements))
                                                <div class="tp-about-list pb-30">
                                                    <ul>
                                                        @foreach ($value->requirements as $requirement)
                                                            <li>
                                                                <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                                {{ $requirement }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <p>
                                                <b> Qualification :</b>
                                            </p>
                                            @if (!empty($value->qualifications))
                                                <div class="tp-about-list pb-30">
                                                    <ul>
                                                        @foreach ($value->qualification as $qualification)
                                                            <li>
                                                                <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                                {{ $qualification }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <p>
                                                <b>Responsibilities :</b>
                                            </p>
                                            @if (!empty($value->responsibilities))
                                                <div class="tp-about-list pb-30">
                                                    <ul>
                                                        @foreach ($value->responsibilities as $responsibility)
                                                            <li>
                                                                <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                                {{ $responsibility }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <p>
                                                <b>CTC :</b>
                                            </p>
                                            @if (!empty($value->salary))
                                                <div class="tp-about-list pb-30">
                                                    <ul>
                                                        @foreach ($value->salary as $salary)
                                                            <li>
                                                                <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                                {{ $salary }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <p>
                                                <b>Job Type:</b>
                                            </p>
                                            @php
                                                $job_type = '';

                                                if($value->job_type == '1') {
                                                    $job_type = 'Full Time';
                                                } elseif ($value->job_type == '2') {
                                                    $job_type = 'Part Time';
                                                } elseif ($value->job_type == '3') {
                                                    $job_type = 'Contract';
                                                } elseif ($value->job_type == '4') {
                                                    $job_type = 'Internship';
                                                }
                                            @endphp
                                            @if (!empty($job_type))
                                                <div class="tp-about-list mb-30">
                                                    <ul>
                                                        <li>
                                                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                            {{ $job_type ?? '' }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif

                                            <p>
                                                <b>Location:</b>
                                            </p>
                                            @if (!empty($value->location))
                                                <div class="tp-about-list">
                                                    <ul>
                                                        <li>
                                                            <i class="fa-sharp fa-solid fa-circle-check"></i>
                                                            {{ $value->job_location ?? '' }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq area end -->

    <!-- Application form area -->
    <div class="tp-appointment-area careers-area pt-70 pb-70 z-index">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="tp-form-box pb-50 text-center">

                        <h4 class="tp-section-title tp-split-text tp-split-in-right pb-60">Apply Now</h4>

                        <form method="POST" action="{{ route('send-career-email') }}" class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box" style="text-align: left !important;">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name *">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30" style="text-align: left !important;">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Address *">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30" style="text-align: left !important;">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="text" maxlength="10" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Your Phone *">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30" style="text-align: left !important;">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Emai Id *">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30" style="text-align: left !important;">
                                    <div class="tp-form-input-box careers-input-box">
                                        <div class="careers-dropdown-select">
                                            <select name="job_position_id" id="job_position_id" class="form-control @error('job_position_id') is-invalid @enderror" >
                                                <option value="">Select Job Position</option>
                                                @foreach ($job_positions as $key => $value)
                                                    <option value="{{ $value->id }}" {{ old('job_position_id') == $value->id ? 'selected' : '' }}>{{ $value->job_title ?? '' }}</option>
                                                @endforeach
                                            </select>
                                            @error('job_position_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 mb-30" style="text-align: left !important;">
                                    <div class="tp-form-input-box careers-input-box">
                                        <input type="text" maxlength="2" name="experience" id="experience" class="form-control @error('experience') is-invalid @enderror" value="{{ old('experience') }}" placeholder="Years Of experience*">
                                        @error('experience')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-8 col-lg-8 mb-30" style="text-align: left !important;">
                                    <div class="tp-form-textarea-box careers-textarea">
                                        <textarea placeholder="Messege" rows="5" name="messege" id="messege" class="form-control @error('messege') is-invalid @enderror" value="{{ old('messege') }}" >{{ old('messege') }}</textarea>
                                        @error('messege')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 mb-30">
                                    <div class="tp-form-input-box careers-input-box mb-3" style="text-align: left !important;">
                                        <input type="file" onchange="agentPreviewResumeFile()" accept=".png, .jpg, .jpeg, .pdf" name="resume" id="resume" class="form-control @error('resume') is-invalid @enderror" value="{{ old('resume') }}" placeholder="Upload Resume*">
                                        <small class="text-light" ><b>Note : The file size  should be less than 2MB .</b></small>
                                        <br>
                                        <small class="text-light"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                                        <br>
                                        @error('resume')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <div id="preview-resume-container">
                                            <div id="file-resume-preview"></div>
                                        </div>
                                    </div>

                                    <div class="tp-form-input-box careers-input-box" style="text-align: left !important;">
                                        <input type="file" onchange="agentPreviewPortfolioFile()" accept=".png, .jpg, .jpeg, .pdf" name="portfolio" id="portfolio" class="form-control @error('portfolio') is-invalid @enderror" value="{{ old('portfolio') }}" placeholder="Upload Portfolio*">
                                        <small class="text-light"><b>Note : The file size  should be less than 2MB .</b></small>
                                        <br>
                                        <small class="text-light"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                                        <br>
                                        @error('portfolio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <div id="preview-portfolio-container">
                                            <div id="file-portfolio-preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="tp-btn-theme theme-lg" >
                                <span>
                                    <i class="fas fa-paper-plane mr-10"></i>
                                    SUBMIT
                                </span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- application form area end -->
@endsection

@push('scripts')
{{-- Preview Resume Both Image and PDF --}}
<script>
    function agentPreviewResumeFile() {
        const fileInput = document.getElementById('resume');
        const previewContainer = document.getElementById('preview-resume-container');
        const filePreview = document.getElementById('file-resume-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="60%" height="110">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }

    }

</script>

{{-- Preview Resume Both Image and PDF --}}
<script>
    function agentPreviewFile() {
        const fileInput = document.getElementById('portfolio');
        const previewContainer = document.getElementById('preview-portfolio-container');
        const filePreview = document.getElementById('file-portfolio-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="60%" height="110">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }

    }

</script>
@endpush
