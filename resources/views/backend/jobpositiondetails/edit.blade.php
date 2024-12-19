@extends('backend.layouts.master')

@section('title')
Damian Corporate | Edit Job Position
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
                        <h4>Edit Job Position</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('job-position-details.index') }}">Manage Job Position</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Job Position
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('job-position-details.update', $jobpositiondetails->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $jobpositiondetails->id }}">

            <div class="pd-20 card-box mb-30">
                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Job Position : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="job_position_id" id="job_position_id" class="form-control custom-select2 @error('job_position_id') is-invalid @enderror">
                            <option value="">Select Job Position</option>
                            <optgroup>
                                @foreach ($jobpositions as $value)
                                    <option value="{{ $value->id }}" {{ $jobpositiondetails->job_position_id == $value->id ? 'selected' : '' }}>{{ $value->job_title }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('job_position_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Experience : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="experience" id="experience" class="form-control @error('experience') is-invalid @enderror" value="{{ $jobpositiondetails->experience }}" placeholder="Enter experience.">
                        @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Job Type : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="job_type" id="job_type" class="form-control custom-select2 @error('job_type') is-invalid @enderror">
                            <option value="">Select Job Type</option>
                            <optgroup>
                                <option value="1" {{ $jobpositiondetails->job_type == '1' ? 'selected' : '' }}>Full Time</option>
                                <option value="2" {{ $jobpositiondetails->job_type == '2' ? 'selected' : '' }}>Part Time</option>
                                <option value="3" {{ $jobpositiondetails->job_type == '3' ? 'selected' : '' }}>Contract</option>
                                <option value="4" {{ $jobpositiondetails->job_type == '4' ? 'selected' : '' }}>Internship</option>
                            </optgroup>
                        </select>
                        @error('job_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Job Location : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="job_location" id="job_location" class="form-control @error('job_location') is-invalid @enderror" value="{{ $jobpositiondetails->job_location }}" placeholder="Enter Job Location.">
                        @error('job_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Status : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="status" id="status" class="custom-select2 form-control @error('status') is-invalid @enderror">
                            <option value=" " >Select Status</option>
                            <optgroup label="Status">
                                <option value="1" {{ $jobpositiondetails->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $jobpositiondetails->status == '2' ? 'selected' : '' }}>Inactive</option>
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
                    <label class="col-sm-2"><b>Job Description : </b></label>
                    <div class="col-sm-10 col-md-10">
                        <textarea name="job_description" id="job_description" class="form-control textarea_editor border-radius-0 @error('job_description') is-invalid @enderror" rows="4" placeholder="Enter the Job Description here." value="{{ $jobpositiondetails->job_description }}" >{{ $jobpositiondetails->job_description }}</textarea>
                        @error('job_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- Requirements --}}
                <h5 class="p-2 text-primary">Requirements :</h5>
                <table class="table table-bordered p-3" id="dynamicRequirementsTable">
                    <thead>
                        <tr>
                            <th>Requirements : </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $requirements = is_array($jobpositiondetails->requirements)
                                            ? $jobpositiondetails->requirements
                                            : json_decode($jobpositiondetails->requirements, true) ?? [];
                        @endphp

                        @if(count($requirements) > 0)
                            @foreach($requirements as $index => $name)
                                <tr>
                                    <td>
                                        <input type="text" name="requirements[]" id="requirements" class="form-control @error('requirements.' . $index) is-invalid @enderror" value="{{ $name }}" placeholder="Enter Requirements">
                                        @error('requirements.' . $index)
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </td>
                                    <td>
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addRequirementsRow">+ Add</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeRequirementsRow">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <input type="text" name="requirements[]" id="requirements" class="form-control" placeholder="Enter Requirements">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="addRequirementsRow">+ Add</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{-- Qualification --}}
                <h5 class="p-2 text-primary">Qualification :</h5>
                <table class="table table-bordered p-3" id="dynamicQualificationTable">
                    <thead>
                        <tr>
                            <th>Qualification : </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $qualification = is_array($jobpositiondetails->qualification)
                                            ? $jobpositiondetails->qualification
                                            : json_decode($jobpositiondetails->qualification, true) ?? [];
                        @endphp

                        @if(count($qualification) > 0)
                            @foreach($qualification as $index => $name)
                                <tr>
                                    <td>
                                        <input type="text" name="qualification[]" id="qualification" value="{{ $name }}" class="form-control @error('qualification.' . $index) is-invalid @enderror" placeholder="Enter Qualification">
                                        @error('qualification.' . $index)
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </td>
                                    <td>
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addQualificationRow">+ Add</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <input type="text" name="qualification[]" id="qualification" class="form-control" placeholder="Enter Qualification">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="addRequirementsRow">+ Add</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{-- Responsibilities --}}
                <h5 class="p-2 text-primary">Responsibilities :</h5>
                <table class="table table-bordered p-3" id="dynamicResponsibilitiesTable">
                    <thead>
                        <tr>
                            <th>Responsibilities : </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $responsibilities = is_array($jobpositiondetails->responsibilities)
                                            ? $jobpositiondetails->responsibilities
                                            : json_decode($jobpositiondetails->responsibilities, true) ?? [];
                        @endphp

                        @if(count($responsibilities) > 0)
                            @foreach($responsibilities as $index => $name)
                                <tr>
                                    <td>
                                        <input type="text" name="responsibilities[]" id="responsibilities" class="form-control @error('responsibilities.' . $index) is-invalid @enderror" value="{{ $name }}" placeholder="Enter Responsibilities">
                                        @error('responsibilities.' . $index)
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </td>
                                    <td>
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addResponsibilitiesRow">+ Add</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <input type="text" name="responsibilities[]" id="responsibilities" class="form-control" placeholder="Enter Responsibilities">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="addRequirementsRow">+ Add</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{-- CTC --}}
                <h5 class="p-2 text-primary">CTC :</h5>
                <table class="table table-bordered p-3" id="dynamicCTCTable">
                    <thead>
                        <tr>
                            <th>CTC : </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $salary = is_array($jobpositiondetails->salary)
                                            ? $jobpositiondetails->salary
                                            : json_decode($jobpositiondetails->salary, true) ?? [];
                        @endphp

                        @if(count($salary) > 0)
                            @foreach($salary as $index => $name)
                                <tr>
                                    <td>
                                        <input type="text" name="salary[]" id="salary" class="form-control @error('salary.' . $index) is-invalid @enderror" value="{{ $name }}" placeholder="Enter CTC">
                                        @error('salary.' . $index)
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </td>
                                    <td>
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addCTCRow">+ Add</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <input type="text" name="salary[]" id="salary" class="form-control" placeholder="Enter CTC">
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
                        <a href="{{ route('job-position-details.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
@php
    $rowIndex = isset($requirements) ? count($requirements) : 0;
@endphp
{{-- Add More Requirements --}}
<script>
    $(document).ready(function () {
        let rowIndex = {{ $rowIndex }}; // Track the current row index

        $('#addRequirementsRow').click(function () {
            rowIndex++;
            let newRow = `
                <tr>
                    <td>
                        <input type="text" name="requirements[]" id="requirements" class="form-control @error('requirements.' . $rowIndex) is-invalid @enderror " placeholder="Enter Requirements">
                        @error('requirements.' . $rowIndex)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeRequirementsRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicRequirementsTable tbody').append(newRow);
        });

        // Remove row
        $(document).on('click', '.removeRequirementsRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

@php
    $rowIndex = isset($qualification) ? count($qualification) : 0;
@endphp
{{-- Add More Qualification --}}
<script>
    $(document).ready(function () {
        let rowIndex = {{ $rowIndex }}; // Track the current row index

        $('#addQualificationRow').click(function () {
            rowIndex++;
            let newRow = `
                <tr>
                    <td>
                        <input type="text" name="qualification[]" id="qualification" class="form-control @error('qualification.' . $rowIndex) is-invalid @enderror " placeholder="Enter Qualification">
                        @error('qualification.' . $rowIndex)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeQualificationRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicQualificationTable tbody').append(newRow);
        });

        // Remove row
        $(document).on('click', '.removeQualificationRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

@php
    $rowIndex = isset($responsibilities) ? count($responsibilities) : 0;
@endphp
{{-- Add More Responsibilities --}}
<script>
    $(document).ready(function () {
        let rowIndex = {{ $rowIndex }}; // Track the current row index

        $('#addResponsibilitiesRow').click(function () {
            rowIndex++;
            let newRow = `
                <tr>
                    <td>
                        <input type="text" name="responsibilities[]" id="responsibilities" class="form-control @error('responsibilities.' . $rowIndex) is-invalid @enderror " placeholder="Enter Responsibilities">
                        @error('responsibilities.' . $rowIndex)
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeResponsibilitiesRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicResponsibilitiesTable tbody').append(newRow);
        });

        // Remove row
        $(document).on('click', '.removeResponsibilitiesRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>

@php
    $rowIndex = isset($salary) ? count($salary) : 0;
@endphp
{{-- Add More CTC --}}
<script>
    $(document).ready(function () {
        let rowIndex = {{ $rowIndex }}; // Track the current row index
        $('#addCTCRow').click(function () {
            rowIndex++;
            let newRow = `
            <tr>
                <td>
                    <input type="text" name="salary[]" id="salary" class="form-control @error('salary.' . $rowIndex) is-invalid @enderror " placeholder="Enter CTC">
                    @error('salary.' . $rowIndex)
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeCTCRow">Remove</button>
                </td>
            </tr>`;
            $('#dynamicCTCTable tbody').append(newRow);
        });

        // Remove row
        $(document).on('click', '.removeCTCRow', function () {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush
