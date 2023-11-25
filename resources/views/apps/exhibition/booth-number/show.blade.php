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
            <h4 class="panel-title">@yield('page-title')</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="30%">Booth Numbers :</td>
                        <td>
                            @isset($booth->booth_number)
                                <label for="tab-check-{{ $booth->id }}" class="form-check-label">{{ $booth->booth_number }}</label>
                            @endisset
                        </td>
                    </tr>
                    <tr>
                        <td>Zone :</td>
                        <td>
                            @isset($booth->sections)
                                {{ $booth->sections->name }}
                            @endisset
                        </td>
                    </tr>
                    <tr>
                        <td></td>
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
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <span class="badge {{ $booth->status == 1 ? 'bg-primary' : 'bg-danger' }}">
                                {{ $booth->status == 1 ? 'Booked' : 'Available' }}
                            </span>
                        </td>
                    </tr>
                    
                </tbody>
            </table>

            <a href="{{ url('exhibition/booth-number') }}" class="btn btn-indigo btn-lg w-150px">Back</a>

        </div>
    </div>

@endsection

@push('script')

@endpush
