@extends('layouts.master')

@section('page-title', 'Exhibition Booth')
@section('page-header', 'Exhibition Booth')
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

            {{--<div class="d-flex align-items-center mb-3">
                <div class="me-auto">
                    <a href="{{ route('apps.exhibition.booth.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Booth
                    </a>
                </div>
            </div>--}}

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th class="text-center" width="1%">No.</th>
                    <th>shopref</th>
                    <th>billplz_id</th>
                    <th>collection_id</th>
                    <th>paid</th>
                    <th>state</th>
                    <th>amount</th>
                    <th>paid_amount</th>
                    <th>due_at</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>name</th>
                    <th>url</th>
                    <th>paid_at</th>
                    <th>x_signature</th>
                    <th width="1%">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($webhook as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->shopref }}</td>
                        <td>{{ $data->billplz_id }}</td>
                        <td>{{ $data->collection_id }}</td>
                        <td>{{ $data->paid }}</td>
                        <td>{{ $data->state }}</td>
                        <td>{{ $data->amount / 100 }}</td>
                        <td>{{ $data->paid_amount / 100 }}</td>
                        <td>{{ $data->due_at }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->mobile }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->url }}</td>
                        <td>{{ $data->paid_at }}</td>
                        <td>{{ $data->x_signature }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>

@endsection
