@extends('layouts.master')

@section('page-title', 'MHX Cup Races Result')
@section('page-header', 'MHX Cup Races Result')
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
                    <th width="2%">Category</th>
                    <th>Track</th>
                    <th>Line 1</th>
                    <th>Line 2</th>
                    <th>Line 3</th>
                    <th width="1%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->mhxcupracing->mhxcategory->category_name }}</td>
                    <td>{{ $result->mhxcupracing->mhxcupctrack->track_name }}</td>
                    <td class="{{ ($result->racing_racers_1_status === 1)? 'bg-success-300':'bg-danger-300' }}">
                        @isset($result->mhxraces1->racer_name)
                            <div class="row">
                                <div class="col-6">
                                    {{ $result->mhxraces1->racer_name }}
                                </div>
                                <div class="col-6 text-end">
                                    {{ $result->mhxscoreRacer_1 }}
                                    @if($result->racing_racers_1_status === 1)
                                        <button onclick="submitToScore({{ $result->mhxcupracing->mhxcategory->id }}, {{ $result->mhxcupracing->mhxcupctrack->id }}, {{ $result->racing_racers_1 }})" class="btn btn-sm btn-indigo my-n1">Submit</button>
                                    @endif
                                </div>
                            </div>
                        @endisset
                    </td>
                    <td class="{{ ($result->racing_racers_2_status === 1)? 'bg-success-300':'bg-danger-300' }}">
                        @isset($result->mhxraces2->racer_name)
                            <div class="row">
                                <div class="col-6">
                                    {{ $result->mhxraces2->racer_name }}
                                </div>
                                <div class="col-6 text-end">
                                    @if($result->racing_racers_2_status === 1)
                                        <button onclick="submitToScore({{ $result->mhxcupracing->mhxcategory->id }}, {{ $result->mhxcupracing->mhxcupctrack->id }}, {{ $result->racing_racers_2 }})" class="btn btn-sm btn-indigo my-n1">Submit</button>
                                    @endif
                                </div>
                            </div>
                        @endisset
                    </td>
                    <td class="{{ ($result->racing_racers_3_status === 1)? 'bg-success-300':'bg-danger-300' }}">
                        @isset($result->mhxraces3->racer_name)
                            <div class="row">
                                <div class="col-6">
                                    {{ $result->mhxraces3->racer_name }}
                                </div>
                                <div class="col-6 text-end">
                                    @if($result->racing_racers_3_status === 1)
                                        <button onclick="submitToScore({{ $result->mhxcupracing->mhxcategory->id }}, {{ $result->mhxcupracing->mhxcupctrack->id }}, {{ $result->racing_racers_3 }})" class="btn btn-sm btn-indigo my-n1">Submit</button>
                                    @endif
                                </div>
                            </div>
                        @endisset
                    </td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {

        });
        function submitToScore(category, track, racer) {
            $.ajax({
                type: 'POST',
                url: '{{ route('apps.event-mhx-cup.board.index') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: category,
                    track_id: track,
                    racer_id: racer,
                },
                success: function (response) {
                    if (response.status === true) {
                        Swal.fire({
                            title: "Record submitted",
                            text: "Race submitted completed!",
                            icon: "success",
                        });
                    } else if (response.status === false)
                    {
                        Swal.fire({
                            title: "Changes are not saved",
                            text: "Race has not been completed!",
                            icon: "info",
                        });
                    }
                }
            });
        }
    </script>
@endpush
