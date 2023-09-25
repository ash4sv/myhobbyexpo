<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MHX2023 EXHIBITOR | REGISTRATION</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/default/app.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body class="pace-top myhobbyexpo">

    @include('layouts.loader')

    <div id="app" class="app py-4">
        <div class="container">
            <div class="col-md-12 mx-auto">

                @yield('reg-form')

            </div>
        </div>

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>

    <script src="{{ asset('assets/js/vendor.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('assets/js/demo/login-v2.demo.js') }}" type="text/javascript"></script>
    @include('sweetalert::alert')
    <script>
        $(".default-select2").select2();
        /*$(".masked-input-phone").mask("+6099 9999 9999");*/
    </script>

    @stack('reg-script')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FL2B81V05J"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-FL2B81V05J');
    </script>

</body>
</html>
