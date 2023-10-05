<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MHX2023 EXHIBITOR | @yield('page-title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/default/app.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote-lite.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/switchery/dist/switchery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancyapps/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" />

</head>
<body>

@include('layouts.loader')

<div id="app" class="app app-header-fixed app-sidebar-fixed app-content-full-height">

    @include('layouts.app-header')

    @include('layouts.app-sidebar')

    <div id="content" class="app-content d-flex flex-column p-0">
        <div class="app-content-padding flex-grow-1 overflow-hidden" data-scrollbar="true" data-height="100%">

            @yield('content')

        </div>
    </div>

    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>

<script type="text/javascript" src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-fixedheader-bs5/js/fixedHeader.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/flot/source/jquery.canvaswrapper.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/flot/source/jquery.colorhelpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/flot/source/jquery.flot.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/flot/source/jquery.flot.saturated.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/flot/source/jquery.flot.browser.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/flot/source/jquery.flot.drawSeries.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/flot/source/jquery.flot.uiConstants.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/pdfmake/build/pdfmake.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/pdfmake/build/vfs_fonts.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jszip/dist/jszip.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/fancyapps/fancybox.umd.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/switchery/dist/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/summernote/dist/summernote-lite.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/demo/login-v2.demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/apps.js') }}"></script>

@include('sweetalert::alert')

@stack('script')

</body>
</html>
