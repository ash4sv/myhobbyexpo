@extends('layouts.master')

@section('page-title', 'MHX Cup Score')
@section('page-header', 'MHX Cup Score')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <h1>RACE TRACK A</h1>
    <table class="table table-bordered table-bordered align-middle text-nowrap mb-4 bg-white">
        <thead>
        <tr>
            <th class="text-center" width="1%">No.</th>
            <th width="24.5%">Line 1</th>
            <th width="24.5%">Line 2</th>
            <th width="24.5%">Line 3</th>
            <th width="1%">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bMaxClassBScores->where('racing_tracks_id', 1) as $key => $score)
            <tr data-track-id="1" data-category-id="2">
                <td>{{ $loop->iteration }}</td>
                <td data-line1-races="{{ $score->line_1 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_1) {{ $score->mhxscoreRacer_1->racer_name }} @endisset</td>
                <td data-line2-races="{{ $score->line_2 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_2) {{ $score->mhxscoreRacer_2->racer_name }} @endisset</td>
                <td data-line3-races="{{ $score->line_3 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_3) {{ $score->mhxscoreRacer_3->racer_name }} @endisset</td>
                <td>
                    <a href="" class="btn btn-red btn-start-roundrace">Start Races</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h1>RACE TRACK B</h1>
    <table class="table table-bordered table-bordered align-middle text-nowrap mb-4 bg-white">
        <thead>
        <tr>
            <th class="text-center" width="1%">No.</th>
            <th width="24.5%">Line 1</th>
            <th width="24.5%">Line 2</th>
            <th width="24.5%">Line 3</th>
            <th width="1%">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bMaxClassBScores->where('racing_tracks_id', 2) as $key => $score)
            <tr data-track-id="2" data-category-id="2">
                <td>{{ $loop->iteration }}</td>
                <td data-line1-races="{{ $score->line_1 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_1) {{ $score->mhxscoreRacer_1->racer_name }} @endisset</td>
                <td data-line2-races="{{ $score->line_2 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_2) {{ $score->mhxscoreRacer_2->racer_name }} @endisset</td>
                <td data-line3-races="{{ $score->line_3 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_3) {{ $score->mhxscoreRacer_3->racer_name }} @endisset</td>
                <td>
                    <a href="" class="btn btn-red btn-start-roundrace">Start Races</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h1>RACE TRACK C</h1>
    <table class="table table-bordered table-bordered align-middle text-nowrap mb-4 bg-white">
        <thead>
        <tr>
            <th class="text-center" width="1%">No.</th>
            <th width="24.5%">Line 1</th>
            <th width="24.5%">Line 2</th>
            <th width="24.5%">Line 3</th>
            <th width="1%">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bMaxClassBScores->where('racing_tracks_id', 3) as $key => $score)
            <tr data-track-id="3" data-category-id="2">
                <td>{{ $loop->iteration }}</td>
                <td data-line1-races="{{ $score->line_1 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_1) {{ $score->mhxscoreRacer_1->racer_name }} @endisset</td>
                <td data-line2-races="{{ $score->line_2 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_2) {{ $score->mhxscoreRacer_2->racer_name }} @endisset</td>
                <td data-line3-races="{{ $score->line_3 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_3) {{ $score->mhxscoreRacer_3->racer_name }} @endisset</td>
                <td>
                    <a href="" class="btn btn-red btn-start-roundrace">Start Races</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h1>RACE TRACK D</h1>
    <table class="table table-bordered table-bordered align-middle text-nowrap mb-4 bg-white">
        <thead>
        <tr>
            <th class="text-center" width="1%">No.</th>
            <th width="24.5%">Line 1</th>
            <th width="24.5%">Line 2</th>
            <th width="24.5%">Line 3</th>
            <th width="1%">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bMaxClassBScores->where('racing_tracks_id', 4) as $key => $score)
            <tr data-track-id="4" data-category-id="2">
                <td>{{ $loop->iteration }}</td>
                <td data-line1-races="{{ $score->line_1 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_1) {{ $score->mhxscoreRacer_1->racer_name }} @endisset</td>
                <td data-line2-races="{{ $score->line_2 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_2) {{ $score->mhxscoreRacer_2->racer_name }} @endisset</td>
                <td data-line3-races="{{ $score->line_3 }}" class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_3) {{ $score->mhxscoreRacer_3->racer_name }} @endisset</td>
                <td>
                    <a href="" class="btn btn-red btn-start-roundrace">Start Races</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--<div class="row mb-4">
        <div class="col-md-12 bg-light p-3">
            <h1 class="mb-3 text-center">{{ $semiTechClassA->category_name }}</h1>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($trackssemiTechClassA as $track)
                        <button class="nav-link {{ ($track->id == 1)? 'active':'' }}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" type="button" role="tab" aria-controls="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" aria-selected="true">{{ $track->track_name }}</button>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content bg-white p-3" id="nav-tabContent">
                @foreach($trackssemiTechClassA as $track)
                    <div class="tab-pane fade {{ ($track->id == 1)? 'active show':'' }}" id="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" role="tabpanel" aria-labelledby="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}">
                        <table class="table table-bordered align-middle text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="text-center" width="1%">No.</th>
                                <th width="24.5%">Line 1</th>
                                <th width="24.5%">Line 2</th>
                                <th width="24.5%">Line 3</th>
                                <th width="1%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($semiTechClassAScores->where('racing_tracks_id', $track->id) as $score)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_1) {{ $score->mhxscoreRacer_1->racer_name }} @endisset</td>
                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_2) {{ $score->mhxscoreRacer_2->racer_name }} @endisset</td>
                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_3) {{ $score->mhxscoreRacer_3->racer_name }} @endisset</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>

        </div>
    </div>--}}

