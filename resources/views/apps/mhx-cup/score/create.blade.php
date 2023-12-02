@extends('layouts.master')

@section('page-title', 'MHX Cup Create Races')
@section('page-header', 'MHX Cup Create Races')
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

            <form action="{{ route('apps.event-mhx-cup.races.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="racing_category" class="form-label">Racing Category</label>
                    <input type="text" class="form-control" value="{{ $category_id->category_name }}" disabled>
                    <input type="hidden" name="racing_category" value="{{ $category_id->id }}">
                </div>
                <div class="mb-3">
                    <label for="racing_track" class="form-label">Racing Track</label>
                    <input name="" type="text" class="form-control" value="{{ $track_id->track_name }}" disabled>
                    <input type="hidden" name="racing_track" value="{{ $track_id->id }}">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="line_1" class="form-label">Line 1</label>
                            <input name="" type="text" class="form-control" value="{{ $racer_id_1->racer_name }}" disabled>
                            <input type="hidden" name="line_1" value="{{ $racer_id_1->id }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="line_2" class="form-label">Line 2</label>
                            <input name="" type="text" class="form-control" value="{{ $racer_id_2->racer_name }}" disabled>
                            <input type="hidden" name="line_2" value="{{ $racer_id_2->id }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="line_3" class="form-label">Line 3</label>
                            <input name="" type="text" class="form-control" value="{{ $racer_id_3->racer_name }}" disabled>
                            <input type="hidden" name="line_3" value="{{ $racer_id_3->id }}">
                        </div>
                    </div>
                </div>
                <div class="mb-0">
                    <button type="submit" class="btn btn-success w-90px">Start</button>
                    <a href="{{ route('apps.event-mhx-cup.races.index') }}" class="btn btn-yellow w-90px">Back</a>
                </div>
            </form>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $("#racing_date").datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            });
            $("#racing_time").timepicker();

            $('#racing_category').change(function () {
                var categoryId = $(this).val();

                // Clear existing options
                $('#racing_track').empty().append('<option value="">Select Track</option>');
                $('#racer_register').empty().append('<option value="">Select Racer</option>');
                $('#line_1').empty().append('<option value="">Select Racer</option>'); // Clear Line 1 options
                $('#line_2').empty().append('<option value="">Select Racer</option>'); // Clear Line 2 options
                $('#line_3').empty().append('<option value="">Select Racer</option>'); // Clear Line 3 options

                // Populate tracks based on selected category
                $.get('{{ route('apps.event-mhx-cup.getCategoryData', ':id') }}'.replace(':id', categoryId), function (data) {
                    // Populate tracks
                    $.each(data.tracks, function (index, track) {
                        $('#racing_track').append('<option value="' + track.id + '">' + track.track_name + '</option>');
                    });

                    // Populate racer registers if needed
                    $.each(data.racerRegisters, function (index, racerRegister) {
                        $('#racer_register').append('<option value="' + racerRegister.id + '">' + racerRegister.name + '</option>');
                        $('#line_1').append('<option value="' + racerRegister.id + '">' + racerRegister.racer_name + '</option>');
                        $('#line_2').append('<option value="' + racerRegister.id + '">' + racerRegister.racer_name + '</option>');
                        $('#line_3').append('<option value="' + racerRegister.id + '">' + racerRegister.racer_name + '</option>');
                    });
                });
            });
        });
    </script>
@endpush
