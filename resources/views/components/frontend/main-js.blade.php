<!-- JS here -->
<script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}" defer type="text/javascript" charset="utf-8" ></script>
<script src="{{ asset('frontend/assets/js/three.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/gsap.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/gsap-scroll-to-plugin.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/gsap-scroll-trigger.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/gsap-scroll-smoother.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/gsap-split-text.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/hover-effect.umd.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/vendor/waypoints.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-bundle.js') }}" defer type="text/javascript" charset="utf-8"></script>
{{-- <script src="frontend/assets/js/ajax-form.js" defer type="text/javascript" charset="utf-8"></script> --}}
<script src="{{ asset('frontend/assets/js/imagesloaded-pkgd.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/isotope-pkgd.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/jarallax.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/magnific-popup.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/nice-select.js') }}" defer type="text/javascript" charset="utf-8"></script>
{{-- <script src="frontend/assets/js/purecounter.js" defer type="text/javascript" charset="utf-8"></script>
<script src="frontend/assets/js/range-slider.js" defer type="text/javascript" charset="utf-8"></script> --}}
<script src="{{ asset('frontend/assets/js/wow.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/slick.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/swiper-bundle.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/services-slider.js') }}" defer type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}" defer type="text/javascript" charset="utf-8"></script>

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
