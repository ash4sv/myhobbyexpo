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

            <div class="d-flex align-items-center mb-3">
                <div class="me-auto">
                    <a href="{{ route('apps.event-mhx-cup.races.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Races
                    </a>
                </div>
            </div>

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th class="text-center" width="1%">No.</th>
                    <th width="2%">Category</th>
                    <th>Track</th>
                    <th>Line 1</th>
                    <th>Line 2</th>
                    <th>Line 3</th>
                    <th>Date Race</th>
                    <th>Time Race</th>
                    <th>Status</th>
                    <th width="1%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($races as $race)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>@isset($race->mhxcategory) {{ $race->mhxcategory->category_name }}@endisset</td>
                        <td>@isset($race->mhxcupctrack) {{ $race->mhxcupctrack->track_name }} @endisset</td>
                        <td>@isset($race->mhxracer1) {{ $race->mhxracer1->racer_name }}@endisset</td>
                        <td>@isset($race->mhxracer2) {{ $race->mhxracer2->racer_name }} @endisset</td>
                        <td>@isset($race->mhxracer3) {{ $race->mhxracer3->racer_name }}@endisset</td>
                        <td>{{ $race->racing_date }}</td>
                        <td>{{ $race->racing_time }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
