@extends('layouts.master')

@section('page-title', 'Logs')
@section('page-header', 'Logs')
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
            <h4 class="panel-title">@yield('page-title')</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Log Name</td>
                    <td>Description</td>
                    <td>Subject Type</td>
                    <td>Event</td>
                    <td>Subject Id</td>
                    <td>Causer Type</td>
                    <td>Causer Id</td>
                    <td>Properties</td>}}
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->log_name }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->subject_type }}</td>
                    <td>{{ $log->event }}</td>
                    <td>{{ $log->subject_id }}</td>
                    <td>{{ $log->causer_type }}</td>
                    <td>{{ $log->causer_id }}</td>
                    <td>{{ json_encode($log->properties) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
