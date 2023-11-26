@extends('layouts.master')

@section('page-title', 'MHX Cup Races')
@section('page-header', 'MHX Cup Races')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title"></h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h3 class="font-weight-700">{{ $race->mhxcategory->category_name }}</h3>
                    <h3 class="font-weight-700">{{ $race->mhxcupctrack->track_name }}</h3>
                    <h3 class="font-weight-700">{{ $race->mhxcupctrack->track_layouts }}</h3>

                    <div class="card-group">
                        <div class="card">
                            {{--<img src="..." class="card-img-top" alt="">--}}
                            <div class="card-body text-center">
                                <h1 class="card-title">Line 1</h1>
                                <div class="square-box d-flex justify-content-center align-items-center mb-3 bg-blue">
                                    <div class="text-white">
                                        <h1 class="font-weight-700">{{ $race->mhxracer1->racer_name }}</h1>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-lg" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-success">Win</button>
                                    <button type="button" class="btn btn-danger">Lose</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            {{--<img src="..." class="card-img-top" alt="">--}}
                            <div class="card-body text-center">
                                <h1 class="card-title">Line 2</h1>
                                <div class="square-box d-flex justify-content-center align-items-center mb-3 bg-red">
                                    <div class="text-white">
                                        <h1 class="font-weight-700">{{ $race->mhxracer2->racer_name }}</h1>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-lg" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-success">Win</button>
                                    <button type="button" class="btn btn-danger">Lose</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            {{--<img src="..." class="card-img-top" alt="">--}}
                            <div class="card-body text-center">
                                <h1 class="card-title">Line 3</h1>
                                <div class="square-box d-flex justify-content-center align-items-center mb-3 bg-yellow">
                                    <div class="text-white">
                                        <h1 class="font-weight-700">{{ $race->mhxracer3->racer_name }}</h1>
                                    </div>
                                </div>
                                <div class="btn-group btn-group-lg" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-success">Win</button>
                                    <button type="button" class="btn btn-danger">Lose</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            function adjustSquareBox() {
                var width = $('.square-box').width();
                $('.square-box').css('height', width + 'px');
            }

            adjustSquareBox();
            $(window).resize(adjustSquareBox);
        });
    </script>
@endpush
