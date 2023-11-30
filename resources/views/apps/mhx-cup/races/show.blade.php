@extends('layouts.master')

@section('page-title', 'MHX Cup Races')
@section('page-header', 'MHX Cup Races')
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

            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center font-weight-700 mb-4">{{ $race->mhxcategory->category_name }}</h1>
                    <h2 class="text-center font-weight-700 mb-4">{{ $race->mhxcupctrack->track_name }}</h2>
                    {{--<h3 class="font-weight-700">{{ $race->mhxcupctrack->track_layouts }}</h3>--}}
                </div>
                <div id="data-races" class="col-md-10 mx-auto">

                    <div class="card-group">
                        @isset($race->mhxracer1)
                        <div class="card {{ ($result_racer_1_result === 1) ? 'bg-lime-200':'bg-red-100' }} {{ $result_racer_1 }}">
                            {{--<img src="..." class="card-img-top" alt="">--}}
                            <div class="card-body text-center">
                                <h1 class="card-title font-weight-400 mb-3">Line 1</h1>
                                <div class="square-box d-flex justify-content-center align-items-center mb-3 bg-blue">
                                    <div class="text-white">
                                        <h1 class="font-weight-700">@isset($race->mhxracer1) {{ $race->mhxracer1->racer_name }} @endisset</h1>
                                        {{ $result_racer_1 }}
                                    </div>
                                </div>
                                <div class="btn-group btn-group-lg" role="group" aria-label="Basic outlined example">
                                    <button {{ ($result_racer_1 === 'disabled')? 'disabled':'' }} id="btn-success_{{ $race->id }}_{{ $race->mhxracer1->id }}" onclick="updateResult('racing_racers_1', {{ $race->id }} ,{{ $race->mhxracer1->id }}, 1)" type="button" class="btn btn-success w-100px">Win</button>
                                    <button {{ ($result_racer_1 === 'disabled')? 'disabled':'' }} id="btn-success_{{ $race->id }}_{{ $race->mhxracer1->id }}" onclick="updateResult('racing_racers_1', {{ $race->id }} ,{{ $race->mhxracer1->id }}, 0)" type="button" class="btn btn-danger w-100px">Lose</button>
                                </div>
                            </div>
                        </div>
                        @endisset
                        @isset($race->mhxracer2)
                        <div class="card {{ ($result_racer_2_result === 1) ? 'bg-lime-200':'bg-red-100' }} {{ $result_racer_2 }}">
                            {{--<img src="..." class="card-img-top" alt="">--}}
                            <div class="card-body text-center">
                                <h1 class="card-title font-weight-400 mb-3">Line 2</h1>
                                <div class="square-box d-flex justify-content-center align-items-center mb-3 bg-red">
                                    <div class="text-white">
                                        <h1 class="font-weight-700">@isset($race->mhxracer2) {{ $race->mhxracer2->racer_name }} @endisset</h1>
                                        {{ $result_racer_2 }}
                                    </div>
                                </div>
                                <div class="btn-group btn-group-lg" role="group" aria-label="Basic outlined example">
                                    <button {{ ($result_racer_2 === 'disabled')? 'disabled':'' }} id="btn-success_{{ $race->id }}_{{ $race->mhxracer2->id }}" onclick="updateResult('racing_racers_2', {{ $race->id }}, {{ $race->mhxracer2->id }}, 1)" type="button" class="btn btn-success w-100px">Win</button>
                                    <button {{ ($result_racer_2 === 'disabled')? 'disabled':'' }} id="btn-success_{{ $race->id }}_{{ $race->mhxracer2->id }}" onclick="updateResult('racing_racers_2', {{ $race->id }}, {{ $race->mhxracer2->id }}, 0)" type="button" class="btn btn-danger w-100px">Lose</button>
                                </div>
                            </div>
                        </div>
                        @endisset
                        @isset($race->mhxracer3)
                        <div class="card {{ ($result_racer_3_result === 1) ? 'bg-lime-200':'bg-red-100' }} {{ $result_racer_3 }}">
                            {{--<img src="..." class="card-img-top" alt="">--}}
                            <div class="card-body text-center">
                                <h1 class="card-title font-weight-400 mb-3">Line 3</h1>
                                <div class="square-box d-flex justify-content-center align-items-center mb-3 bg-yellow">
                                    <div class="text-white">
                                        <h1 class="font-weight-700">@isset($race->mhxracer3) {{ $race->mhxracer3->racer_name }} @endisset</h1>
                                        {{ $result_racer_3 }}
                                    </div>
                                </div>
                                <div class="btn-group btn-group-lg" role="group" aria-label="Basic outlined example">
                                    <button {{ ($result_racer_3 === 'disabled')? 'disabled':'' }} id="btn-success_{{ $race->id }}_{{ $race->mhxracer3->id }}" onclick="updateResult('racing_racers_3', {{ $race->id }}, {{ $race->mhxracer3->id }}, 1)" type="button" class="btn btn-success w-100px">Win</button>
                                    <button {{ ($result_racer_3 === 'disabled')? 'disabled':'' }} id="btn-success_{{ $race->id }}_{{ $race->mhxracer3->id }}" onclick="updateResult('racing_racers_3', {{ $race->id }}, {{ $race->mhxracer3->id }}, 0)" type="button" class="btn btn-danger w-100px">Lose</button>
                                </div>
                            </div>
                        </div>
                        @endisset
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center my-30px">
                    <button {{ ($race->status === 1)? 'disabled':'' }} onclick="submitCompleteRace({{ $race->id }})" type="button" class="btn btn-lg btn-success px-5">Race Complete</button>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        function adjustSquareBox() {
            var width = $('.square-box').width();
            $('.square-box').css('height', width + 'px');
        }

        adjustSquareBox();
        $(window).resize(adjustSquareBox);

        function updateResult(line, races, racer, status) {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to update the result.",
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((willUpdate) => {
                if (willUpdate.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('apps.event-mhx-cup.result') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            racing_category: {{ $race->mhxcategory->id }},
                            racing_track: {{ $race->mhxcupctrack->id }},
                            racing_racers: line,
                            races: races,
                            racer: racer,
                            status: status,
                        },
                        success: function(response) {
                            if (response.status === true) {
                                $('#data-races').load(window.location.href + ' #data-races .card-group', function() {
                                    adjustSquareBox();
                                });
                            } else if (response.status === false) {
                                buttonGroup.find('.btn').prop('disabled', false);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            buttonGroup.find('.btn').prop('disabled', false);
                        }
                    });
                } else if (willUpdate.isDenied) {
                    Swal.fire({
                        title: "Changes are not saved",
                        text: "Result has not been updated!",
                        icon: "info",
                    });
                }
            });
        }

        function submitCompleteRace(raceID) {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to complete the race.",
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((willComplete) => {
                if (willComplete.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('apps.event-mhx-cup.completeRace') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: raceID
                        },
                        success: function(response) {
                            if (response.status === true) {
                                window.location.href = response.redirect;
                            } else if (response.status === false)
                            {
                                Swal.fire({
                                    title: "Changes are not saved",
                                    text: "Race has not been completed!",
                                    icon: "info",
                                });
                            }
                        },
                        error: function(error) {

                        }
                    });
                } else if (willComplete.isDenied) {
                    Swal.fire({
                        title: "Changes are not saved",
                        text: "Race has not been completed!",
                        icon: "info",
                    });
                }
            });
        }

    </script>
@endpush
