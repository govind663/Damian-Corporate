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

    {{-- Robots Meta Tags --}}
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script'
            , 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1372951323690549');
        fbq('track', 'PageView');

    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1372951323690549&ev=PageView&noscript=1" /></noscript>

    <!-- End Meta Pixel Code -->

    {{-- Security Policy --}}
    {{-- <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self';"> --}}

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
