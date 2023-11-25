@extends('layouts.master')

@section('page-title', 'Exhibition Booth Number')
@section('page-header', 'Exhibition Booth Number')
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

            <div class="d-flex align-items-center mb-3">
                <div class="me-auto">
                    @can('booth-number-create')
                    <a href="{{ route('apps.exhibition.booth-number.create') }}" class="btn btn-primary px-4">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Booth Number
                    </a>
                    <a href="#batchAddBooth" class="btn btn-indigo px-4" id="batchAddBoothNumber" data-bs-toggle="modal">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Batch Add Booth Number
                    </a>
                    @endcan
                    @can('booth-number-edit')
                    <a href="#" class="btn btn-warning px-4" id="batchEditBoothNumber">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Batch Edit Booth Number
                    </a>
                    @endcan
                    @can('booth-number-delete')
                    <a href="#" class="btn btn-danger px-4" id="batchDeleteSelectedRecord">
                        <i class="fa fa-plus me-2 ms-n2 text-white"></i> Batch Delete Booth Number
                    </a>
                    @endcan
                </div>
            </div>


            <table class="data-table table table-striped table-bordered align-middle text-nowrap mb-0">
                <thead>
                <tr>
                    <th width="1%">No.</th>
                    <th width="1%">
                        <div class="form-check">
                            <input type="checkbox" value="" id="check-all" class="form-check-input">
                            <label for="" class="form-check-label">&nbsp;</label>
                        </div>
                    </th>
                    <th width="1%">Booth Numbers</th>
                    <th width="47.5%">Zone</th>
                    <th width="47.5%"></th>
                    <th width="1%">Status</th>
                    <th width="1%">#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($booths as $booth)
                    <tr id="booth_ids{{ $booth->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" value="{{ $booth->id }}" id="tab-check" name="id" class="form-check-input">
                            </div>
                        </td>
                        <td>
                            @isset($booth->booth_number)
                                <label for="tab-check-{{ $booth->id }}" class="form-check-label">{{ $booth->booth_number }}</label>
                            @endisset
                        </td>
                        <td>
                            @isset($booth->sections)
                                {{ $booth->sections->name }}
                            @endisset
                        </td>
                        <td>
                            @isset($booth->vendor->company)
                                {{ $booth->vendor->company }} |
                            @endisset
                            @isset($booth->vendor->roc_rob)
                                {{ $booth->vendor->roc_rob }} |
                            @endisset
                            @isset($booth->vendor->pic_name)
                                {{ $booth->vendor->pic_name }} |
                            @endisset
                            @isset($booth->vendor->phone_num)
                                <a href="tel:{{ $booth->vendor->phone_num }}">{{ $booth->vendor->phone_num }}</a> |
                            @endisset
                            @isset($booth->vendor->email)
                                <a href="mailto:{{ $booth->vendor->email }}">{{ $booth->vendor->email }}</a>
                            @endisset
                        </td>
                        <td>
                    <span class="badge {{ $booth->status == 1 ? 'bg-primary' : 'bg-danger' }}">
                        {{ $booth->status == 1 ? 'Booked' : 'Available' }}
                    </span>
                        </td>
                        <td>
                            @can('booth-number-show')
                            <a href="{{ route('apps.exhibition.booth-number.show', $booth) }}" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a>
                            @endcan
                            @can('booth-number-edit')
                            <a href="{{ route('apps.exhibition.booth-number.edit', $booth) }}" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('booth-number-delete')
                            <a href="{{ route('apps.exhibition.booth-number.destroy', $booth->id) }}" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>

            <div class="modal fade" id="batchAddBooth">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Batch Add Booth Numbers</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('apps.batchboothadd') }}" method="POST" id="saveBatch">
                                @csrf
                                <div class="mb-3">
                                    <label for="batchZone" class="form-label">Zone</label>
                                    <select class="form-control" name="zone" id="batchZone">
                                        @foreach($zones as $key => $zone)
                                            <option value="{{ $key }}">{{ $zone }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="batchPrefix" class="form-label">Prefix</label>
                                    <input type="text" name="prefix" id="batchPrefix" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Prefix</label>
                                    <div class="input-group">
                                        <input name="start" id="batchStart" type="text" class="form-control" placeholder="Start Number" aria-label="Start Number">
                                        <span class="input-group-text">to</span>
                                        <input name="end" id="batchEnd" type="text" class="form-control" placeholder="End Number" aria-label="End Number">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                            <a href="javascript:;" class="btn btn-success px-4" id="batchBoothStore">Save</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#check-all').click(function () {
                $('.form-check-input').prop('checked', $(this).prop('checked'));
            });

            $('#batchBoothStore').click(function (g) {
                g.preventDefault();
                $('#saveBatch').submit();
            });

            $('#batchEditBoothNumber').click(function (e) {
                e.preventDefault();

                var selectedBooths = [];
                $('input:checkbox[name="id"]:checked').each(function () {
                    selectedBooths.push($(this).val());
                });

                if (selectedBooths.length === 0) {
                    return;
                }
                // Redirect to the batch edit page with the selected booth IDs
                var editUrl = '{{ route('apps.exhibition.batchboothedit') }}' + '?id[]=' + selectedBooths.join('&id[]=');
                window.location.href = editUrl;
            });

            $('#batchDeleteSelectedRecord').click(function (e) {
                e.preventDefault();

                var all_Ids = [];

                $('input:checkbox[name="id"]:checked').each(function () {
                    all_Ids.push($(this).val());
                });

                if (all_Ids.length === 0) {
                    // No checkboxes are selected, you can handle this case as needed
                    return;
                }

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    icon: 'warning',
                    title: 'Delete this?',
                    text: 'Are you sure you want to delete?',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    confirmButtonColor: '#e3342f',
                }).then((result) => {
                    if (result.isConfirmed === true) {
                        // Perform the AJAX delete operation
                        $.ajax({
                            url: '{{ route('apps.batchboothdelete') }}',
                            type: 'DELETE',
                            data: {
                                id: all_Ids,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                if (response.success) {
                                    // Handle success, e.g., remove the deleted records from the DOM
                                    $.each(all_Ids, function (key, val) {
                                        $('#booth_ids' + val).remove();
                                    });
                                    // Show a success SweetAlert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted',
                                        text: 'Selected records have been deleted successfully.',
                                    });
                                } else {
                                    // Show an error SweetAlert
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'An error occurred while deleting records.',
                                    });
                                }
                            },
                            error: function (d) {
                                console.log(d);
                                // Show an error SweetAlert
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while sending the request.',
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush

{{--Batch update--}}
