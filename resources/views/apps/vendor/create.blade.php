@extends('layouts.master')

@section('page-title', 'Add Vendor')
@section('page-header', 'Add Vendor')
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
            <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                    class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                    class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                    class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                    class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="panel-body">

        <form action="{{ route('apps.vendors.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="company" class="form-label">Company:</label>
                <input type="text" class="form-control" id="company" name="company" required>
            </div>

            <div class="mb-3">
                <label for="roc_rob" class="form-label">Register of Company:</label>
                <input type="text" class="form-control" id="roc_rob" name="roc_rob">
            </div>

            <div class="mb-3">
                <label for="pic_name" class="form-label">Person in Charge:</label>
                <input type="text" class="form-control" id="pic_name" name="pic_name">
            </div>

            <div class="mb-3">
                <label for="phone_num" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="phone_num" name="phone_num">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter:</label>
                <input type="text" class="form-control" id="twitter" name="social_media[twitter]">
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="social_media[facebook]">
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram:</label>
                <input type="text" class="form-control" id="instagram" name="social_media[instagram]">
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website:</label>
                <input type="text" class="form-control" id="website" name="website">
            </div>

            <div class="mb-3">
                <label for="hall" class="form-label">Hall:</label>
                <select class="form-control" id="hall" name="hall">

                    <option value="">Please Choose</option>

                    @foreach($hall as $h)
                    <option value="{{ $h->id }}">{{ $h->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="section" class="form-label">Section:</label>
                <select class="form-control" id="section" name="section">

                </select>
            </div>

            <div class="mb-3">
                <label for="section" class="form-label">Booth Number:</label>
                <select class="form-control" id="booth_number" name="booth_number">

                </select>
            </div>








            <!-- Add more social media fields as needed -->

            <button type="submit" class="btn btn-primary">Add Vendor</button>
        </form>


    </div>
</div>

@endsection


@push('script')
<script>
    $(document).ready(function () {
        $('#hall').change(function () {
            console.log($(this).val());

            var hallId = $(this).val();

            $.ajax({
                method: 'get',
                url: '/getSections/' + hallId,
                success: function (response) {
                    $('#section').html(response);
                },
                error: function (error) {
                    // Handle error, e.g., show an error message
                }
            });
        });
    });

</script>
@endpush