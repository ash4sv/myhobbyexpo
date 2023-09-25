@extends('layouts.master')

@section('page-title', 'Permissions')
@section('page-header', 'Permissions')
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

            <div class="d-flex align-items-center mb-3">
                <div class="me-auto">
                    <a href="{{ route('apps.acl.permissions.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Permissions
                    </a>
                </div>
            </div>

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th width="1%">No.</th>
                    <th width="10%">Name</th>
                    <th>Guard</th>
                    <th width="1%">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>
                            <a href="{{ route('apps.acl.permissions.show', $permission) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('apps.acl.permissions.edit', $permission) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('apps.acl.permissions.destroy', $permission->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
