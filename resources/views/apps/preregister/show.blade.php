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

            <table class="table table-bordered">
                <tbody>
                    <tr class="table-success">
                        <td colspan="2"><strong>Section A - Exhibitor Particulars</strong></td>
                    </tr>
                    @isset($registered->name_company)
                    <tr>
                        <td width="30%">Name of Company / Shop / Group / Association / Club / Society:</td>
                        <td>
                            {{ $registered->name_company }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->person_in_charge)
                    <tr>
                        <td>Name of Person in Charge:</td>
                        <td>
                            {{ $registered->person_in_charge }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->contact_no)
                    <tr>
                        <td>Contact No.: </td>
                        <td>
                            {{ $registered->contact_no }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->email)
                    <tr>
                        <td>Email:</td>
                        <td>
                            {{ $registered->email }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->selection_in)
                    <tr class="table-success">
                        <td colspan="2"><strong>Section B - Your Interest</strong></td>
                    </tr>
                    @endisset
                    @isset($registered->selection_in)
                    <tr>
                        <td>Selection:</td>
                        <td>
                            @if($registered->selection_in == 1)
                                Selling Vendor <br>
                            @elseif($registered->selection_in == 2)
                                Hobby Activity <br>
                            @elseif($registered->selection_in == 3)
                                Hobby Show-off <br>
                            @endif
                        </td>
                    </tr>
                    @endisset
                    @isset(json_decode($registered->bare_size)->length)
                    <tr>
                        <td>Bare Space Size (meter):</td>
                        <td>
                            Length: {{ json_decode($registered->bare_size)->length }} x
                            Width: {{ json_decode($registered->bare_size)->width }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->shell_scheme)
                    <tr>
                        <td> Shell Scheme (3.0m x 3.0m): </td>
                        <td>
                            {{ $registered->shell_scheme }} Lot<br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->basic_lot)
                    <tr>
                        <td>Basic Lot (2.0m x 2.5m):</td>
                        <td>
                            {{ $registered->basic_lot }} Lot<br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->item_for_sale)
                    <tr>
                        <td>Describe your item for sale:</td>
                        <td>
                            {{ $registered->item_for_sale }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->item_for_showoff)
                    <tr>
                        <td>Describe what you want to show-off in the box below:</td>
                        <td>
                            {{ $registered->item_for_showoff }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->activity)
                    <tr>
                        <td>Describe your activity, how many expected participant, etc. in the box below:</td>
                        <td>
                            {{ $registered->activity }} <br>
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->activity_pic)
                    <tr>
                        <td>Attach activities photos:</td>
                        <td>
                            @foreach(json_decode($registered->activity_pic) as $picture)
                            <a href="{{ asset('assets/upload/' . Str::slug($registered->name_company) . '/' . $picture) }}" data-fancybox="gallery">
                                <img src="{{ asset('assets/upload/' . Str::slug($registered->name_company) . '/' . $picture) }}" alt="" class="img-fluid h-200px">
                            </a>
                            @endforeach
                        </td>
                    </tr>
                    @endisset
                    @isset($registered->become_sponsors)
                    <tr class="table-success">
                        <td colspan="2"><strong>Section C - Sponsorship</strong></td>
                    </tr>
                    @endisset
                    @isset($registered->become_sponsors)
                    <tr>
                        <td>Interested to become MHX 2023 sponsors?</td>
                        <td>
                            <span class="badge border px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center {{ $registered->become_sponsors == 1 ? 'border-success text-success' : 'border-danger text-danger' }}">
                            <i class="fa fa-circle fs-9px fa-fw me-5px"></i> {{ $registered->become_sponsors == 1 ? 'Yes' : 'No' }}
                            </span>
                        </td>
                    </tr>
                    @endisset
                </tbody>
            </table>

        </div>
    </div>

@endsection

@push('script')

@endpush
