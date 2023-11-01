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

            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th width="1%">No.</th>
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
                {{--@foreach($registers as $register)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-uppercase">{{ $register->full_name }}</td>
                        <td>{{ $register->email }}</td>
                        <td class="text-uppercase">
                            @foreach($register->numberRegister as $key => $number)
                                {{ $register->nickname }}{{ sprintf("%03s", $number->register) }}@if (!$loop->last), @elseif ($key === count($register->numberRegister) - 1). @endif
                            @endforeach
                        </td>
                        <td>{{ $register->team_group }}</td>
                        <td>{{ $register->registration }}</td>
                        <td>{{ number_format($register->total_cost, 2) }}</td>
                        <td>
                            <a data-fancybox href="{{ asset('assets/upload') }}" class="btn btn-xs btn-yellow btn-sm my-n1 ms-2">View Invoice</a>
                        </td>
                        <td>
                            <a data-fancybox href="{{ asset($register->receipt) }}" class="btn btn-xs btn-indigo btn-sm my-n1 ms-2">View Receipt</a>
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $register->approval == 1 ? 'bg-primary' : 'bg-danger' }}">
                                {{ $register->approval == 1 ? 'Approve' : 'Pending' }}
                            </span>
                            @if($register->approval == 0)
                                <a href="#" data-to-approve="{{ $register->id }}" class="btn btn-xs btn-warning btn-sm my-n1 ms-2">Approve</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('apps.mhx-cup.register.show', $register) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('apps.mhx-cup.register.edit', $register) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('apps.mhx-cup.register.destroy', $register->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach--}}
                </tbody>
            </table>

        </div>
    </div>

@endsection

@push('script')
    <script>

        $('ul.nav-tabs a').on('click', function(e) {
            e.preventDefault();
            var categoryLoad = $(this).data('category-load');
            var targetTable = $('table.data-table tbody');

            $.get('{{ route('apps.mhx-cup.categoryMhxCup') }}', { category: categoryLoad }, function(data) {
                targetTable.empty();

                $.each(data, function(index, item) {

                    var tr = $('<tr>');
                    tr.append('<td>' + (index + 1) + '</td>');
                    tr.append('<td class="text-uppercase">' + item.full_name + '</td>');
                    tr.append('<td>' + item.email + '</td>');

                    var raceID = '';
                    $.each(item.number_register, function(key, number) {
                        console.log(item.number_register);

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
                    tr.append('<td><a data-fancybox href="' + item.invoice + '" class="btn btn-xs btn-yellow btn-sm my-n1 ms-2">View Invoice</a></td>');
                    tr.append('<td><a data-fancybox href="' + item.receipt + '" class="btn btn-xs btn-indigo btn-sm my-n1 ms-2">View Receipt</a></td>');

                    var badgeClass = item.approval == 1 ? 'bg-primary' : 'bg-danger';
                    var approvalText = item.approval == 1 ? 'Approve' : 'Pending';
                    tr.append('<td class="text-center"><span class="badge ' + badgeClass + '">' + approvalText + '</span>' +
                        (item.approval == 0 ? '<a href="#" data-to-approve="' + item.id + '" class="btn btn-xs btn-warning btn-sm my-n1 ms-2">Approve</a>' : '') + '</td>');

                    tr.append('<td>' +
                        '<a href="#" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>' +
                        '<a href="#" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>' +
                        '<a href="#" class="btn btn-sm btn-danger btn-sm my-n1"><i class="fas fa-trash-alt"></i></a>' +
                        '</td>');

                    targetTable.append(tr);

                    $('.data-table').DataTable();
                });
            });
        });


    </script>
@endpush
