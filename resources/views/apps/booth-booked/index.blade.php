@extends('layouts.master')

@section('page-title', 'Booth Booked')
@section('page-header', 'Booth Booked')
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

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th class="text-center" width="1%">No.</th>
                    <th width="10.88888889%">Invoice Number</th>
                    <th width="10.88888889%">Date</th>
                    <th width="10.88888889%">Company</th>
                    <th width="10.88888889%">Name</th>
                    <th width="10.88888889%">Phone</th>
                    <th width="10.88888889%">Hall | Zone | Booth</th>
                    <th width="10.88888889%">Agent</th>
                    <th width="10.88888889%">Paid</th>
                    <th width="10.88888889%"></th>

                    <th width="1%">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($booths as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data->inv_number }}</td>
                    <td>{{ $data->inv_date }}</td>
                    <td>
                        @isset($data->vendor)
                        {{ $data->vendor->company }}
                        @endisset
                    </td>
                    <td>
                        @isset($data->vendor)
                        {{ $data->vendor->pic_name }}
                        @endisset
                    </td>
                    <td>
                        @isset($data->vendor)
                        {{ $data->vendor->phone_num }}
                        @endisset
                    </td>
                    <td>
                        @isset($data->vendor->registerBooth)
                        @foreach($data->vendor->registerBooth as $booth)
                            <p class="my-0">
                                @isset($booth->sections->hall)
                                {{ $booth->sections->hall->name }} | {{ $booth->sections->name }} |
                                @endisset
                                {{ $booth->booth_number }}
                            </p>
                        @endforeach
                        @endisset
                    </td>
                    <td>{{ $data->agent->name }}</td>
                    <td>{{ $data->total }}</td>
                    <td></td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            {{--<a href="#" class="btn btn-default"><i class="fa fa-cogs"></i></a>--}}
                            <a href="#" class="btn btn-indigo dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-caret-down"></i>
                            </a>
                        <div class="dropdown-menu dropdown-menu-end show" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 36px);" data-popper-placement="bottom-end">
<a href="javascript:;" class="dropdown-item">Action 1</a>
<a href="javascript:;" class="dropdown-item">Action 2</a>
<a href="javascript:;" class="dropdown-item">Action 3</a>
<div class="dropdown-divider"></div>
<a href="javascript:;" class="dropdown-item">Action 4</a>
</div>
                        </div>

                        {{--<a href="{{ route('apps.exhibition.hall.show', $hall) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>--}}
                        {{--<a href="{{ route('apps.exhibition.booth.edit', $booth) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>--}}
                        {{--<a href="{{ route('apps.exhibition.booth.destroy', $booth->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>--}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
