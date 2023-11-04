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

            <table class="mhx-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th width="1%">No.</th>
                    <th>Ref</th>
                    <th>Full Name</th>
                    <th>IC Number</th>
                    <th>Race ID</th>
                    <th>Team Group</th>
                    <th>Registration</th>
                    <th>Total Cost (RM)</th>
                    <th>Invoices</th>
                    <th>Receipt</th>
                    <th width="2%">Approval</th>
                    <th width="1%">#</th>
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
                        tr.append('<td width="1%"><a data-fancybox href="' + rootUrl + 'assets/upload/' + item.uniq + '_' + item.nickname + '.pdf' + '" class="btn btn-invoice btn-xs btn-yellow btn-sm my-n1 ms-2' + (item.approval === 0 ? ' disabled' : '') + '">View Invoice</a></td>');
                        tr.append('<td width="1%"><a data-fancybox href="' + rootUrl + item.receipt + '" class="btn btn-receipt btn-xs btn-indigo btn-sm my-n1 ms-2' + (item.receipt ? '' : ' disabled') + '">View Receipt</a></td>');

                        var badgeClass = item.approval == 1 ? 'bg-primary' : 'bg-danger';
                        var approvalText = item.approval == 1 ? 'Approve' : 'Pending';
                        tr.append('<td width="1%" class="text-center"><span class="badge ' + badgeClass + '">' + approvalText + '</span>' +
                            (item.approval == 0 ? '<a href="#" data-to-approve="' + item.id + '" class="btn btn-xs btn-warning btn-approval btn-sm my-n1 ms-2">Approve</a>' : '') + '</td>');

                        tr.find('.btn-approval').on('click', function(e) {
                            e.preventDefault();
                            const racerId = $(this).data('to-approve');

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You are about to approve this racer.",
                                icon: "warning",
                                buttons: ["Cancel", "Approve"],
                                dangerMode: true,
                            }).then((willApprove) => {
                                if (willApprove) {
                                    // User confirmed, submit a POST request to your Laravel server
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
                                            tr.find('.btn-receipt, .btn-invoice').removeClass('disabled');
                                        },
                                        error: function(error) {
                                            // Handle error, e.g., show an error message
                                        }
                                    });
                                }
                            });
                        });

                        tr.append('<td>' +
                            '@can('mhx-cup-show')<a href="' + urlvar + item.id + '" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a> @endcan' +
                            '@can('mhx-cup-edit')<a href="' + urlvar + item.id + '/edit' + '" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a> @endcan' +
                            '@can('mhx-cup-delete') <a href="' + urlvar + 'destroy/' + item.id + '" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a> @endcan' +
                            '</td>');

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
