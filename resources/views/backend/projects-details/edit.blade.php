@extends('backend.layouts.master')

@section('title')
Damian Corporate | Edit Project Details
@endsection

@push('styles')
<style>
    .table-bordered, .table-bordered td, .table-bordered th {
        border: 1px solid #393b46;
    }
</style>
@endpush

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Edit Project Details</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('project-details.index') }}">Manage Project Details</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Project Details
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('project-details.update', $projectDetails->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $projectDetails->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Project Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="project_id" id="project_id" class="form-control custom-select2 @error('project_id') is-invalid @enderror" value="{{ old('project_id') }}">
                            <option value="">Select Project Name</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ $projectDetails->project_id == $project->id ? 'selected' : '' }}>{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                        @error('project_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Slug : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" readonly name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $projectDetails->slug }}" placeholder="Enter Slug.">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Location : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ $projectDetails->location }}" placeholder="Enter Location.">
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Project Location Link : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="location_url" id="location_url" class="form-control @error('location_url') is-invalid @enderror" value="{{ $projectDetails->location_url }}" placeholder="Enter Project Location Link.">
                        @error('location_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Total Constructed Area : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="total_constructed_area" id="total_constructed_area" class="form-control @error('total_constructed_area') is-invalid @enderror" value="{{ $projectDetails->total_constructed_area }}" placeholder="Enter Total Constructed Area.">
                        @error('total_constructed_area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-4"><b>Project Description : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-12 col-md-12">
                        <textarea name="project_description" id="project_description" class="form-control textarea_editor border-radius-0 @error('project_description') is-invalid @enderror" rows="4" value="{{ $projectDetails->project_description }}" placeholder="Enter the Project Description here.">{{ $projectDetails->project_description }}</textarea>
                        @error('project_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <table class="table table-bordered p-3" id="dynamicBannerImageTable">
                    <thead>
                        <tr>
                            <th>Project Banner Image : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($bannerImages))
                            @foreach(json_decode($bannerImages) as $key => $bannerImage)
                                <tr>
                                    <td width="85%">
                                        <div class="row d-flex col-sm-8 col-md-8">
                                            @if(!empty($bannerImage))
                                                <img src="{{ asset('/damian_corporate/project_details/banner_image/' . $bannerImage) }}" alt="{{ $bannerImage }}" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                            @endif
                                            <div id="banner-container-0">
                                                <div id="file-banner-0"></div>
                                            </div>
                                            <input type="file" onchange="bannerPreviewFiles(0)" accept=".png, .jpg, .jpeg" name="banner_image[]" id="banner_image_0" class="form-control mt-2 @error('banner_image.*') is-invalid @enderror" value="{{ $bannerImage }}">
                                            <small class="text-secondary"><b>Note : The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded.</b></small>
                                            @error('banner_image.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </td>
                                    <td width="15%">
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addBannerImageRow">Add More</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeBannerImageRow">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('project-details.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
{{-- Add More Banner Image or View both Image and PDF --}}
<script>
    $(document).ready(function () {
        let rowId = 0;

        // Add a new row with validation
        $('#addBannerImageRow').click(function () {
            rowId++;
            var newRow = `<tr>
                <td>
                    <div class="col-sm-8 col-md-8">
                        <div id="banner-container-${rowId}">
                            <div id="file-banner-${rowId}"></div>
                        </div>
                        <input type="file" onchange="bannerPreviewFiles(${rowId})" accept=".png, .jpg, .jpeg" name="banner_image[]" id="banner_image_${rowId}" class="form-control @error('banner_image.*') is-invalid @enderror">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png format can be uploaded .</b></small>
                        <br>
                        @error('banner_image.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </td>
                <td><button type="button" class="btn btn-danger removeBannerImageRow">Remove</button></td>
            </tr>`;
            $('#dynamicBannerImageTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeBannerImageRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Banner Image Preview
    function bannerPreviewFiles(rowId) {
        const fileInput = document.getElementById(`banner_image_${rowId}`);
        const previewContainer = document.getElementById(`banner-container-${rowId}`);
        const filePreview = document.getElementById(`file-banner-${rowId}`);
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="width:150px; height:60px !important;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="25%" />`;
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

{{-- fetch all projects --}}
<script>
    $(document).ready(function () {
        $('#project_id').on('change', function () {
            var project_id = this.value;
            if (project_id) {
                $.ajax({
                    url: "{{ route('fetch-project-slug') }}",
                    type: "POST",
                    data: {
                        projectId: project_id,
                        _token: '{{ csrf_token() }}',
                    },
                    dataType: 'json',
                    success: function (result) {
                        // Assuming the server response is in the format { "slug": "your-slug-value" }
                        if (result.slug) {
                            $('#slug').val(result.slug);
                        } else {
                            $('#slug').val(''); // Clear the input if no slug is returned
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching slug: " + error);
                        $('#slug').val(''); // Clear the input on error
                    }
                });
            } else {
                $('#slug').val(''); // Clear the input if no project is selected
            }
        });
    });
</script>
@endpush
