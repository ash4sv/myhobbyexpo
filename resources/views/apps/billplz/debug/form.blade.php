@extends('layouts.master')

@section('page-title', 'Debug BillPlz Form')
@section('page-header', 'Debug BillPlz Form')
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
                <div class="col-md-6 mx-auto">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input class="form-control" type="email" name="" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Contact Number</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Value</label>
                            <input class="form-control" type="text" name="" id="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-90px">Save</button>
                            <button type="reset" class="btn btn-lime w-90px">Reset</button>
                            <a href="{{ route('apps.agent.index') }}" class="btn btn-yellow w-90px">Back</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
