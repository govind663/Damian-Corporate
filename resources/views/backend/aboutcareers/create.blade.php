@extends('backend.layouts.master')

@section('title')
Damian Corporate | Add About Careers
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
                        <h4>Add About Careers</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('about-careers.index') }}">Manage About Careers</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add About Careers
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('about-careers.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Title : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="Enter Title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Upload Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .pdf" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
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
                    </div>

                    <label class="col-sm-2"><strong>Description :  <span class="text-danger">*</span></strong></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea id="description" name="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Description ..." value="{{old('description')}}">{{old('description')}}</textarea>
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
                            <th>Short Description : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rowIndex = 0; @endphp
                        @forelse(old('short_description', ['']) as $index => $name)
                        <tr>
                            <td>
                                <textarea type="text" style="height: 80px !important" name="short_description[]" id="short_description" value="{{ old('short_description.' . $index) }}" class="form-control @error('short_description.' . $index) is-invalid @enderror" placeholder="Enter Short Description">{{ old('short_description.' . $index) }}</textarea>
                                @error('short_description.' . $index)
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
                        @php $rowIndex = $index + 1; @endphp
                        @empty
                        <tr>
                            <td>
                                <textarea type="text" style="height: 80px !important" name="short_description[]" id="short_description" class="form-control" placeholder="Enter Short Description"></textarea>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" id="addCompanyLocationRow">+ Add</button>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('about-careers.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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

{{-- Add More Company Location --}}
<script>
    $(document).ready(function () {
        let rowIndex = {{ $rowIndex }}; // Track the current row index

        $('#addCompanyLocationRow').click(function () {
            rowIndex++;
            let newRow = `
                <tr>
                    <td>
                        <textarea type="text" style="height: 80px !important" name="short_description[]" id="short_description" value="" class="form-control" placeholder="Enter Short Description"></textarea>
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
