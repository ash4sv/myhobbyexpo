<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>MINI 4WD MHX CUP 2023</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content name="description" />
    <meta content name="author" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/blog/vendor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/blog/app.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancyapps/fancybox.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/boxed-check/css/boxed-check.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/powerful-pdf-viewer/css/pdfviewer.jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body class="bg-mhx-red">
<span id="start"></span>
<div id="scorebody" class="container-fluid">
    <div class="row">
        <div class="apps-col col-6">
            <h1 class="text-center text-white pt-4 font-weight-700">{{ $category->category_name }}</h1>
            <h1 class="text-center text-white pb-4 font-weight-400">{{ $track->track_name }}</h1>
            <div class="datareload">
                <table class="table table-bordered text-center text-white">
                    <tbody>
                    @foreach($listRaces as $races)
                        <tr>
                            <td class="py-3"><h2 class="m-0 p-0">{{ $loop->iteration }}</h2></td>
                            <td class="py-3">
                                <h2 class="m-0 p-0">@isset($races->mhxscoreRacer_1) {{ $races->mhxscoreRacer_1->racer_name }} @endisset</h2>
                            </td>
                            <td class="py-3">
                                <h2 class="m-0 p-0">@isset($races->mhxscoreRacer_2) {{ $races->mhxscoreRacer_2->racer_name }} @endisset</h2>
                            </td>
                            <td class="py-3">
                                <h2 class="m-0 p-0">@isset($races->mhxscoreRacer_3) {{ $races->mhxscoreRacer_3->racer_name }} @endisset</h2>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="apps-col col-6">
            <div class="row-apps d-flex justify-content-center">
                <div class="row align-items-center gx-5">
                    <div class="col-md-5">
                        <img class="d-block mx-auto h-300px" src="{{ asset('assets/images/mini-4wd/mini-4wd-mhxcup-round@4x.png') }}" alt="">
                    </div>
                    <div class="col-md-5">
                        <img class="d-block mx-auto h-250px" src="{{ asset('assets/images/mini-4wd/sponsor/mhxcup-logo@3x.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row-apps">

            </div>
            <div class="row-apps d-flex align-items-center">

                <div class="f-carousel" id="myCarousel">
                    <div class="f-carousel__viewport">
                        <div class="f-carousel__track">
                            <div class="f-carousel__slide">
                                <img class="img-fluid" src="{{ asset('assets/images/mini-4wd/sponsor/sponsor_1@3x.png') }}" alt="">
                            </div>
                            <div class="f-carousel__slide">
                                <img class="img-fluid" src="{{ asset('assets/images/mini-4wd/sponsor/sponsor_5@3x.png') }}" alt="">
                            </div>
                            <div class="f-carousel__slide">
                                <img class="img-fluid" src="{{ asset('assets/images/mini-4wd/sponsor/sponsor_6@3x.png') }}" alt="">
                            </div>
                            <div class="f-carousel__slide">
                                <img class="img-fluid" src="{{ asset('assets/images/mini-4wd/sponsor/sponsor_7@3x.png') }}" alt="">
                            </div>
                            <div class="f-carousel__slide">
                                <img class="img-fluid" src="{{ asset('assets/images/mini-4wd/sponsor/sponsor_8@3x.png') }}" alt="">
                            </div>
                            <div class="f-carousel__slide">
                                <img class="img-fluid" src="{{ asset('assets/images/mini-4wd/sponsor/sponsor_9@3x.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>--}}
    </div>
</div>
<span id="end"></span>

<script type="text/javascript" src="{{ asset('assets/js/blog/vendor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/blog/app.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/fancyapps/fancybox.umd.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.autoplay.umd.js"></script>

<script type="text/javascript" src="{{ asset('assets/plugins/jquery-validate/jquery-validate.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/powerful-pdf-viewer/js/pdfviewer.jquery.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/demo/login-v2.demo.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('assets/js/front.js') }}"></script>--}}
<script>


    $(document).ready(function () {
        function down() {
            $('html, body').animate({ scrollTop: $('#end').offset().top }, 20000);
            up();
        };
        function up() {
            $('html, body').animate({ scrollTop: $('#start').offset().top }, 20000);
            down();
        };
        $(document).ready(function () {
            down();
        });


        var bodyWidth = $('body').width();
        var bodyHeight = $('body').height();

        /*var tableWidth = $('.table-score').width();*/

        /*$('.apps-col').height(bodyHeight);
        $('.row-apps').height(bodyHeight / 3);*/
        $('.table-score tr td').width(tableWidth / 3);

        setInterval(function() {
            $('#scorebody').load(window.location.href + ' #scorebody .apps-col');
            console.log(this);
        }, 5000);

        const container = document.getElementById("myCarousel");
        const options = {
            infinite: true,
            adaptiveHeight: true,
            Navigation: false,
            Autoplay: {
                timeout: 4000,
            },
        };

        new Carousel(container, options, { Autoplay });
    });
</script>

</body>
</html>
