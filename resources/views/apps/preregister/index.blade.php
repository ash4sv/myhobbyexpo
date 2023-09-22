@extends('layouts.master')

@section('page-title', 'Pre-Register')
@section('page-header', 'Pre-Register')
@section('description', '')

@section('content')

    <div class="table-responsive" id="table">
        <table class="table table-thead-sticky table-tfoot-sticky table-tbody-bordered table-px-10px table-py-4px table-sm table-striped text-nowrap mb-0">
            <thead>
            <tr>
                <th class="w-60px">No.</th>
                <th class="w-25">Company / Shop / Group / Association / Club / Society</th>
                <th>Name of Person in Charge</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Group / Team Members </th>
                <th>Selection</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            @foreach($registers as $register)
            <tr>
                <td></td>
                <td>{{ $register->name_company }}</td>
                <td>{{ $register->person_in_charge }}</td>
                <td>{{ $register->contact_no }}</td>
                <td>{{ $register->email }}</td>
                <td>{{ $register->group_team_members }}</td>
                <td>{{ $register->selection_in }}</td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>


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



        </div>
    </div>

@endsection
