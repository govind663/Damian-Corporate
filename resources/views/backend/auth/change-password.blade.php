@extends('backend.layouts.master')

@section('title')
Visen - Admin | Change Password
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
                            <h4>Change Password</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Change Password
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('update-password') }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf

                <div class="pd-20 card-box mb-30">
                    <div class="col-lg-6">
                        <div class="input-block mb-3">
                            <label><b>Current Password : <span class="text-danger">*</span></b></label>
                            <input type="password"  id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}" placeholder="Enter Current Password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="input-block mb-3">
                            <label><b>New Pasword : <span class="text-danger">*</span></b></label>
                            <input type="password"  id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter New Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="input-block mb-3">
                            <label><b>Confirm Pasword : <span class="text-danger">*</span></b></label>
                            <input type="password"  id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" placeholder="Enter Confirm Password">

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-md-3"></label>
                        <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
@endpush
