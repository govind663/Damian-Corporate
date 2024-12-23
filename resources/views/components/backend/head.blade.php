<!-- Basic Page Info -->
<meta charset="utf-8" />

{{-- SEO --}}
<meta name="description" content="Damian Corporate">
<meta name="keywords" content="Damian Corporate, Damian, Corporate">
<meta name="author" content="Damian Corporate,">

<!-- Title -->
<title>@yield('title')</title>

<!-- CSRF Token -->
<meta name="csrf-token" content="content">
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

<!-- Site favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/assets/fav-dp.png') }}" />
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/assets/fav-dp.png') }}" />
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/assets/fav-dp.png') }}" />

<!-- Toaster Message -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/src/plugins/jquery-steps/jquery.steps.css') }}" />

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/styles/core.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/styles/icon-font.min.css') }}" />

<!-- Datatable CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}" />

<!-- bootstrap-tagsinput css -->
<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/styles/style.css') }}" />


<!-- Toaster CSS / JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
