@extends('layouts.master')

@section('page-title', 'Add New Exhibition Booth Number')
@section('page-header', 'Add New Exhibition Booth Number')
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

            <form action="{{ route('apps.exhibition.booth-number.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <a href="#" class="btn btn-primary px-4">
                            <i class="fa fa-plus me-2 ms-n2 text-white"></i> Add Number
                        </a>
                    </div>
                </div>

                <table class="table table-striped table-striped-columns align-middle">
                    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th width="33.33333333%"></th>
                        <th width="33.33333333%">Booth Number</th>
                        <th width="33.33333333%">Description</th>
                        th
                        <th width="1%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>
                            <select class="form-control hobby-select" name="zone[]" id="">
                                @foreach($zones as $key => $zone)
                                <option value="{{ $key }}">{{ $zone }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" class="form-control my-n1" placeholder="Booth Number" name="booth_number[]" value=""></td>
                        <td><input type="text" class="form-control my-n1" placeholder="Description" name="description[]" value=""></td>
                        <td>
                            <div><input type="checkbox" name="status[]" id="switchery-default"/></div>
                        </td>
                        <td>
                            <a href="" class="btn btn-sm btn-danger btn-sm my-n1"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="mb-0">
                    <button type="submit" class="btn btn-success w-90px">Save</button>
                    <button type="reset" class="btn btn-lime w-90px">Reset</button>
                    <a href="{{ route('apps.exhibition.booth-number.index') }}" class="btn btn-yellow w-90px">Back</a>
                </div>
            </form>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            const addButton = $(".btn-primary");
            const tableBody = $("tbody");

            let rowCount = 1; // Initialize row count with 1 for the existing row

            addButton.click(function (e) {
                e.preventDefault();

                // Increment the row count for each new row
                rowCount++;

                // Create a new table row
                const newRow = $("<tr>");

                // Create table data cells
                const cell1 = $("<td>").addClass("text-center").text(rowCount); // Add row number
                const cell2 = $("<td>"); // Dropdown with options from PHP loop
                const selectDropdown = $("<select class='form-control hobby-select' name='zone[]'>");

                // Assuming you have a PHP array called $zones
                @foreach($zones as $key => $zone)
                selectDropdown.append('<option value="{{ $key }}">{{ $zone }}</option>');
                @endforeach

                cell2.append(selectDropdown);

                selectDropdown.select2();

                const cell3 = $("<td>").append('<input type="text" class="form-control my-n1" placeholder="Booth Number" name="booth_number[]" value="">');
                const cell4 = $("<td>").append('<input type="text" class="form-control my-n1" placeholder="Description" name="description[]" value="">');
                const cell5 = $("<td>").append('<div><input type="checkbox" name="status[]" id="switchery-default"/></div>');
                const cell6 = $("<td>").append('<a href="" class="btn btn-sm btn-danger btn-sm my-n1"><i class="fas fa-trash-alt"></i></a>');

                // Add an event listener to remove the row when the button is clicked
                cell4.find('a').click(function () {
                    newRow.remove();
                });

                // Append cells to the row
                newRow.append(cell1, cell2, cell3, cell4, cell5, cell6);

                // Append the row to the table body
                tableBody.append(newRow);
            });
        });
    </script>
@endpush
