@extends('front.layout.master')

@section('page-title', 'VENDOR REGISTRATION')

@section('reg-form')

    <div class="row">
        @isset($full)
        <div class="col-md-6 mx-auto mb-4">
            <a href="{{ route('front.register') }}">
                <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-10px img-fluid">
            </a>
        </div>
        @endisset

        @isset($direct)
        @foreach($halls as $hall)
            <div class="col-md-6 mx-auto mb-4">
                <a href="{{ route('front.register.hall', $hall->slug) }}">
                    <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-10px img-fluid">
                </a>
            </div>
        @endforeach
        @endisset
    </div>

    <div id="interest_in">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-white text-center mb-5">PLEASE SELECT YOUR HOBBY HALL</h4>
            </div>
        </div>
        <div class="row justify-content-center g-4 pb-5">
            @foreach($halls as $hall)
                <div class="col-md-3 col-6 {{ $hall->coming_soon == 1? 'disabled-prop-btn':'' }}">
                    <a href="" id="{{ $hall->slug }}_btn">
                        <img src="{{ asset($hall->poster) }}" alt="" class="img-fluid">
                        <input type="hidden" name="hall_id" value="{{ $hall->id }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    @foreach($halls as $hall)
        <div id="{{ $hall->slug }}" class="hall-body">
            {{--Section Btn--}}
            <div id="booth_type">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-white text-center mb-5">PLEASE SELECT YOUR HOBBY ZONE</h4>
                    </div>
                </div>
                <div class="row justify-content-center g-4 pb-5">
                    @foreach($hall->sections->where('status', true) as $section)
                        <div class="col-md-3 col-6  {{ $section->coming_soon == 1? 'disabled-prop-btn':'' }}">
                            <a href="" class="section-toggle" data-target="{{ $section->slug }}" id="{{ $section->slug }}_btn">
                                <img src="{{ asset($section->poster) }}" alt="" class="img-fluid">
                                <input type="hidden" name="" class="form-control">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--Section Btn--}}

            @foreach($hall->sections as $section)
                <div id="{{ $section->slug }}" class="dynamic-section">
                    <div class="row justify-content-center g-4 pb-5">
                        <div class="col-md-9">

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-white text-center mb-5">BOOTH & FFE SELECTIONS</h4>
                                </div>
                            </div>

                            <div class="card mb-4 shadow-lg rounded">
                                <div class="card-body">
                                    <a data-fancybox data-src="{{ asset($section->layout) }}" data-caption="{{ $hall->name }}" href="">
                                        <img src="{{ asset($section->layout) }}" class="img-fluid" alt="...">
                                    </a>
                                </div>
                            </div>

                            <div class="card shadow-lg rounded">
                                <div class="card-body">

                                    <form id="form-booth-fee-section" action="{{ route('front.booth') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="section_id" value="{{ $section->id }}" readonly>
                                        <input type="hidden" name="sub_total" id="sub_total" value="" readonly>
                                        <input type="hidden" name="total" id="total" value="" readonly>

                                        <h4 class="card-title">1. Lot / Booths</h4>

                                        <hr class="my-10px">

                                        <div class="row" id="boothtype">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Booths Types <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select name="boothTypes" id="boothTypes" class="form-control default-select2" required>
                                                            @foreach($section->booths->where('status', true) as $booth)
                                                                <option value="{{ $booth->id }}">{{ $booth->booth_type }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if((request()->segment(2) == 'hall-a') && $section->id === 2)
                                                        <a data-fancybox data-src="{{ asset('assets/images/mhx2023-poster-pricing-02-hobby-show-off.png') }}" data-caption="Booths Type" href="" class="btn btn-outline-secondary">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                        @else
                                                        <a data-fancybox data-src="{{ asset('assets/images/booths-types.jpeg') }}" data-caption="Booths Type" href="" class="btn btn-outline-secondary">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Quantity Booths <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select name="booth_qty" id="booth_qty" class="form-control default-select2" required>
                                                            <option value="">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                        <input type="text" aria-label="" class="form-control" name="booth_price" id="booth_price" readonly value="RM ">
                                                        <input type="hidden" name="booth_price_unit" id="booth_price_unit" value="">
                                                    </div>
                                                    <div class="invalid-feedback boothQtyUnit"></div>

                                                    {{--<div id="" class="form-text">Came with {{ $category->ffe_table }} Unit Table,
                                                        {{ $category->ffe_chair }} Unit Chair, {{ $category->ffe_sso }} Unit SSO 13Amp for 1 booths</div>--}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">

                                                    <div class="booth-area boxed-check-group boxed-check-indigo mb-0">
                                                        {{--@foreach($section->numbers->where('status', '=', 0) as $number)
                                                            <label class="booth-box boxed-check" for="btn_{{ $number->id }}_{{ $number->slug }}">
                                                                <input class="boxed-check-input" type="checkbox" name="booths[id][{{$number->id}}]" id="btn_{{ $number->id }}_{{ $number->slug }}" {{ $number->status == 1? 'disabled':'' }}>
                                                                <div class="boxed-check-label">{{ $number->booth_number }}</div>
                                                            </label>
                                                        @endforeach--}}
                                                    </div>
                                                    <div id="invalid-booth-select" class="invalid-feedback text-center"></div>

                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="card-title">2. Additional Furniture, Fixtures and Equipment</h4>
                                        <hr class="my-10px">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Table (RM 45.00 / Unit)</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="RM 45.00" id="table_TPrice" name="table_TPrice" readonly>
                                                        <input type="hidden" name="add_on_table" id="add_on_table" value="45.00">
                                                        <select name="add_table" id="add_table" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Chair (RM RM 9.00 / Unit)</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="RM 9.00" id="chair_TPrice" name="chair_TPrice" readonly>
                                                        <input type="hidden" name="add_on_chair" id="add_on_chair" value="9.00">
                                                        <select name="add_chair" id="add_chair" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">SSO (13 amp) (RM 70.00 / Point)</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="RM 70.00" id="sso_TPrice" name="sso_TPrice" readonly>
                                                        <input type="hidden" name="add_on_sso" id="add_on_sso" value="70.00">
                                                        <select name="add_sso" id="add_sso" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">SSO (15 amp) (RM 150.00 / Point)</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="RM 150.00" id="ssoamp15_TPrice" name="ssoamp15_TPrice" readonly>
                                                        <input type="hidden" name="add_on_sso_15amp" id="add_on_sso_15amp" value="150.00">
                                                        <select name="add_sso_15amp" id="add_sso_15amp" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Steel Barricade (RM 55.00 / Unit)</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="RM 55.00" id="steel_barricade_TPrice" name="steel_barricade_TPrice" readonly>
                                                        <input type="hidden" name="add_on_steel_barricade" id="add_on_steel_barricade" value="55.00">
                                                        <select name="add_steel_barricade" id="add_steel_barricade" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Shell Scheme Barricade (RM 35.00 / meter)</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="RM 35.00" id="shell_scheme_barricade_TPrice" name="shell_scheme_barricade_TPrice" readonly>
                                                        <input type="hidden" name="add_on_shell_scheme_barricade" id="add_on_shell_scheme_barricade" value="35.00">
                                                        <select name="add_shell_scheme_barricade" id="add_shell_scheme_barricade" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                            <option value="19">19</option>
                                                            <option value="20">20</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-0 text-center">
                                             <input class="btn btn-indigo btn-lg w-300px" type="submit" value="Booking">
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endforeach

@endsection

@push('reg-script')
    <script>
        $(document).ready(function () {
            $('.hall-body, .dynamic-section').hide();

            @foreach($halls as $hall)$('#{{ $hall->slug }}_btn').click(function () {
                event.preventDefault();

                $('#{{ $hall->slug }}').show();
                $('#interest_in').remove();
                $('.hall-body').not('#{{ $hall->slug }}').remove();

                $('.section-toggle').click(function() {
                    event.preventDefault();
                    var targetId = $(this).data('target');
                    $('#' + targetId).show();
                    $('.dynamic-section').not('#' + targetId).remove(); // Hide other sections

                    $('#booth_type').remove();
                    calculatePrices();
                    checkBox();
                    boothTypeDependency();
                    validateForm();
                });
            })
            @endforeach

            function calculatePrices() {
                const items = [
                    {
                        id: 'booth',
                        unitPrice: parseFloat($('#booth_price_unit').val()),
                        qty: parseFloat($('#booth_qty').val()),
                        targetId: 'booth_price'
                    },
                    {
                        id: 'table',
                        unitPrice: parseFloat($('#add_on_table').val()),
                        qty: parseFloat($('#add_table').val()),
                        targetId: 'table_TPrice'
                    },
                    {
                        id: 'chair',
                        unitPrice: parseFloat($('#add_on_chair').val()),
                        qty: parseFloat($('#add_chair').val()),
                        targetId: 'chair_TPrice'
                    },
                    {
                        id: 'sso',
                        unitPrice: parseFloat($('#add_on_sso').val()),
                        qty: parseFloat($('#add_sso').val()),
                        targetId: 'sso_TPrice'
                    },
                    {
                        id: 'sso_15amp',
                        unitPrice: parseFloat($('#add_on_sso_15amp').val()),
                        qty: parseFloat($('#add_sso_15amp').val()),
                        targetId: 'ssoamp15_TPrice'
                    },
                    {
                        id: 'steel_barricade',
                        unitPrice: parseFloat($('#add_on_steel_barricade').val()),
                        qty: parseFloat($('#add_steel_barricade').val()),
                        targetId: 'steel_barricade_TPrice'
                    },
                    {
                        id: 'shell_scheme_barricade',
                        unitPrice: parseFloat($('#add_on_shell_scheme_barricade').val()),
                        qty: parseFloat($('#add_shell_scheme_barricade').val()),
                        targetId: 'shell_scheme_barricade_TPrice'
                    }
                ];

                let subTotal = 0;
                let total = 0;

                items.forEach(item => {
                    const totalItemPrice = item.unitPrice * item.qty;
                    $(`#${item.targetId}`).val('RM ' + totalItemPrice.toFixed(2));

                    if (item.id === 'booth' && !isNaN(totalItemPrice)) {
                        subTotal += totalItemPrice;
                    }

                    if (!isNaN(totalItemPrice)) {
                        total += totalItemPrice;
                    }
                });

                $('#sub_total').val('RM ' + subTotal.toFixed(2));
                $('#total').val('RM ' + total.toFixed(2));
                console.log('calculatePrices')
            }

            $('#booth_qty, #add_table, #add_chair, #add_sso, #add_sso_15amp, #add_steel_barricade, #add_shell_scheme_barricade').change(function () {
                calculatePrices();
            });

            // Initial calculation
            calculatePrices();

            function checkBox() {
                // Get all checkboxes within the booth-area
                var checkboxes = $('.booth-area input[type="checkbox"]');
                var boothQtySelect = $("#booth_qty");
                var lastCheckedCheckbox = null;
                // Listen for changes on checkboxes
                checkboxes.change(function () {
                    var countCheckedCheckboxes = checkboxes.filter(':checked').length;
                    var valQtySelect = parseInt(boothQtySelect.val());
                    // Disable all checkboxes in the booth-area
                    checkboxes.attr('disabled', 'disabled');
                    // Enable only the checked checkboxes
                    checkboxes.filter(':checked').removeAttr('disabled');
                    // If the count of checked checkboxes is less than the selected quantity, enable the remaining checkboxes
                    if (countCheckedCheckboxes < valQtySelect) {
                        checkboxes.filter(':not(:checked)').removeAttr('disabled');
                    }
                    // If a checkbox was unchecked, only enable that checkbox
                    if (lastCheckedCheckbox && !lastCheckedCheckbox.is(':checked')) {
                        lastCheckedCheckbox.removeAttr('disabled');
                    }
                    lastCheckedCheckbox = $(this);
                });
                console.log('checkBox');
            }

            checkBox();

            function boothTypeDependency() {
                // Function to fetch booth numbers and update the checkboxes
                function fetchBoothNumbers() {
                    var selectedBoothType = $('#boothTypes').val();
                    $.ajax({
                        url: '/get-booth-numbers', // Replace with the actual URL to your controller function
                        method: 'GET',
                        data: {
                            boothTypes: selectedBoothType,
                        },
                        success: function (response) {
                            var boothArea = $('.booth-area');
                            boothArea.empty(); // Clear existing checkboxes
                            // Loop through the response and create checkboxes
                            $.each(response[0], function (index, boothNumber) {
                                var checkbox = $('<label class="booth-box boxed-check" for="btn_' + boothNumber.id + '_' + boothNumber.slug + '">\
                                    <input class="boxed-check-input" type="checkbox" name="booths[id][' + boothNumber.id + ']" id="btn_' + boothNumber.id + '_' + boothNumber.slug + '">\
                                    <div class="boxed-check-label">' + boothNumber.booth_number + '</div>\
                                </label>');

                                // Append the checkbox to the container
                                boothArea.append(checkbox);
                                checkBox(); // Assuming this function is used for handling checkboxes
                            });

                            // Update the booth price and price unit inputs
                            var priceDisplay = response[1]; // Price from the controller
                            var specialPriceData = response[2]; // Special Price from the controller
                            var boothQtySelect = $("#booth_qty");

                            // Add an event listener to update the price when the select changes
                            if (specialPriceData.length > 0) {
                                boothQtySelect.on('change', function () {
                                    var valQtySelect = parseInt(boothQtySelect.val()) || 0;
                                    priceDisplay = findSpecialPrice(valQtySelect, specialPriceData);

                                    $('#booth_price').val('RM ' + parseFloat(priceDisplay).toFixed(2));
                                    $('#booth_price_unit').val(priceDisplay);

                                    console.log('specialPriceData');

                                    calculatePrices();
                                });
                            } else {
                                $('#booth_price').val('RM ' + parseFloat(priceDisplay).toFixed(2));
                                $('#booth_price_unit').val(priceDisplay);
                            }

                        },
                        error: function (error) {
                            /*console.error('Error:', error);*/
                        },
                    });

                }

                function findSpecialPrice(boothQty, specialPriceData) {
                    for (var i = 0; i < specialPriceData.length; i++) {
                        var priceRange = specialPriceData[i];
                        if (boothQty >= priceRange.min && (priceRange.max === null || boothQty <= priceRange.max)) {
                            return priceRange.price;
                        }
                    }
                    return null; // No special price found
                }

                // Trigger the fetchBoothNumbers function when the page loads
                fetchBoothNumbers(); // Call the function when the page loads

                // Listen for changes in the 'Booth Types' select
                $('#boothTypes').change(function () {
                    fetchBoothNumbers(); // Call the function when the select changes
                });

                console.log('boothTypeDependency');
            }

            boothTypeDependency();

            function validateForm() {
                $("#form-booth-fee-section").validate({
                    errorElement: "div",
                    errorClass: "is-invalid",
                    errorLabelContainer: $("#form-booth-fee-section div.boothQtyUnit"),
                    rules: {
                        booth_qty: {
                            required: true,
                        },
                    },
                    messages: {
                        booth_qty: "Please select a valid quantity of booths",
                    },
                    submitHandler: function (form) {
                        var checkedCount = $(".boxed-check-input:checked").length;
                        if (checkedCount < 1) {
                            // Display an error message or take any other desired action
                            $("#invalid-booth-select").text("Please select at least one booth.").show();
                        } else {
                            // Clear error message and submit the form
                            $("#invalid-booth-select").text("");
                            form.submit();
                        }
                    },
                });
            }
        });
    </script>
@endpush
