@extends('layouts.master')

@section('page-title', 'Vendors')
@section('page-header', 'Vendors')
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
                    <a href="{{ route('apps.vendors.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Vendor
                    </a>
                </div>
            </div>

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th class="text-center" width="1%">No.</th>
                    <th width="16.33333333%">Company</th>
                    <th width="16.33333333%">Register of Company</th>
                    <th width="16.33333333%">Person in Charge</th>
                    <th width="16.33333333%">Phone Number</th>
                    <th width="16.33333333%">Social Media</th>
                    <th width="16.33333333%">Booth Register</th>
                    <th width="1%">#</th>
                    <th width="1%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendors as $vendor)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $vendor->company }}</td>
                    <td>{{ $vendor->roc_rob }}</td>
                    <td>{{ $vendor->pic_name }}</td>
                    <td>{{ $vendor->phone_num }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Social Media and Contact Details
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Email: {{ $vendor->email }}</a></li>
                                <li><a class="dropdown-item" href="#">Website: {{ $vendor->website }}</a></li>
                                @isset($vendor->social_media)
                                    @php
                                        $socialMediaData = json_decode($vendor->social_media);
                                    @endphp

                                    @foreach ($socialMediaData as $platform => $value)
                                        <li><a class="dropdown-item" href="{{ $value }}">{{ $platform }}: {{ $value }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </td>
                    <td>
                        @foreach($vendor->registerBooth as $register)
                            {{ $register->booth_number }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td nowrap="">
                        @can('vendor-show')
                        <a href="{{ route('apps.vendors.show', $vendor) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>
                        @endcan
                        @can('vendor-edit')
                        <a href="{{ route('apps.vendors.edit', $vendor) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>
                        @endcan
                        @can('vendor-delete')
                        <a href="{{ route('apps.vendors.destroy', $vendor->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>
                        @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
