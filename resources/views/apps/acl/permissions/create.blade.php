@extends('layouts.master')

@section('page-title', 'New Permissions')
@section('page-header', 'New Permissions')
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

            <form action="{{ route('apps.acl.permissions.store') }}" method="POST">
                @csrf
                <table id="permissionForm" class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th width="3%" class="text-center">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="permissions[0][name]" value=""></td>
                        <td class="text-center">
                            <a id="fieldAdd" class="btn btn-info" href="#"><i class="fa fa-plus-square"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-yellow w-100px" value="Save">
                <input type="reset" class="btn btn-warning w-100px" value="Reset">
            </form>

        </div>
    </div>

@endsection
