@extends('layouts.master')

@section('page-title', 'Agents')
@section('page-header', 'Agents')
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
                    <a href="{{ route('apps.agent.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Agent
                    </a>
                </div>
            </div>

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th class="text-center" width="1%">No.</th>
                    <th>Booth Type</th>
                    <th>Normal Price</th>
                    <th>Early Bird Price</th>
                    <th width="1%">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($agents as $agent)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $agent->hall->name }}</td>
                    <td>{{ $agent->section->name }}</td>
                    <td>{{ $agent->name }}</td>
                    <td>
                        {{--<a href="{{ route('apps.exhibition.hall.show', $hall) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>--}}
                        <a href="{{ route('apps.agent.edit', $agent) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('apps.agent.destroy', $agent->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
