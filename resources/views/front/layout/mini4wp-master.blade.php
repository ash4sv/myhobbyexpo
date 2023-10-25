<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MINI 4WD MHX CUP 2023 | Welcome</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/blog/vendor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/blog/app.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/boxed-check/css/boxed-check.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>

<div class="bg-mhx-grey">
    <div style="background-image: url({{ asset('assets/images/mini-4wd/finish-flag@4x.png') }}); background-repeat: repeat-x; background-size: auto 30px; background-position-y:bottom;">
        <div class="container p-sm-5 p-3 py-4">
            <a href="{{ route('mhxcup.register') }}">
                <img src="{{ asset('assets/images/mini-4wd/mini-4wd-mhxcup@4x.png') }}" alt="" class="img-fluid d-block mx-auto">
            </a>
        </div>
    </div>
</div>

@yield('page-minicup')

<div class="bg-mhx-red">
    <div class="container p-sm-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-8">
                <img src="{{ asset('assets/images/mini-4wd/footer-celebrate@4x.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/images/mini-4wd/organized-by@4x.png') }}" alt="" class="d-block mx-auto h-50px">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('assets/images/mini-4wd/supported-by@4x.png') }}" alt="" class="d-block mx-auto h-50px">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('assets/js/blog/vendor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/blog/app.min.js') }}"></script>

@stack('onpagescript')

</body>
</html>
