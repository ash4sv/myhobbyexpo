@extends('layouts.master')

@section('page-title', 'Register Racer')
@section('page-header', 'Register Racer')
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


            <div class="row">
                <div class="col-md-8 mx-auto">

                    <h2 class="text-center mt-sm-0 mb-sm-5 mt-4 mb-5 font-weight-700 text-uppercase">Please select your race category</h2>

                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-0 text-center">
                                <a href="" class="category-select">
                                    <img src="{{ asset('assets/images/mini-4wd/mhxc_001.png') }}" alt="" class="img-fluid">
                                    {{--<h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">SEMI-TECH</h3>--}}
                                </a>
                                <input type="hidden" name="category" value="semi-tech class a">
                                <input type="hidden" name="price_category" value="200">
                            </div>
                            <a href="{{ asset('assets/upload/') }}" class="card-footer text-center py-2 font-weight-600 text-uppercase">
                                Rules & Regulations
                            </a>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-0 text-center">
                                <a href="" class="category-select">
                                    <img src="{{ asset('assets/images/mini-4wd/mhxc_002.png') }}" alt="" class="img-fluid">
                                    {{--<h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">B-MAX</h3>--}}
                                </a>
                                <input type="hidden" name="category" value="b-max class b">
                                <input type="hidden" name="price_category" value="120">
                            </div>
                            <a href="{{ asset('assets/upload/') }}" class="card-footer text-center py-2 font-weight-600 text-uppercase">
                                Rules & Regulations
                            </a>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-0 text-center">
                                <a href="" class="category-select">
                                    <img src="{{ asset('assets/images/mini-4wd/mhxc_003.png') }}" alt="" class="img-fluid">
                                    {{--<h3 class="bg-mhx-red text-white card-title py-10px rounded-pill font-weight-700 mb-0">STOCK-CAR</h3>--}}
                                </a>
                                <input type="hidden" name="category" value="stock-car class c">
                                <input type="hidden" name="price_category" value="35">
                            </div>
                            <a href="{{ asset('assets/upload/') }}" class="card-footer text-center py-2 font-weight-600 text-uppercase">
                                Rules & Regulations
                            </a>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>

@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('.category-select').on('click', function() {
            event.preventDefault(); // Prevent the default behavior of the anchor tag
            var category = $(this).siblings('input[name="category"]').val(); // Get the category value
            var price_category = $(this).siblings('input[name="price_category"]').val(); // Get the category value

            // Make an AJAX POST request
            $.ajax({
                url: '{{ route("mhxcup.categoryPost") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    category: category,
                    price_category: price_category
                },
                success: function(response) {
                    console.log(response.message);
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endpush
