@extends('layouts.master')

@section('page-title', 'Register')
@section('page-header', 'Register')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

{{--    <div class="d-flex align-items-center mb-3">--}}
{{--        <div class="me-auto">--}}
{{--            <a href="{{ route('apps.mhx-cup.register.create') }}" class="btn btn-primary px-4">--}}
{{--                <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Racer--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="" data-category-load="semi-tech class a" data-bs-toggle="tab" class="nav-link px-sm-5 active">Semi-Tech Class A</a>
        </li>
        <li class="nav-item">
            <a href="" data-category-load="b-max class b" data-bs-toggle="tab" class="nav-link px-sm-5">B-Max Class B</a>
        </li>
        <li class="nav-item">
            <a href="" data-category-load="stock-car class c" data-bs-toggle="tab" class="nav-link px-sm-5">Stock-Car Class C</a>
        </li>
    </ul>
    <div class="tab-content panel p-3 rounded-0 rounded-bottom">
        <div class="tab-pane fade active show" id="default-tab-1">

            <div class="table-responsive">
                <table class="mhx-table table table-striped table-bordered align-middle text-nowrap mb-0">
                    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th>Ref</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Race ID</th>
                        <th>Team Group</th>
                        <th>Registration</th>
                        <th>Total Cost (RM)</th>
                        <th width="2%">Payment</th>
                        <th>Invoices</th>
                        <th width="2%">Receipt</th>
                        <th width="1%">Approval</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            function loadData(categoryLoad) {
                $.get('{{ route('apps.mhx-cup.categoryMhxCup') }}', { category: categoryLoad }, function(data) {
                    var targetTable = $('table.mhx-table tbody');
                    var urlvar = window.location.href + '/';
                    var rootUrl = '{{ url('/') }}/';

                    targetTable.empty();

                    $.each(data, function(index, item) {
                        var tr = $('<tr>');
                        tr.append('<td>' + (index + 1) + '</td>');
                        tr.append('<td>' + item.uniq + '</td>');
                        tr.append('<td class="text-uppercase">' + item.full_name + '</td>');
                        tr.append('<td>' + item.email + '</td>');

                        var raceID = '';
                        $.each(item.number_register, function(key, number) {
                            // console.log(item.number_register);
                            raceID += item.nickname + number.register.toString().padStart(3, '0');
                            if (key !== item.number_register.length - 1 && key % 4 !== 3) {
                                raceID += ', ';
                            }
                            if (key % 4 === 3) {
                                raceID += '<br>';
                            }
                        });
                        tr.append('<td class="text-uppercase">' + raceID + '</td>');

                        tr.append('<td>' + item.team_group + '</td>');
                        tr.append('<td>' + item.registration + '</td>');
                        tr.append('<td>' + item.total_cost + '</td>');

                        var paymentType = '';
                        var paymentTypeClass = '';
                        switch (item.payment_type) {
                            case 1: // Direct Pay
                                paymentType = 'Direct Pay',
                                paymentTypeClass = 'border-lime text-lime';
                                break;
                            case 2: // BillPlz
                                paymentType = 'BillPlz',
                                paymentTypeClass = 'border-info text-info';
                                break;
                            case 3: // Cash
                                paymentType = 'Cash',
                                paymentTypeClass = 'border-green text-green';
                                break;
                            default:
                                paymentType = 'Unknown',
                                paymentTypeClass = 'border-dark text-dark';
                                break;
                        }
                        var paymentTypeBadge = '<span class="badge border ' + paymentTypeClass + ' px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i class="fa fa-circle fs-9px fa-fw me-5px"></i> ' + paymentType + '</span>';

                        var paymentStatusBadgeContent = '';
                        var paymentStatusClass = '';
                        switch (item.payment_status) {
                            case 0: // unpaid
                                paymentStatusBadgeContent = 'Unpaid';
                                paymentStatusClass = 'border-danger text-danger';
                                break;
                            case 1: // paid
                                paymentStatusBadgeContent = 'Paid';
                                paymentStatusClass = 'border-success text-success';
                                break;
                            default:
                                paymentStatusBadgeContent = 'Unknown';
                                paymentStatusClass = 'border-dark text-dark';
                                break;
                        }

                        var paymentStatusBadge = '<span class="badge border ' + paymentStatusClass + ' px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i class="fa fa-circle fs-9px fa-fw me-5px"></i> ' + paymentStatusBadgeContent + '</span>';

                        tr.append('<td>' + paymentTypeBadge + ' ' + paymentStatusBadge + '</td>');

                        tr.append('<td width="1%"><a data-fancybox href="' + rootUrl + 'assets/upload/' + item.uniq + '_' + item.nickname.toUpperCase() + '.pdf' + '" class="btn btn-invoice btn-yellow btn-sm my-n1 ms-2' + (item.approval === 0 ? ' disabled' : '') + '">Invoice</a></td>');
                        tr.append('<td width="1%"><a data-fancybox href="' + rootUrl + item.receipt + '" class="btn btn-receipt btn-indigo btn-sm my-n1 ms-2' + (item.receipt ? '' : ' disabled') + '">Receipt</a></td>');

                        var badgeClass = item.approval == 1 ? 'bg-primary' : 'bg-danger';
                        var approvalText = item.approval == 1 ? 'Approve' : 'Pending';
                        tr.append('<td width="1%" class="text-center"><span class="badge ' + badgeClass + '">' + approvalText + '</span>' +
                            (item.approval == 0 ? '<a href="#" data-to-approve="' + item.id + '" class="btn btn-warning btn-approval btn-sm my-n1 ms-2">Approve</a>' : '') + '</td>');

                        tr.find('.btn-approval').on('click', function(e) {
                            e.preventDefault();
                            const racerId = $(this).data('to-approve');
                            const approvalButton = $(this);

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You are about to approve this racer.",
                                icon: "warning",
                                type: "warning",
                                showDenyButton: true,
                                confirmButtonText: 'Yes',
                                denyButtonText: 'No',
                            }).then((willApprove) => {
                                if (willApprove.isConfirmed) {
                                    const loadingIcon = $('<i class="fas fa-spinner fa-spin"></i>');
                                    approvalButton.html(loadingIcon);

                                    $.ajax({
                                        method: 'POST',
                                        url: '{{ route('apps.mhx-cup.approveRegister') }}',
                                        data: {
                                            _token : '{{ csrf_token() }}',
                                            id     : racerId
                                        },
                                        success: function(response) {
                                            if(response.status == true){
                                                Swal.fire({
                                                    title: response.title,
                                                    text: response.msg,
                                                    icon: 'success',
                                                })
                                            }
                                            approvalButton.closest('td').html('<span class="badge bg-primary">Approved</span>');
                                            tr.find('.btn-invoice').removeClass('disabled');
                                            // tr.find('.btn-receipt, .btn-invoice').removeClass('disabled');

                                            loadData(categoryLoad);
                                            console.log('Area refresh');
                                        },
                                        error: function(error) {
                                            // Handle error, e.g., show an error message
                                        }
                                    });
                                } else if (willApprove.isDenied) {
                                    Swal.fire({
                                        title: "Changes are not saved",
                                        text: "Racer have not been approved!",
                                        icon: "info",
                                        type: "info",
                                    });
                                }
                            });
                        });

                        {{--tr.append('<td>' +--}}
                        {{--    '@can('mhx-cup-show')<a href="' + urlvar + item.id + '" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a> @endcan' +--}}
                        {{--    '@can('mhx-cup-edit')<a href="' + urlvar + item.id + '/edit' + '" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a> @endcan' +--}}
                        {{--    '@can('mhx-cup-delete') <a href="' + urlvar + 'destroy/' + item.id + '" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a> @endcan' +--}}
                        {{--    '</td>');--}}

                        targetTable.append(tr);
                    });
                });
            }

            loadData($('ul.nav-tabs .nav-link.active').data('category-load'));

            $('ul.nav-tabs a').on('click', function(e) {
                e.preventDefault();
                var categoryLoad = $(this).data('category-load');
                loadData(categoryLoad);
            });

        });
    </script>
@endpush
