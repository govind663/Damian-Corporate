<!-- JS here -->
<script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
<script src="{{ asset('frontend/assets/js/three.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap-scroll-to-plugin.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap-scroll-trigger.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap-scroll-smoother.js') }}"></script>
<script src="{{ asset('frontend/assets/js/gsap-split-text.js') }}"></script>
<script src="{{ asset('frontend/assets/js/hover-effect.umd.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/waypoints.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-bundle.js') }}"></script>
{{-- <script src="frontend/assets/js/ajax-form.js" charset="utf-8"></script> --}}
<script src="{{ asset('frontend/assets/js/imagesloaded-pkgd.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope-pkgd.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jarallax.js') }}"></script>
<script src="{{ asset('frontend/assets/js/magnific-popup.js') }}"></script>
<script src="{{ asset('frontend/assets/js/nice-select.js') }}"></script>
{{-- <script src="frontend/assets/js/purecounter.js" charset="utf-8"></script>
<script src="frontend/assets/js/range-slider.js" charset="utf-8"></script> --}}
<script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
<script src="{{ asset('frontend/assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('frontend/assets/js/services-slider.js') }}"></script>
{{-- <script src="{{ asset('frontend/assets/js/main.js') }}"></script> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toaster Java Script -->
<script>
    @if(Session::has('message'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"

        }
        toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.options =
        {
            "positionClass": "toast-top-right",
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
