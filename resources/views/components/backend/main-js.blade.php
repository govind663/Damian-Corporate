<!-- js -->
<script src="{{ asset('backend/assets/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/scripts/layout-settings.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/scripts/steps-setting.js') }}"></script>

<script src="{{ asset('backend/assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

<!-- buttons for Export datatable -->
<script src="{{ asset('backend/assets/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

<!-- Datatable Setting js -->
<script src="{{ asset('backend/assets/vendors/scripts/datatable-setting.js') }}"></script>

<!-- bootstrap-tagsinput js -->
<script src="{{ asset('backend/assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

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
