@extends('backend.layouts.master')

@section('title')
Damian Corporate | Add Company Information
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
                        <h4>Add Company Information</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('companyInformation.index') }}">Manage Company Information</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Add Company Information
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('companyInformation.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Company Phone Number : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" maxlength="10" name="company_phone" id="company_phone" class="form-control @error('company_phone') is-invalid @enderror" value="{{old('company_phone')}}" placeholder="Enter Company Phone Number.">
                        @error('company_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Company Email Id : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="email" name="company_email" id="company_email" class="form-control @error('company_email') is-invalid @enderror" value="{{old('company_email')}}" placeholder="Enter Company Email Id.">
                        @error('company_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Upload Company Logo : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-10 col-md-10">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .pdf" name="company_logo" id="company_logo" class="form-control @error('company_logo') is-invalid @enderror" value="{{old('company_logo')}}" placeholder="Upload Company Logo.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .pdf format can be uploaded .</b></small>
                        <br>
                        @error('company_logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-container">
                            <div id="file-preview"></div>
                        </div>
                    </div>

                    <label class="col-sm-2"><strong>Company Description :  <span class="text-danger">*</span></strong></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea id="company_description" name="company_description" class="textarea_editor form-control border-radius-0 @error('company_description') is-invalid @enderror" placeholder="Enter Company Description ..." value="{{ old('company_description') }}">{{ old('company_description') }}</textarea>
                        @error('company_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <table class="table table-bordered p-3" id="dynamicCompanyLocationTable">
                    <thead>
                        <tr>
                            <th>Office Name : <span class="text-danger">*</span></th>
                            <th>Office Address : <span class="text-danger">*</span></th>
                            <th>Office location link : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rowIndex = 0; @endphp
                        @forelse(old('location_name', ['']) as $index => $name)
                        <tr>
                            <td>
                                <input type="text" name="location_name[]" id="location_name" class="form-control @error('location_name.' . $index) is-invalid @enderror" value="{{ old('location_name.' . $index) }}" placeholder="Enter Office Name">
                                @error('location_name.' . $index)
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </td>
                            <td>
                                <textarea type="text" style="height: 60px !important" name="company_address[]" id="company_address" value="{{ old('company_address.' . $index) }}" class="form-control @error('company_address.' . $index) is-invalid @enderror" placeholder="Enter Office Address">{{ old('company_address.' . $index) }}</textarea>
                                @error('company_address.' . $index)
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="location_link[]" id="location_link" class="form-control @error('location_link.' . $index) is-invalid @enderror" value="{{ old('location_link.' . $index) }}" placeholder="Enter Office location link">
                                @error('location_link.' . $index)
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
                                <input type="text" name="location_name[]" id="location_name" class="form-control" placeholder="Enter Office Name">
                            </td>
                            <td>
                                <textarea type="text" style="height: 60px !important" name="company_address[]" id="company_address" class="form-control" placeholder="Enter Office Address"></textarea>
                            </td>
                            <td>
                                <input type="text" name="location_link[]" id="location_link" class="form-control" placeholder="Enter Office location link">
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
                        <a href="{{ route('companyInformation.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
        const fileInput = document.getElementById('company_logo');
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
                        <input type="text" name="location_name[]" id="location_name" value="" class="form-control" placeholder="Enter Office Name">
                    </td>
                    <td>
                        <textarea type="text" style="height: 60px !important" name="company_address[]" id="company_address" value="" class="form-control" placeholder="Enter Office Address"></textarea>
                    </td>
                    <td>
                        <input type="text" name="location_link[]" id="location_link" value="" class="form-control" placeholder="Enter Office location link">
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
