@extends('layouts.master')

@section('page-title', 'Edit Permissions')
@section('page-header', 'Edit Permissions')
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

            <form action="{{ route('apps.acl.permissions.update', $permission) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control" id="permission" name="permission" value="{{ old('name', $permission->name) }}">
                </div>
                <div class="mb-0">
                    <input type="submit" class="btn btn-yellow" value="Save">
                </div>
            </form>

        </div>
    </div>

@endsection
