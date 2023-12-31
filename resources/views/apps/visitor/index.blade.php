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
                    <div class="stats-number">{{ number_format($visitorCount['ELF MUSIC PACK']) }}</div>
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
                    <div class="stats-number">{{ number_format($visitorCount['CHOII LIMITED EDITION PACK']) }}</div>
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
                    <div class="stats-number">{{ number_format($visitorCount['CHOII 64 LIMITED EDITION PACK']) }}</div>
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
                    <div class="stats-number">{{ number_format($visitorCount['ADULT TICKET']) }}</div>
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
                    <div class="stats-number">{{ number_format($visitorCount['KIDS TICKET']) }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
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

            <table id="dataTable" class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th width="1%">No.</th>
                    <th>Uniq</th>
                    <th>Full Name</th>
                    <th>IC / Passport</th>
                    <th>Phone Number</th>
                    <th>Tickets</th>
                    <th>Status</th>
                    <th width="1%">Redeem Status</th>
                    <th width="1%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($visitors as $key => $visitor)
                    <tr class="{{ ($visitor->redeem_status === 1) ? 'bg-success-100':'' }}">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $visitor->uniq }}</td>
                        <td>{{ substr(json_decode($visitor->visitor)->full_name, 0, 30) }}</td>
                        <td>{{ json_decode($visitor->visitor)->identification_card_number }}</td>
                        <td>{{ json_decode($visitor->visitor)->phone_number }}</td>
                        <td>
                            {{--{{ number_format($visitor->overallTotal, 2) }}--}}
                            @foreach(json_decode($visitor->cart) as $cart)
                                <strong>{{ $cart->ticketType }} x {{ $cart->ticketQuantity }} Unit</strong> @if(!$loop->last)<br> @endif
                            @endforeach
                        </td>
                        <td>
                        <span class="badge {{ $visitor->payment_status == 1 ? 'bg-primary' : 'bg-danger' }}">
                        {{ $visitor->payment_status == 1 ? 'Paid' : 'Unpaid' }}
                        </span>
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $visitor->redeem_status == 1 ? 'bg-primary' : 'bg-danger' }}">
                                {{ $visitor->redeem_status == 1 ? 'Redeemed' : 'Not Redeemed' }}
                            </span>
                            <button
                                class="btn btn-info btn-redeem btn-sm my-n1 ms-2{{ $visitor->redeem_status == 1 ? ' disabled' : '' }}"
                                data-to-redeem="{{ $visitor->id }}">
                                Redeem
                            </button>
                        </td>
                        <td nowrap="">
                            <a data-fancybox href="{{ asset('assets/upload/' . $visitor->uniq . '_' . json_decode($visitor->visitor)->identification_card_number)  . '.pdf' }}" class="btn btn-sm btn-blue my-n1">
                                <i class="fa fa-print"></i>
                            </a>
                            <a href="{{ route('apps.ticket-visitor.show', $visitor) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

@push('script')
    <script>
        function updateRedeemStatus(visitorId, redeemButton) {
            // Perform AJAX request to update redeem status
            $.ajax({
                method: 'POST',
                url: 'ticket-visitor/' + visitorId + '/update-redeem-status',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: visitorId
                },
                success: function (response) {
                    if (response.status == true) {
                        Swal.fire({
                            title: response.title,
                            text: response.msg,
                            icon: 'success',
                        })
                    }
                    redeemButton.closest('td').find('.badge').removeClass('bg-danger').addClass('bg-primary').text('Redeemed');
                    redeemButton.addClass('disabled');
                },
                error: function (error) {
                    // Handle error, e.g., show an error message
                }
            });
        }

        $('.btn-redeem').on('click', function (e) {
            e.preventDefault();
            const visitorId = $(this).data('to-redeem');
            const redeemButton = $(this);

            Swal.fire({
                title: "Are you sure?",
                text: "You are about to redeem this visitor.",
                icon: "warning",
                type: "warning",
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: 'No',
            }).then((willRedeem) => {
                if (willRedeem.isConfirmed) {
                    updateRedeemStatus(visitorId, redeemButton);
                } else if (willRedeem.isDenied) {
                    Swal.fire({
                        title: "Changes are not saved",
                        text: "Visitor has not been redeemed!",
                        icon: "info",
                        type: "info",
                    });
                }
            });
        });

        $(document).ready(function () {
            var dataTable = $('#dataTable').DataTable();

            $('#searchInput').on('keyup', function () {
                dataTable.search($(this).val()).draw();
            });
        });
    </script>
@endpush
