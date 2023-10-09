@extends('layouts.master')

@section('page-title', 'Exhibition Booth Number')
@section('page-header', 'Exhibition Booth Number')
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
                    <a href="{{ route('apps.exhibition.booth-number.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Booth Number
                    </a>
                    <a href="#" class="btn btn-primary px-4" onclick="event.preventDefault(); $('#batch-update').submit()">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Mass Edit Booth Number
                    </a>
                </div>
            </div>

            <form id="batch-update" action="{{ route('apps.exhibition.massbooth') }}" method="GET">
                <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="1%">
                            <div class="form-check">
                                <input type="checkbox" value="" id="check-all" class="form-check-input">
                                <label for="" class="form-check-label">&nbsp;</label>
                            </div>
                        </th>
                        <th width="20%">Booth Numbers</th>
                        <th width="20%">Zone</th>
                        <th></th>
                        <th width="1%">Status</th>
                        <th width="1%">#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($booths as $booth)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" value="" id="tab-check-{{ $booth->id }}" name="id[{{ $booth->id }}]" class="form-check-input">
                                </div>
                            </td>
                            <td>
                                @isset($booth->booth_number)
                                    <label for="tab-check-{{ $booth->id }}" class="form-check-label">{{ $booth->booth_number }}</label>
                                @endisset
                            </td>
                            <td>
                                @isset($booth->sections)
                                    {{ $booth->sections->name }}
                                @endisset
                            </td>
                            <td>
                                @isset($booth->vendor->company)
                                    {{ $booth->vendor->company }} |
                                @endisset
                                @isset($booth->vendor->roc_rob)
                                    {{ $booth->vendor->roc_rob }} |
                                @endisset
                                @isset($booth->vendor->pic_name)
                                    {{ $booth->vendor->pic_name }} |
                                @endisset
                                @isset($booth->vendor->phone_num)
                                    <a href="tel:{{ $booth->vendor->phone_num }}">{{ $booth->vendor->phone_num }}</a> |
                                @endisset
                                @isset($booth->vendor->email)
                                    <a href="mailto:{{ $booth->vendor->email }}">{{ $booth->vendor->email }}</a>
                                @endisset
                            </td>
                            <td>
                        <span class="badge {{ $booth->status == 1 ? 'bg-primary' : 'bg-danger' }}">
                            {{ $booth->status == 1 ? 'Booked' : 'Available' }}
                        </span>
                            </td>
                            <td>
                                {{--<a href="{{ route('apps.exhibition.hall.show', $hall) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>--}}
                                <a href="{{ route('apps.exhibition.booth-number.edit', $booth) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('apps.exhibition.booth-number.destroy', $booth->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>

        </div>
    </div>

@endsection
