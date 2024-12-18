@extends('backend.layouts.master')

@section('title')
Damian Corporate | Edit Vision
@endsection

@push('styles')
<style>
    .bootstrap-tagsinput input {
        max-width: 110px;
    }
</style>
@endpush

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Edit Vision</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('vision.index') }}">Manage Vision</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Vision
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('vision.update', $vision->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $vision->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $vision->title }}" placeholder="Enter Title.">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Upload Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .pdf" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $vision->image }}" placeholder="Upload Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                        <br>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-container">
                            <div id="file-preview"></div>
                        </div>
                        @if(!empty($vision->image))
                            <img src="{{ asset('/damian_corporate/visions/image/' . $vision->image) }}" alt="Banner Image" style="width: 100% !important; height: 300px !important;">
                        @endif
                    </div>

                    <label class="col-sm-2"><b>Status : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="status" id="status" class="custom-select2 form-control @error('status') is-invalid @enderror">
                            <option value=" " >Select Status</option>
                            <optgroup label="Status">
                                <option value="1" {{ $vision->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $vision->status == '2' ? 'selected' : '' }}>Inactive</option>
                            </optgroup>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><strong>Description :  <span class="text-danger">*</span></strong></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea id="description" name="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Description ..." value="{{ $vision->description }}">{{ $vision->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <table class="table table-bordered p-3" id="dynamicCompanyLocationTable">
                    <thead>
                        <tr>
                            <th>Sub Title : <span class="text-danger">*</span></th>
                            <th>Sub Description : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sub_title = is_array($vision->sub_title)
                                            ? $vision->sub_title
                                            : json_decode($vision->sub_title, true) ?? [];
                            $sub_description = is_array($vision->sub_description)
                                            ? $vision->sub_description
                                            : json_decode($vision->sub_description, true) ?? [];
                        @endphp

                        @if(count($sub_title) > 0)
                            @foreach($sub_title as $index => $name)
                                <tr>
                                    <td>
                                        <input type="text" name="sub_title[]" id="sub_title" class="form-control @error('sub_title.' . $index) is-invalid @enderror" value="{{ $sub_title[$index] }}" placeholder="Enter Sub Title">
                                        @error('sub_title.' . $index)
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </td>
                                    <td>
                                        <textarea type="text" style="height: 60px !important" name="sub_description[]" id="sub_description" value="{{ $sub_description[$index] }}" class="form-control @error('sub_description.' . $index) is-invalid @enderror" placeholder="Enter Sub Description">{{ $sub_description[$index] }}</textarea>
                                        @error('sub_description.' . $index)
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </td>
                                    <td>
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addCompanyLocationRow">+ Add</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <input type="text" name="sub_title[]" id="sub_title" class="form-control" placeholder="Enter Sub Title">
                                </td>
                                <td>
                                    <textarea type="text" style="height: 60px !important" name="sub_description[]" id="sub_description" class="form-control" placeholder="Enter Sub Description"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="addRequirementsRow">+ Add</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('vision.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
{{-- preview both image and PDF --}}
<script>
    function agentPreviewFile() {
        const fileInput = document.getElementById('image');
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
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" width="50%" height="50">`;
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

@php
    $rowIndex = isset($sub_title) ? count($sub_title) : 0;
@endphp
{{-- Add More Company Location --}}
<script>
    $(document).ready(function () {
        let rowIndex = {{ $rowIndex }}; // Track the current row index

        $('#addCompanyLocationRow').click(function () {
            rowIndex++;
            let newRow = `
                <tr>
                    <td>
                        <input type="text" name="sub_title[]" id="sub_title" value="" class="form-control" placeholder="Enter Sub Title">
                    </td>
                    <td>
                        <textarea type="text" style="height: 60px !important" name="sub_description[]" id="sub_description" value="" class="form-control" placeholder="Enter Sub Description"></textarea>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicCompanyLocationTable tbody').append(newRow);
        });

        // Remove row
        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush
