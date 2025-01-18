<head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

    {{-- SEO --}}
    <meta name="description" content="Damian Corporate">
    <meta name="keywords" content="Damian Corporate, Damian, Corporate">
    <meta name="author" content="Damian Corporate,">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/fav-dp.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome-pro.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/spacing.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom-animation.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" type="text/css">

    <!-- Toaster Message -->
    <script src="{{ asset('frontend/assets/toastr/js/jquery.min.js') }}" async defer type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/toastr/css/toastr.min.css') }}" type="text/css">
    <script src="{{ asset('frontend/assets/toastr/js/toastr.min.js') }}" async defer type="text/javascript"></script>
</head>
