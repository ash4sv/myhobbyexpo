@extends('layouts.master')

@section('page-title', 'New Booth Number')
@section('page-header', 'New Booth Number')
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
            <h4 class="panel-title">@yield('page-title')</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <form action="{{ route('apps.exhibitor.booths.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="hobby-select form-select @error('category') is-invalid @enderror" name="category" id="category">
                        @foreach($categories as $key => $category)
                            <option value="{{ $category->id  }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="table-responsive">
                        <div class="mb-0">
                            <a href="#" class="btn btn-sm btn-purple" id="addRow"><i class="fas fa-plus"></i></a>
                        </div>

                        <table id="boothsTable" class="table table-striped align-middle">
                            <thead>
                            <tr>
                                <td width="1%" class="text-center">No.</td>
                                <td>Booths Number</td>
                                <td>Description</td>
                                <td width="1%">Status</td>
                                <td width="1%" class="text-center">#</td>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mb-0">
                    <button type="submit" class="btn btn-indigo w-100px">Save</button>
                </div>

            </form>

        </div>
    </div>

@endsection

@push('script')
    <script>
        // Wait for the document to be ready
        $(document).ready(function () {
            // Counter for numbering
            let rowNum = 1;

            $('#addRow').click(function (e) {
                e.preventDefault();
                const tbody = $('#boothsTable tbody');
                const newRow = $('<tr>');
                newRow.append(`<td class="text-center">${rowNum}</td>`);
                newRow.append('<td><input type="text" class="form-control my-n1" name="name[]" value=""></td>');
                newRow.append('<td><input type="text" class="form-control my-n1" name="booth_desp[]" value=""></td>');
                newRow.append('<td></td>');
                newRow.append('<td><a href="#" class="btn btn-sm btn-danger my-n1 removeRow"><i class="fas fa-trash"></i></a></td>');
                rowNum++;
                tbody.append(newRow);
            });

            // Remove a row when the "Delete" button is clicked
            $('#boothsTable').on('click', '.removeRow', function (e) {
                e.preventDefault();
                $(this).closest('tr').remove();
                updateRowNumbers();
            });

            function updateRowNumbers() {
                $('#boothsTable tbody tr').each(function (index) {
                    $(this).find('td:first').text(index + 1);
                });
                rowNum = $('#boothsTable tbody tr').length + 1;
            }
        });
    </script>
@endpush
