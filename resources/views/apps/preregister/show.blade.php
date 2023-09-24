@extends('layouts.master')

@section('page-title', 'Pre-Register - ' . $registered->name_company)
@section('page-header', 'Pre-Register - ' . $registered->name_company)
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

            @isset($registered->name_company)
                {{ $registered->name_company }} <br>
            @endisset
            @isset($registered->person_in_charge)
                {{ $registered->person_in_charge }} <br>
            @endisset
            @isset($registered->contact_no)
                {{ $registered->contact_no }} <br>
            @endisset
            @isset($registered->email)
                {{ $registered->email }} <br>
            @endisset
            @isset($registered->selection_in)
                @if($registered->selection_in == 1)
                    Selling Vendor
                @elseif($registered->selection_in == 2)
                    Hobby Activity
                @elseif($registered->selection_in == 3)
                    Hobby Show-off
                @endif
            @endisset
            @isset(json_decode($registered->bare_size)->length)
                Length: {{ json_decode($registered->bare_size)->length }} x
                Width: {{ json_decode($registered->bare_size)->width }} <br>
            @endisset
            @isset($registered->shell_scheme)
                Shell Scheme: {{ $registered->shell_scheme }} Lot<br>
            @endisset
            @isset($registered->basic_lot)
                Basic Lot: {{ $registered->basic_lot }} Lot<br>
            @endisset
            @isset($registered->item_for_sale)
                {{ $registered->item_for_sale }} <br>
            @endisset
            @isset($registered->item_for_showoff)
                {{ $registered->item_for_showoff }} <br>
            @endisset
            @isset($registered->activity)
                {{ $registered->activity }} <br>
            @endisset

            @isset($registered->become_sponsors)
                Become Sponsors
                <span class="badge border px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center {{ $registered->become_sponsors == 1 ? 'border-success text-success' : 'border-danger text-danger' }}">
                <i class="fa fa-circle fs-9px fa-fw me-5px"></i> {{ $registered->become_sponsors == 1 ? 'Yes' : 'No' }}
                </span>
            @endisset

            @isset($registered->activity_pic)
                @foreach(json_decode($registered->activity_pic) as $picture)
                    <img src="{{ asset('assets/upload/' . Str::slug($registered->name_company) . '/' . $picture) }}" alt=""> <br>
                @endforeach
            @endisset

        </div>
    </div>

@endsection
