@extends('backend.layouts.master')

@section('title')
Damian Corporate | Home
@endsection

@push('styles')
@endpush

@section('content')
<div class="xs-pd-20-10 pd-ltr-20">

    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Dashboard</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="title pb-20">
        <h2 class="h3 mb-0">Project Overview</h2>
    </div>

    <div class="row pb-10">
        <!-- Total Projects -->
        <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
            <div class="card-box height-100-p widget-style3">
                <div class="d-flex flex-wrap">
                    <div class="widget-data">
                        <div class="weight-700 font-24 text-dark">
                            {{ $totalProjects ?? '0' }}
                        </div>
                        <div class="font-14 text-secondary weight-500">
                            <span class="text-secondary">Total Projects</span>
                        </div>
                    </div>
                    <div class="widget-icon">
                        <div class="icon" data-color="#ffffff">
                            <i class="icon-copy dw dw-file"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dynamic Category Projects -->
        @foreach ($projectCounts as $categoryName => $count)
            <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
                <div class="card-box height-100-p widget-style3">
                    <div class="d-flex flex-wrap">
                        <div class="widget-data">
                            <div class="weight-700 font-24 text-dark">
                                {{ $count ?? '0' }}
                            </div>
                            <div class="font-14 text-secondary weight-500">
                                <span class="text-secondary">Total {{ $categoryName }} Projects</span>
                            </div>
                        </div>
                        <div class="widget-icon">
                            <div class="icon" data-color="#ffffff">
                                <i class="icon-copy dw dw-file"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Footer Start -->
    <x-backend.footer />
    <!-- Footer Start -->

</div>
@endsection

@push('scripts')
@endpush
