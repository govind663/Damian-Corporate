<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head Start -->
    <x-backend.head />

    @stack('styles')
</head>

<body>
    {{-- Pre Loader Start --}}
    {{-- <x-backend.pre-loader /> --}}
    {{-- Pre Loader End --}}

    <!-- Header Start -->
    <x-backend.header />
    <!-- Header End -->

    <!-- Sidebar Start -->
    <x-backend.sidebar />
    <!-- Sidebar End -->

    <div class="main-container">
        <!-- Page Wrapper Start -->
        @yield('content')
        <!-- Page Wrapper End -->
    </div>

    <!-- Start Main JS  -->
    <x-backend.main-js />
    <!-- End Main JS  -->

    {{-- Custom Js --}}
    @stack('scripts')
</body>

</html>