{{--    <div class="row mb-4">--}}
{{--        <div class="col-md-12 bg-light p-3">--}}
{{--            <h1 class="mb-3 text-center">{{ $bMaxClassB->category_name }}</h1>--}}

{{--            <nav>--}}
{{--                <div class="nav nav-tabs" id="nav-tab" role="tablist">--}}
{{--                    @foreach($tracksbMaxClassB as $track)--}}
{{--                        <button class="nav-link {{ ($track->id == 5)? 'active':'' }}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" type="button" role="tab" aria-controls="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" aria-selected="true">{{ $track->track_name }}</button>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--            <div class="tab-content bg-white p-3" id="nav-tabContent">--}}
{{--                @foreach($tracksbMaxClassB as $track)--}}
{{--                    <div class="tab-pane fade {{ ($track->id == 5)? 'active show':'' }}" id="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" role="tabpanel" aria-labelledby="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}">--}}

{{--                        <table class="table table-bordered align-middle text-nowrap mb-0">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th class="text-center" width="1%">No.</th>--}}
{{--                                <th width="24.5%">Line 1</th>--}}
{{--                                <th width="24.5%">Line 2</th>--}}
{{--                                <th width="24.5%">Line 3</th>--}}
{{--                                <th width="1%">Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($semiTechClassAScores->where('racing_tracks_id', $track->id) as $key => $score)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $loop->iteration }}</td>--}}
{{--                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_1) {{ $score->mhxscoreRacer_1->racer_name }} @endisset</td>--}}
{{--                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_2) {{ $score->mhxscoreRacer_2->racer_name }} @endisset</td>--}}
{{--                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_3) {{ $score->mhxscoreRacer_3->racer_name }} @endisset</td>--}}
{{--                                    <td></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}

{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-4">
        <div class="col-md-12 bg-light p-3">
            <h1 class="mb-3 text-center">{{ $stockCarClassC->category_name }}</h1>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($tracksstockCarClassC as $track)
                        <button class="nav-link {{ ($track->id == 9)? 'active':'' }}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" type="button" role="tab" aria-controls="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" aria-selected="true">{{ $track->track_name }}</button>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content bg-white p-3" id="nav-tabContent">
                @foreach($tracksstockCarClassC as $track)
                    <div class="tab-pane fade {{ ($track->id == 9)? 'active show':'' }}" id="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}" role="tabpanel" aria-labelledby="nav-{{ str_replace(' ', '', $track->track_name) }}_{{ $track->id }}">

                        <table class="table table-bordered align-middle text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="text-center" width="1%">No.</th>
                                <th width="24.5%">Line 1</th>
                                <th width="24.5%">Line 2</th>
                                <th width="24.5%">Line 3</th>
                                <th width="1%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($semiTechClassAScores->where('racing_tracks_id', $track->id) as $key => $score)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_1) {{ $score->mhxscoreRacer_1->racer_name }} @endisset</td>
                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_2) {{ $score->mhxscoreRacer_2->racer_name }} @endisset</td>
                                    <td class="{{ ($score->mhxscoreRacer_1 != null)? 'bg-blue-200':'bg-danger-100' }} ">@isset($score->mhxscoreRacer_3) {{ $score->mhxscoreRacer_3->racer_name }} @endisset</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                @endforeach
            </div>
        </div>
    </div>--}}

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            // Attach click event to the "Start Races" button
            $('.btn-start-roundrace').on('click', function (e) {
                e.preventDefault();

                // Get all three racer IDs from the data attributes of the clicked button's parent row
                var categoryId = $(this).closest('tr').data('category-id');
                var trackId    = $(this).closest('tr').data('track-id');
                var racerId1   = $(this).closest('tr').find('td[data-line1-races]').data('line1-races');
                var racerId2   = $(this).closest('tr').find('td[data-line2-races]').data('line2-races');
                var racerId3   = $(this).closest('tr').find('td[data-line3-races]').data('line3-races');

                // Perform AJAX request to submit the form with all three racer IDs
                $.ajax({
                    url: '{{ route('apps.event-mhx-cup.startRoundeRace') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        category_id: categoryId,
                        track_id   : trackId,
                        racer_id_1 : racerId1,
                        racer_id_2 : racerId2,
                        racer_id_3 : racerId3,
                    },
                    success: function (response) {
                        if (response.status === true) {
                            window.location.href = response.redirect;
                        } else {
                            console.error('Unexpected response status:', response.status);
                        }
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
