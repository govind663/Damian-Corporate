<head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>@yield('title')</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/fav-dp.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

    <!-- Toaster CSS / JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
