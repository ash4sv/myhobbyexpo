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

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th class="text-center" width="1%">No.</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th width="1%">#</th>
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
                    <td>{{ $vendor->email }}</td>
                    <td>
                        @isset($vendor->social_media)
                            @php
                                $socialMediaData = json_decode($vendor->social_media);
                            @endphp

                            @foreach ($socialMediaData as $platform => $value)
                                {{ $platform }}: <a href="{{ $value }}">{{ $value }}</a> <br>
                            @endforeach
                        @endisset
                    </td>
                    <td>{{ $vendor->website }}</td>
                    <td>
                        {{--<a href="{{ route('apps.exhibition.hall.show', $hall) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>--}}
                        <a href="{{ route('apps.sales-agents.edit', $vendor) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('apps.sales-agents.destroy', $vendor->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
