<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head Start -->
    <x-frontend.head />

    @stack('styles')
</head>

<body>
    {{-- Pre Loader Start --}}
    {{-- <x-frontend.pre-loader /> --}}
    {{-- Pre Loader End --}}

    <div class="body-overlay"></div>

    <!-- Header Start -->
    <x-frontend.header />
    <!-- Header End -->

    <!-- Page Wrapper Start -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <!-- Start Main Content  -->
            <main>
                @yield('content')
            </main>
            <!-- End Main Content  -->

            <!-- Start Footer  -->
            <x-frontend.footer />
            <!-- End Footer  -->
        </div>
    </div>
    <!-- Page Wrapper End -->

    <!-- back to top area start -->
    <x-frontend.back-to-top />
    <!-- back to top area end -->

    <!-- Start Main JS  -->
    <x-frontend.main-js />
    <!-- End Main JS  -->

    {{-- Custom Js --}}
    @stack('scripts')
</body>

</html>
