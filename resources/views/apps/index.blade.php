@extends('layouts.master')

@section('page-title', 'Dashboard')
@section('page-header', 'Dashboard')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <div class="row">
        <div class="col-md-3">
            <!-- begin widget-stats -->
            <div class="widget widget-stats bg-indigo mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Selling Vendor</div>
                    <div class="stats-number">{{ count($selling_vendor) }}</div>
                    {{--<div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>--}}
                </div>
            </div>
            <!-- end widget-stats -->
        </div>
        <div class="col-md-3">
            <!-- begin widget-stats -->
            <div class="widget widget-stats bg-purple mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Hobby Activity</div>
                    <div class="stats-number">{{ count($hobby_activity) }}</div>
                    {{--<div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>--}}
                </div>
            </div>
            <!-- end widget-stats -->
        </div>
        <div class="col-md-3">
            <!-- begin widget-stats -->
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Hobby Show-off</div>
                    <div class="stats-number">{{ count($hobby_showoff) }}</div>
                    {{--<div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>--}}
                </div>
            </div>
            <!-- end widget-stats -->
        </div>
        <div class="col-md-3">
            <!-- begin widget-stats -->
            <div class="widget widget-stats bg-orange mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Interested Sponsors</div>
                    <div class="stats-number">{{ count($sponsors) }}</div>
                    {{--<div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>--}}
                </div>
            </div>
            <!-- end widget-stats -->
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">DAILY REGISTER</h4>
                    <div class="panel-heading-btn">
                        {{--<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>--}}
                    </div>
                </div>
                <div class="panel-body">

                    <div id="interactive-chart" class="h-250px"></div>

                </div>
            </div>

        </div>
    </div>



@endsection

@push('script')
    <script>
        @php $index = 0 @endphp

        var d1 = [
            @foreach($dailyCounts as $data) [
                {{ $index++ }}, {{ $data->count }}],
            @endforeach
        ];

        $.plot($('#interactive-chart'), [{
            data: d1,
            label: 'Register',
            color: 'rgb(73, 120, 207)',
            lines: { show: true, fill:false, lineWidth: 2.5 },
            points: { show: true, radius: 5, fillColor: '#ffffff' },
            shadowSize: 0
        }], {
            xaxis: {  tickColor: 'rgba('+ '88, 94, 94' + ', .3)',tickSize: 2 },
            yaxis: {  tickColor: 'rgba('+ '88, 94, 94' + ', .3)', tickSize: 20 },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: 'rgba('+ '88, 94, 94' + ', .15)',
                borderWidth: 1,
                borderColor: 'rgba('+ '88, 94, 94' + ', .15)',
                backgroundColor: 'rgba('+ '88, 94, 94' + ', .035)'
            },
            legend: {
                noColumns: 1,
                show: true
            }
        });
    </script>

@endpush
