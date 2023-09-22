<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MHX2023 EXHIBITOR | LOGIN</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/default/app.min.css') }}" rel="stylesheet" />

</head>
<body class="pace-top">

@include('layouts.loader')

    <div id="app" class="app">

        <div class="login login-v2 fw-bold">

            <div class="login-cover">
                <div class="login-cover-img" style="background-image: url(../assets/img/login-bg/login-bg-17.jpg)" data-id="login-cover-image"></div>
                <div class="login-cover-bg"></div>
            </div>


            <div class="login-container">

                <div class="login-header">
                    <div class="brand">
                        <div class="d-flex align-items-center">
                            <span class="logo"></span> <b class="pe-5px">MHX2023</b> Exhibitor
                        </div>
                        <small>The Biggest Hobby Expo In South East Asia!</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>


                <div class="login-content">
                    <form action="{{ route('apps.login') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-20px">
                            <input name="email" type="email" class="form-control fs-13px h-45px border-0 @error('email') is-invalid @enderror" placeholder="Email Address" id="emailAddress" />
                            <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-20px">
                            <input name="password" type="password" class="form-control fs-13px h-45px border-0 @error('password') is-invalid @enderror" placeholder="Password" />
                            <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{--<div class="form-check mb-20px">
                            <input class="form-check-input border-0" type="checkbox" value="1" id="rememberMe" />
                            <label class="form-check-label fs-13px text-gray-500" for="rememberMe">
                                Remember Me
                            </label>
                        </div>--}}
                        <div class="mb-20px">
                            <button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Sign me in</button>
                        </div>
                        {{--<div class="text-gray-500">
                            Not a member yet? Click <a href="javascript:;" class="text-white">here</a> to register.
                        </div>--}}
                    </form>
                </div>

            </div>

        </div>


        <div class="login-bg-list clearfix">
            <div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('assets/img/login-bg/login-bg-17.jpg') }}" style="background-image: url({{ asset('assets/img/login-bg/login-bg-17.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('assets/img/login-bg/login-bg-16.jpg') }}" style="background-image: url({{ asset('assets/img/login-bg/login-bg-16.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('assets/img/login-bg/login-bg-15.jpg') }}" style="background-image: url({{ asset('assets/img/login-bg/login-bg-15.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('assets/img/login-bg/login-bg-14.jpg') }}" style="background-image: url({{ asset('assets/img/login-bg/login-bg-13.jpg') }})"></a></div>
            <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('assets/img/login-bg/login-bg-12.jpg') }}" style="background-image: url({{ asset('assets/img/login-bg/login-bg-12.jpg') }})"></a></div>
        </div>

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>


    <script src="{{ asset('assets/js/vendor.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/app.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/demo/login-v2.demo.js') }}" type="text/javascript"></script>

</body>
</html>
