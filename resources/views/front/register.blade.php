@extends('front.layout.master')

@section('reg-form')

    <div class="row">
        <div class="col-md-6 mx-auto mb-5">
            <a href="{{ route('front.register') }}">
                <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-30px img-fluid">
            </a>
        </div>
    </div>

    <div id="interest_in">
        <div class="row justify-content-center g-4 pb-5">
            <div class="col-md-3 col-6">
                <a href="" id="flea_market_btn">
                    <img src="{{ asset('assets/images/flea-market.png') }}" alt="" class="img-fluid">
                    <input type="hidden" name="" class="form-control">
                </a>
            </div>
            {{--<div class="col-md-3 col-6">
                <a href="" id="hobby_group_zone_btn">
                    <img src="{{ asset('assets/images/hobby-group-zone.png') }}" alt="" class="img-fluid">
                    <input type="hidden" name="" class="form-control">
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="" id="activity_zone_zone_btn">
                    <img src="{{ asset('assets/images/activity-zone.png') }}" alt="" class="img-fluid">
                    <input type="hidden" name="" class="form-control">
                </a>
            </div>--}}
        </div>
    </div>

    <div id="flea_market">
        <div id="booth_type">
            <div class="row justify-content-center g-4 pb-5">
                @foreach($categories as $category)
                <div class="col-md-3 col-6">
                    <a href="" class="section-toggle" data-target="{{ $category->slug }}" id="flea_market_{{ $category->slug }}_btn">
                        <img src="{{ asset($category->image) }}" alt="" class="img-fluid">
                        <input type="hidden" name="" class="form-control">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        @foreach($categories as $category)
        <div id="{{ $category->slug }}" class="dynamic-section">
            <div class="row justify-content-center g-4 pb-5">
                <div class="col-md-9">
                    <div class="card mb-4 shadow-lg rounded">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/layout-1@4x-50.jpg') }}" class="img-fluid" alt="...">
                        </div>
                    </div>

                    <div class="card shadow-lg rounded">
                        <div class="card-body">

                            <form action="{{ route('front.booth') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title">1. Additional Furniture, Fixtures and Equipment</h4>
                                <hr class="my-10px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Quantity Booths</label>
                                            <div class="input-group">
                                                <select name="booth_qty" id="booth_qty" class="form-control default-select2">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <input type="text" aria-label="" class="form-control" name="booth_price" id="booth_price" readonly value="RM {{ $category->price }}">
                                                <input type="hidden" name="booth_price_unit" id="booth_price_unit" value="{{ $category->price }}">
                                            </div>
                                            <div id="" class="form-text">Came with {{ $category->ffe_table }} Unit Table,
                                                {{ $category->ffe_chair }} Unit Chair, {{ $category->ffe_sso }} Unit SSO 13Amp for 1 booths</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">

                                            <div class="booth-area">
                                                @foreach($category->numbers as $number)
                                                <div class="booth-box {{ $number->status == 1? 'selected':'' }}">
                                                    <input type="checkbox" name="booths[{{$number->id}}]" id="btn_{{ $number->id }}_{{ $number->slug }}" {{ $number->status == 1? 'disable':'' }}>
                                                    <label for="btn_{{ $number->id }}_{{ $number->slug }}" class="booth-label">{{ $number->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <h4 class="card-title">2. Additional Furniture, Fixtures and Equipment</h4>
                                <hr class="my-10px">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Table</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="RM 1.00" id="table_TPrice" name="table_TPrice" readonly>
                                                <input type="hidden" name="" id="add_on_table" value="1.00">
                                                <select name="add_table" id="add_table" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Chair</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="RM 1.00" id="chair_TPrice" name="chair_TPrice" readonly>
                                                <input type="hidden" name="" id="add_on_chair" value="1.00">
                                                <select name="add_chair" id="add_chair" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Switch Socket Outlet (13 amp)</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="RM 1.00" id="sso_TPrice" name="sso_TPrice" readonly>
                                                <input type="hidden" name="" id="add_on_sso" value="1.00">
                                                <select name="add_sso" id="add_sso" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0 text-center">
                                    <button type="submit" class="btn btn-indigo btn-lg w-300px">
                                        Booking
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="hobby_group_zone">
        <div class="row justify-content-center g-4 pb-5">
            <div class="col-md-9">
                <div class="card mb-4 shadow-lg rounded">
                    <div class="card-body">
                        <h1>hobby_group_zone</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="activity_zone">
        <div class="row justify-content-center g-4 pb-5">
            <div class="col-md-9">
                <div class="card mb-4 shadow-lg rounded">
                    <div class="card-body">
                        <h1>activity_zone</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('reg-script')
    <script>
        $('#flea_market, #hobby_group_zone, #activity_zone, .dynamic-section').hide();

        $('#flea_market_btn').click(function () {
            event.preventDefault();
            $('#flea_market').show();
            $('#interest_in').hide();

            $('.section-toggle').click(function() {
                event.preventDefault();
                var targetId = $(this).data('target');
                $('#' + targetId).show();
                $('.dynamic-section').not('#' + targetId).hide(); // Hide other sections

                $('#booth_type').hide();
            });
        })

        $('#hobby_group_zone_btn').click(function () {
            event.preventDefault();
            $('#hobby_group_zone').show();
            $('#interest_in').hide();
        })

        $('#activity_zone_zone_btn').click(function () {
            event.preventDefault();
            $('#activity_zone').show();
            $('#interest_in').hide();
        })

        function priceUnit() {
            var unitPrice = $('#booth_price_unit').val();
            var qtyBooth = $('#booth_qty').val();
            var totalBoothPrice = unitPrice * qtyBooth;

            $('#booth_price').val('RM ' + parseFloat(totalBoothPrice).toFixed(2));

            console.log('Total', totalBoothPrice);
        }
        function priceUnitTable() {
            var unitPrice = $('#add_on_table').val();
            var qtyTable = $('#add_table').val();
            var totalTablePrice = unitPrice * qtyTable;

            $('#table_TPrice').val('RM ' + parseFloat(totalTablePrice).toFixed(2));

            console.log('Total', totalTablePrice);
        }
        function priceUnitChair() {
            var unitPrice = $('#add_on_chair').val();
            var qtyChair = $('#add_chair').val();
            var totalTableChair = unitPrice * qtyChair;

            $('#chair_TPrice').val('RM ' + parseFloat(totalTableChair).toFixed(2));

            console.log('Total', totalTableChair);
        }
        function priceUnitSSO() {
            var unitPrice = $('#add_on_sso').val();
            var qtySSO = $('#add_sso').val();
            var totalTableSSo = unitPrice * qtySSO;

            $('#sso_TPrice').val('RM ' + parseFloat(totalTableSSo).toFixed(2));

            console.log('Total', totalTableSSo);
        }

        $('#booth_qty').change(function () {
            priceUnit();
        });

        $('#add_table').change(function () {
            priceUnitTable();
        });

        $('#add_chair').change(function () {
            priceUnitChair();
        });

        $('#add_sso').change(function () {
            priceUnitSSO();
        });

        priceUnit();
        priceUnitTable();
        priceUnitChair();
        priceUnitSSO();

    </script>
@endpush
