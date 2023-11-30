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
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/boxed-check/css/boxed-check.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/powerful-pdf-viewer/css/pdfviewer.jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>

<div id="scorebody" class="container-fluid bg-mhx-red text-white">
    <div class="row">
        <div class="apps-col col-6">
            <h1 class="text-center pt-4 font-weight-700">{{ $category->category_name }}</h1>
            <h2 class="text-center pb-4 font-weight-400">{{ $track->track_name }}</h2>

            <table class="table-score table text-center text-white">
                <tbody>
                @foreach($listRaces as $races)
                <tr>
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
        <div class="apps-col col-6">
            <div class="row-apps">

            </div>
            <div class="row-apps">

            </div>
            <div class="row-apps">

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('assets/js/blog/vendor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/blog/app.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/fancyapps/fancybox.umd.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-validate/jquery-validate.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/powerful-pdf-viewer/js/pdfviewer.jquery.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('assets/js/demo/login-v2.demo.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('assets/js/front.js') }}"></script>--}}
<script>
    $(document).ready(function () {
        var bodyWidth = $('body').width();
        var bodyHeight = $('body').height();

        var tableWidth = $('.table-score').width();

        $('.apps-col').height(bodyHeight);
        $('.row-apps').height(bodyHeight / 3);
        $('.table-score tr td').width(tableWidth / 3);

        setInterval(function() {
            $('#scorebody').load(window.location.href + ' #scorebody .apps-col');
            console.log(this);
        }, 5000);
    });
</script>

</body>
</html>
