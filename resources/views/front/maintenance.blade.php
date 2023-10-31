<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Coming Soon Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"/>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/default/app.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/plugins/kbw-countdown/dist/css/jquery.countdown.css') }}"/>

</head>
<body class="pace-top">

<div id="loader" class="app-loader">
    <span class="spinner"></span>
</div>


<div id="app" class="app">
    <div class="coming-soon">
        <div class="coming-soon-header">
            <div class="bg-cover"></div>
            <div class="brand">
                <span class="logo"></span> <b>Our Site</b> Is Under Maintenance
            </div>
            <div class="desc">
                Will back at 31 Oct 2023 23:59 <br>
                <h4>Please be patient</h4>
            </div>
            <div class="h-500px"></div>
            {{--<div class="timer">
                <div id="timer"></div>
            </div>--}}
        </div>


        {{--<div class="coming-soon-content">
            <div class="desc">
                We are launching a closed <b>beta</b> soon!<br/> Sign up to try it before others and be the first to know when we <b>launch</b>.
            </div>
            <div class="input-group input-group-lg mx-auto mb-2">
                <span class="input-group-text border-0 bg-light"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control fs-13px border-0 shadow-none ps-0 bg-light" placeholder="Email Address" />
                <button type="button" class="btn fs-13px btn-dark">Notify Me</button>
            </div>
            <p class="text-gray-500 mb-5">We don't spam. Your email address is secure with us.</p>
            <p>
                <span class="me-2">Follow us on</span>
                <a href="javascript:;" class="mx-1 text-decoration-none text-dark">
                    <i class="fab fa-twitter fa-lg fa-fw text-info"></i> Twitter
                </a>
                <a href="javascript:;" class="mx-1 text-decoration-none text-dark">
                    <i class="fab fa-facebook-square fa-lg fa-fw text-blue"></i> Facebook
                </a>
            </p>
        </div>--}}
    </div>

    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>


<script type="text/javascript" src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/plugins/kbw-countdown/dist/js/jquery.plugin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/kbw-countdown/dist/js/jquery.countdown.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/demo/coming-soon.demo.js') }}"></script>

</body>
</html>
