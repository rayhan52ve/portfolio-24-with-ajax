<!-- Vendor Scripts Start -->
<script src="{{ asset('backend/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('backend/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/js/vendor/OverlayScrollbars.min.js') }}"></script>
<script src="{{ asset('backend/js/vendor/autoComplete.min.js') }}"></script>
<script src="{{ asset('backend/js/vendor/clamp.min.js') }}"></script>
<script src="{{ asset('backend/icon/acorn-icons.js') }}"></script>
<script src="{{ asset('backend/icon/acorn-icons-interface.js') }}"></script>
<script src="{{ asset('backend/icon/acorn-icons-commerce.js') }}"></script>

<script src="{{ asset('backend/js/vendor/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('backend/js/vendor/chartjs-plugin-rounded-bar.min.js') }}"></script>
<script src="{{ asset('backend/js/vendor/jquery.barrating.min.js') }}"></script>

<!-- Vendor Scripts End -->

<!-- Template Base Scripts Start -->
<script src="{{ asset('backend/js/base/helpers.js') }}"></script>
<script src="{{ asset('backend/js/base/globals.js') }}"></script>
<script src="{{ asset('backend/js/base/nav.js') }}"></script>
<script src="{{ asset('backend/js/base/search.js') }}"></script>
<script src="{{ asset('backend/js/base/settings.js') }}"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->

<script src="{{ asset('backend/js/cs/charts.extend.js') }}"></script>
<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('backend/js/common.js') }}"></script>
<script src="{{ asset('backend/js/scripts.js') }}"></script>
<script src="{{ asset('backend/js/base/loader.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
{{-- sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- bootbox --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js"
    integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- Data Table --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- CSRF Token and AJAX Setup -->
<script>
    $(document).ready(function() {
        // Set up AJAX to use CSRF token for all requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

@stack('js')
