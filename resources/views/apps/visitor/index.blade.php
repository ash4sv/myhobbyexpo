@extends('layouts.master')

@section('page-title', 'Visitor')
@section('page-header', 'Visitor')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <div class="row">
        <div class="col-md-2">
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">ELF MUSIC PACK</div>
                    <div class="stats-number">{{ $visitorCount['ELF MUSIC PACK'] }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">CHOII LIMITED EDITION PACK</div>
                    <div class="stats-number">{{ $visitorCount['CHOII LIMITED EDITION PACK'] }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">CHOII 64 LIMITED EDITION PACK</div>
                    <div class="stats-number">{{ $visitorCount['CHOII 64 LIMITED EDITION PACK'] }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">ADULT TICKET</div>
                    <div class="stats-number">{{ $visitorCount['ADULT TICKET'] }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">KIDS TICKET</div>
                    <div class="stats-number">{{ $visitorCount['KIDS TICKET'] }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </div>
    </div>

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
                    <th width="1%">No.</th>
                    <th>Uniq</th>
                    <th>Full Name</th>
                    <th>IC / Passport</th>
                    <th>Phone Number</th>
                    <th>Total Purchase (RM)</th>
                    <th>Status</th>
                    <th>Redeem Status</th>
                    <th>Action</th>
                    <th>#</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                @foreach($visitors as $key => $visitor)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $visitor->uniq }}</td>
                    <td>{{ json_decode($visitor->visitor)->full_name }}</td>
                    <td>{{ json_decode($visitor->visitor)->identification_card_number }}</td>
                    <td>{{ json_decode($visitor->visitor)->phone_number }}</td>
                    <td>{{ number_format($visitor->overallTotal, 2) }}</td>
                    <td>
                        <span class="badge {{ $visitor->payment_status == 1 ? 'bg-primary' : 'bg-danger' }}">
                        {{ $visitor->payment_status == 1 ? 'Paid' : 'Unpaid' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ $visitor->redeem_status == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $visitor->redeem_status == 1 ? 'Redeemed' : 'Not Redeemed' }}
                        </span>
                    </td>
                    <td>
                        <a data-fancybox href="{{ asset('assets/upload/' . $visitor->uniq . '_' . json_decode($visitor->visitor)->identification_card_number)  . '.pdf' }}" class="btn btn-sm btn-blue my-n1">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>
                    <td nowrap="">
                        <a href="{{ route('apps.ticket-visitor.show', $visitor) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('apps.ticket-visitor.edit', $visitor) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
