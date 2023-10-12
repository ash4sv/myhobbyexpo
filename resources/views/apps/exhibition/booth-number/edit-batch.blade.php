@extends('layouts.master')

@section('page-title', 'Batch Edit Booth Numbers')
@section('page-header', 'Batch Edit Booth Numbers')
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

            <form action="{{ route('apps.exhibition.batchboothupdate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-striped table-striped-columns align-middle">
                    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th class="text-center" width="33.33333333%">Zone</th>
                        <th class="text-center" width="33.33333333%">Booth Number</th>
                        <th class="text-center" width="33.33333333%">Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($booths as $booth)
                    <tr>
                        <td class="text-center">
                            {{ $loop->iteration }}
                            <input type="hidden" name="id[]" value="{{ $booth->id }}">
                        </td>
                        <td>
                            <select class="form-control hobby-select" name="zone[]" id="">
                                <option value="">Select Zone</option>
                                @foreach($zones as $key => $zone)
                                <option value="{{ $key }}" {{ ($key === $booth->section_id) ? 'selected':'' }}>{{ $zone }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" class="form-control my-n1" placeholder="Booth Number" name="booth_numbers[]" id="booth_{{ $booth->id }}" value="{{ $booth->booth_number }}"></td>
                        <td><input type="text" class="form-control my-n1" placeholder="Description" name="description[]" value="{{ $booth->description }}"></td>
                        <td>
                            <div><input type="checkbox" name="status" id="switchery-default" @if(old('status', $booth->status)) checked @endif/></div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mb-0">
                    <button type="submit" class="btn btn-success w-90px">Save</button>
                    <button type="reset" class="btn btn-lime w-90px">Reset</button>
                    <a href="{{ route('apps.exhibition.booth-number.index') }}" class="btn btn-yellow w-90px">Back</a>
                </div>
            </form>

        </div>
    </div>

@endsection
