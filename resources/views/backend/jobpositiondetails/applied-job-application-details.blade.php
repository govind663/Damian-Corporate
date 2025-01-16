@extends('backend.layouts.master')

@section('title')
Damian Corporate | View Applied Job Application
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
                        <h4>View Applied Job Application</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('applied-job-application.list') }}">Manage Applied Job Application</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                View Applied Job Application
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <div class="pd-20 card-box mb-30">
            <div class="form-group row mt-3">
                <label class="col-sm-2"><b>Name : </b></label>
                <div class="col-sm-4 col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $sendcareeremailsdetails->name ?? '' }}">
                </div>

                <label class="col-sm-2"><b>Address : </b></label>
                <div class="col-sm-4 col-md-4">
                    <textarea type="text" readonly class="form-control" style="height: 90px !important;" value="{{ $sendcareeremailsdetails->address ?? '' }}">{{ $sendcareeremailsdetails->address ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-group row mt-3">
                <label class="col-sm-2"><b>Phone : </b></label>
                <div class="col-sm-4 col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $sendcareeremailsdetails->phone ?? '' }}">
                </div>

                <label class="col-sm-2"><b>Email : </b></label>
                <div class="col-sm-4 col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $sendcareeremailsdetails->email ?? '' }}">
                </div>
            </div>

            @php
                $jobPosition = DB::table('job_positions')->where('id', $sendcareeremailsdetails->job_position_id)->first();
            @endphp
            <div class="form-group row mt-3">
                <label class="col-sm-2"><b>Job Position : </b></label>
                <div class="col-sm-4 col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $jobPosition->job_title ?? '' }}">
                </div>

                <label class="col-sm-2"><b>Year of Experience : </b></label>
                <div class="col-sm-4 col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $sendcareeremailsdetails->experience ?? '' }}">
                </div>
            </div>

            <div class="form-group row mt-3">
                <label class="col-sm-2"><b>Resume Document :</b></label>
                <div class="col-sm-4 col-md-4">
                    @if(!empty($sendcareeremailsdetails->resume))
                        @php
                            $fileExtension = pathinfo($sendcareeremailsdetails->resume, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']))
                            <!-- Preview for images -->
                            <img src="{{ asset('/damian_corporate/send_carrer_email/resume/' . $sendcareeremailsdetails->resume) }}" alt="Resume Image" style="width: 100%; height: 200px;">
                        @elseif(strtolower($fileExtension) === 'pdf')
                            <!-- Preview for PDFs -->
                            <iframe src="{{ asset('/damian_corporate/send_carrer_email/resume/' . $sendcareeremailsdetails->resume) }}" style="width: 100%; height: 200px;" frameborder="0"></iframe>
                        @else
                            <!-- Message for unsupported file types -->
                            <p>Unsupported file type. Please upload an image or PDF.</p>
                        @endif
                    @else
                        <p>No document uploaded.</p>
                    @endif
                </div>

                <label class="col-sm-2"><b>Portfolio Document : </b></label>
                <div class="col-sm-4 col-md-4">
                    @if(!empty($sendcareeremailsdetails->portfolio))
                        @php
                            $fileExtension = pathinfo($sendcareeremailsdetails->portfolio, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']))
                            <!-- Preview for images -->
                            <img src="{{ asset('/damian_corporate/send_carrer_email/portfolio/' . $sendcareeremailsdetails->portfolio) }}" alt="Portfolio Image" style="width: 100%; height: 200px;">
                        @elseif(strtolower($fileExtension) === 'pdf')
                            <!-- Preview for PDFs -->
                            <iframe src="{{ asset('/damian_corporate/send_carrer_email/portfolio/' . $sendcareeremailsdetails->portfolio) }}" style="width: 100%; height: 200px;" frameborder="0"></iframe>
                        @else
                            <!-- Message for unsupported file types -->
                            <p>Unsupported file type. Please upload an image or PDF.</p>
                        @endif
                    @else
                        <p>No document uploaded.</p>
                    @endif
                </div>
            </div>

            <div class="form-group row mt-3">
                <label class="col-sm-2"><b>Message : </b></label>
                <div class="col-sm-10 col-md-10">
                    @if(!empty($sendcareeremailsdetails->messege))
                        <textarea type="text" readonly class="form-control" style="height: 90px !important;">{!! $sendcareeremailsdetails->messege ?? '' !!}</textarea>
                    @else
                        <p>No message available.</p>
                    @endif
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-md-3"></label>
                <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                    <a href="{{ route('applied-job-application.list') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>

        </div>

    </div>

    <!-- Footer Start -->
    <x-backend.footer />
    <!-- Footer Start -->
</div>
@endsection

@push('scripts')
@endpush
