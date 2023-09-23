@extends('layouts.master')

@section('page-title', 'Pre-Register')
@section('page-header', 'Pre-Register')
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
            <h4 class="panel-title">Selling Vendor</h4>
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
                    <th width="1%">No.</th>
                    <th class="w-25">Company / Shop / Group / Association / Club / Society</th>
                    <th>Name of Person in Charge</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($selling_vendor as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name_company }}</td>
                        <td>{{ $item->person_in_charge }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>{{ $item->email }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Company / Shop / Group / Association / Club / Society</th>
                    <th>Name of Person in Charge</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>

    <!-- ========= -->

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Hobby Activity</h4>
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
                    <th width="1%">No.</th>
                    <th class="w-25">Company / Shop / Group / Association / Club / Society</th>
                    <th>Name of Person in Charge</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hobby_activity as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name_company }}</td>
                        <td>{{ $item->person_in_charge }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>{{ $item->email }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Company / Shop / Group / Association / Club / Society</th>
                    <th>Name of Person in Charge</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>

    <!-- ========= -->


    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Hobby Show Off</h4>
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
                    <th width="1%">No.</th>
                    <th class="w-25">Company / Shop / Group / Association / Club / Society</th>
                    <th>Name of Person in Charge</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hobby_showoff as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name_company }}</td>
                        <td>{{ $item->person_in_charge }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>{{ $item->email }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Company / Shop / Group / Association / Club / Society</th>
                    <th>Name of Person in Charge</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>#</th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>

@endsection
