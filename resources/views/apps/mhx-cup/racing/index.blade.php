@extends('layouts.master')

@section('page-title', 'Racing Day')
@section('page-header', 'Racing Day')
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

            <form method="post" action="{{ route('apps.race.store') }}">
                @csrf

                <label class="form-label" for="line_1">Line 1:</label>
                <input class="form-control" type="text" name="line_1" required>

                <button class="btn btn-indigo" type="submit">Submit</button>
            </form>

            <table class="table w-500px">
                <thead>
                <tr>
                    <td>Line 1</td>
                    <td>Line 2</td>
                    <td>Line 3</td>
                </tr>
                </thead>
                <tbody>
                @foreach($racing as $race)
                <tr>
                    <td>
                        @isset($race->line_1)
                            {{ $race->line_1 }}
                        @endisset
                    </td>
                    <td>
                        @isset($race->line_2)
                            {{ $race->line_2 }}
                        @endisset
                    </td>
                    <td>
                        @isset($race->line_3)
                            {{ $race->line_3 }}
                        @endisset
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
