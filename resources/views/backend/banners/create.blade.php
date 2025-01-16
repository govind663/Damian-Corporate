@extends('backend.layouts.master')

@section('title')
Damian Corporate | Add Banner
@endsection

@push('styles')
@endpush

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Add Banner</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('banner.index') }}">Manage Banner</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Banner
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('banner.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Upload Image : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg" name="banner_image" id="banner_image" class="form-control @error('banner_image') is-invalid @enderror" value="{{old('banner_image')}}" placeholder="Upload Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('banner_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div id="preview-container">
                            <div id="file-preview"></div>
                        </div>
                    </div>


                    <label class="col-sm-2"><b>Upload Video : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="file" onchange="bannerVideoPreviewFile()" accept=".mp4" name="banner_video" id="banner_video" class="form-control @error('banner_video') is-invalid @enderror" value="{{old('banner_video')}}" placeholder="Upload Video.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 20MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .mp4 format can be uploaded .</b></small>
                        <br>
                        @error('banner_video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div id="preview-banner-video-container">
                            <div id="file-banner-video-preview"></div>
                        </div>
                    </div>

                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Status : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="status" id="status" class="custom-select2 form-control @error('status') is-invalid @enderror">
                            <option value=" " >Select Status</option>
                            <optgroup label="Status">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Inactive</option>
                            </optgroup>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('banner.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </div>

        </form>

    </div>

    <!-- Footer Start -->
    <x-backend.footer />
    <!-- Footer Start -->
</div>
@endsection

@push('scripts')
<script>
    // Function to preview the banner video
    function bannerVideoPreviewFile() {
        const videoInput = document.getElementById('banner_video');
        const videoPreviewContainer = document.getElementById('file-banner-video-preview');
        const file = videoInput.files[0];

        if (file) {
            const fileType = file.type;

            // Check if the uploaded file is an mp4 video
            if (fileType === 'video/mp4') {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Create a video element to preview the video file
                    videoPreviewContainer.innerHTML = `
                        <video controls style="width: 100%; height: auto;">
                            <source src="${e.target.result}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                // Unsupported file type
                videoPreviewContainer.innerHTML = '<p>Unsupported file type. Please upload an .mp4 video.</p>';
            }
        } else {
            // No file selected
            videoPreviewContainer.innerHTML = '';
        }
    }

    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('banner_image');
        const previewContainer = document.getElementById('preview-container');
        const filePreview = document.getElementById('file-preview');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="height: 25%; width: 25%;">`;
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
