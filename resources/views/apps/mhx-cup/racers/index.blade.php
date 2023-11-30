@extends('layouts.master')

@section('page-title', 'MHX Cup Racer List')
@section('page-header', 'MHX Cup Racer List')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <div class="card border-0">

        <ul class="nav nav-tabs nav-tabs-v2 px-3" id="myTab" role="tablist">
            @foreach($categories as $category)
                <li class="nav-item me-2 {{ $loop->first ? 'active' : '' }}">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ strtolower(str_replace(' ', '_', $category->category_name)) }}-tab" data-bs-toggle="tab" data-bs-target="#{{ strtolower(str_replace(' ', '_', $category->category_name)) }}" type="button" role="tab" aria-controls="{{ strtolower(str_replace(' ', '_', $category->category_name)) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->category_name }}</button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content p-3">
            @foreach($categories as $category)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ strtolower(str_replace(' ', '_', $category->category_name)) }}" role="tabpanel" aria-labelledby="{{ strtolower(str_replace(' ', '_', $category->category_name)) }}-tab">

                    {{--<div class="d-flex align-items-center mb-3">
                        <div class="me-auto">
                            <a href="#" class="btn btn-primary px-4">
                                <i class="fa fa-plus me-2 ms-n2 text-white"></i> Fetch Racer {{ $category->category_name }}
                            </a>
                        </div>
                    </div>--}}

                    <table class="table table-hover table-panel text-nowrap align-middle mb-0">
                        <thead>
                        <tr>
                            <th class="text-center" width="1%">No.</th>
                            <th width="1%">Racer Registers</th>
                            <th width="1%">Racer Name</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th width="1%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($racers->where('racing_categories_id', '=', $category->id) as $racer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $racer->mhxregistered->full_name }}</td>
                            <td>{{ $racer->racer_name }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_1 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_1 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_2 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_2 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_3 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_3 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_4 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_4 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_5 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_5 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_6 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_6 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_7 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_7 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_8 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_8 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_9 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_9 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_10 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_10 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_11 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_11 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_12 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_12 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_13 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_13 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_14 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_14 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_15 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_15 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_16 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_16 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_17 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_17 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_18 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_18 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_19 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_19 }}</td>
                            <td width="0.5%" class="text-center {{ ($racer->slot_20 == 1)? 'bg-success':'bg-danger' }}">{{ $racer->slot_20 }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>

    </div>

@endsection
@push('script')
    <script>
        /*$(document).ready(function() {
            $('#myTab button').on('click', function() {
                $('#myTab button').removeClass('active');
                $(this).addClass('active');

                var tabId = $(this).attr('data-bs-target');
                $('.tab-content .tab-pane').removeClass('show active');
                $(tabId).addClass('show active');
            });
        });*/
    </script>
@endpush
