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

    <div class="row">
        <div class="col-md-2">
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Total Tickets</div>
                    <div class="stats-number">{{ number_format((count($visitors) - count($visitors->where('status', 1)))) }}</div>
                    <div class="stats-progress progress">
                        @php
                            $totalVisitors = count($visitors);
                            $redeemedVisitors = count($visitors->where('status', 1));
                            $percentageRedeemed = $redeemedVisitors / $totalVisitors * 100;
                            $formattedPercentageRedeemed = number_format($percentageRedeemed, 2) . '%';
                        @endphp
                        <div class="progress-bar" style="width:{{ $formattedPercentageRedeemed }};"></div>
                    </div>
                    <div class="stats-desc">Total Redeem Shopee Ticket ({{ $formattedPercentageRedeemed }})</div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="widget widget-stats bg-teal mb-10px">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">Total Tickets</div>
                    <div class="stats-number">{{ number_format($redeemedVisitors) }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 0%;"></div>
                    </div>
                    <div class="stats-desc">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link py-3 px-5 {{ (request()->segment(1) == 'ticket-visitor') ? 'active' : '' }}" href="{{ route('apps.ticket-visitor.index') }}">In House Visitor Tickets</a>
        </li>
        <li class="nav-item">
            <a class="nav-link py-3 px-5 {{ (request()->segment(1) == 'shopee-visitor') ? 'active' : '' }}" href="{{ route('apps.shopee-visitor.index') }}">Shopee Visitor Ticket</a>
        </li>
    </ul>

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

            <div class="input-group mb-4">
                <div class="flex-fill position-relative">
                    <div class="input-group">
                        <div class="input-group-text position-absolute top-0 bottom-0 bg-none border-0 start-0" style="z-index: 1;">
                            <i class="fa fa-search opacity-5"></i>
                        </div>
                        <input type="text" class="form-control px-35px bg-light" placeholder="Search tickets..." id="searchInput" />
                    </div>
                </div>
            </div>

            <table id="dataTable" class="data-table table table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th width="2%">No.</th>
                    <th width="1%">Uniq</th>
                    <th width="48%">Code</th>
                    <th width="48%">Ticket Type</th>
                    <th width="1%">Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy();
            }

            var dataTable = new DataTable('#dataTable', {
                ajax: {
                    url: '{{ route('apps.shopeeData') }}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'id', defaultContent: '' },
                    { data: 'uniq', defaultContent: '' },
                    { data: 'code', defaultContent: '' },
                    { data: 'ticketType', defaultContent: '' },
                    {
                        data: null,
                        defaultContent: '',
                        render: function (data, type, row) {
                            // Add a button in the "Action" column
                            return '<button ' + (data.status === 1 ? 'disabled' : '') + ' onclick="confirmRedeem(' + data.id + ')" class="btn btn-sm btn-primary my-n1 px-4">Redeem</button>';
                        }
                    },
                ],
                processing: true,
                responsive: true,
                colReorder: true,
                keys: true,
                rowReorder: true,
                select: true,
                pageLength: 50,
                rowCallback: function(row, data) {
                    // Add the class 'bg-success' to rows where data.status is 1
                    if (data.status === 1) {
                        $(row).addClass('bg-success-100');
                    }
                }
            });

            $('#searchInput').on('keyup', function () {
                dataTable.search($(this).val()).draw();
            });
        });

        function confirmRedeem(ticketID) {
            Swal.fire({
                title: "Are you sure?",
                text: "You are about to redeem this visitor.",
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((willRedeem) => {
                if (willRedeem.isConfirmed) {
                    updateRedeemStatus(ticketID);
                } else if (willRedeem.isDenied) {
                    Swal.fire({
                        title: "Changes are not saved",
                        text: "Visitor has not been redeemed!",
                        icon: "info",
                    });
                }
            });
        }

        function updateRedeemStatus(ticketID) {
            $.ajax({
                type: 'POST',
                url: '{{ route('apps.shopeeRedeem') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ticketID
                },
                success: function(response) {
                    if (response.status === true) {
                        $('#dataTable').DataTable().ajax.reload(null, false);
                        $('#searchInput').val('');
                        Swal.fire({
                            title: "Redeemed!",
                            text: "Visitor has been successfully redeemed.",
                            icon: "success",
                        });
                    }
                },
                error: function(error) {
                    // Handle error
                }
            });
        }
    </script>
@endpush
