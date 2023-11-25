@extends('layouts.master')

@section('page-title', 'Booth Booked - ' . $vendor->company )
@section('page-header', 'Booth Booked - ' . $vendor->company )
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
                        <td width="30%">Company :</td>
                        <td>
                            {{ $vendor->company }}
                        </td>
                    </tr>
                    <tr>
                        <td>Register Of Company :</td>
                        <td>
                            {{ $vendor->roc_rob }}
                        </td>
                    </tr>
                    <tr>
                        <td>Person In Charge : </td>
                        <td>
                            {{ $vendor->pic_name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number :</td>
                        <td>
                            {{ $vendor->phone_num }}
                        </td>
                    </tr>
                    <tr>
                        <td>Social Media :</td>
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
                    </tr>
                    <tr>
                        <td> Booth Register : </td>
                        <td>
                            @foreach($vendor->registerBooth as $register)
                                {{ $register->booth_number }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ url('vendors') }}" class="btn btn-indigo btn-lg w-150px">Back</a>

        </div>
    </div>

@endsection

@push('script')

@endpush
