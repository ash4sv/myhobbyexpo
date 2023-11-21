@extends('front.layout.master')

@section('page-title', 'PARTICIPANT CART')

@section('reg-form')

    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto mb-4">
            <a href="#">
                <img src="{{ asset('assets/images/logo-event@3x.png') }}" alt="" class="d-block mx-auto mb-10px img-fluid">
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto mb-4 text-center">
            <h4 class="text-white font-weight-700">Confirm Your Selection</h4>
            <p class="mb-0 text-white">Please check your selection and click 'Confirm & Checkout' when ready</p>
        </div>
    </div>

    <div class="row pb-5">
        <form id="cart-form" onsubmit="event.preventDefault();">
            <div id="cart-container" class="col-md-10 col-lg-8 mx-auto">
                <div class="card mb-4" id="data-cart">
                    <h5 class="card-header">Tickets</h5>
                    <div class="card-body">

                        @foreach($cartItems as $key => $item)
                            <div class="row align-items-center">
                                <div class="col-md-4 col-12 text-sm-start text-center">
                                    <h5 class="font-weight-700 mb-0 py-2">{{ $item['ticketType'] }}</h5>
                                    <input type="hidden" name="cart[{{ $key }}][ticketType]" value="{{ $item['ticketType'] }}">
                                </div>
                                <div class="col-md-2 col-4 text-center">
                                    <h5 class="mb-0 py-2">RM{{ $item['ticketTypePrice'] }}</h5>
                                    <input type="hidden" name="cart[{{ $key }}][ticketTypePrice]" value="{{ $item['ticketTypePrice'] }}">
                                </div>
                                <div class="col-md-2 col-4">
                                    <input class="form-control text-center quantity-input" type="number" name="quantity" value="{{ $item['ticketQuantity'] }}" data-ticket-type="{{ $item['ticketType'] }}">
                                    <input type="hidden" name="cart[{{ $key }}][ticketQuantity]" value="{{ $item['ticketQuantity'] }}">
                                    {{--<input class="form-control text-center" type="number" name="" id="" value="{{ $item['ticketQuantity'] }}">--}}
                                </div>
                                <div class="col-md-2 col-4 text-center">
                                    <!-- Display the total for each item -->
                                    <h5 class="mb-0 py-2">RM{{ number_format($item['total'], 2) }}</h5>
                                    <input type="hidden" name="cart[{{ $key }}][total]" value="{{ number_format($item['total'], 2) }}">
                                </div>
                                <div class="col-md-2 text-sm-end text-center">
                                    <button class="btn btn-white border-secondary bg-white btn-md mt-3 mt-sm-0" onclick="updateQuantity('{{ $item['ticketType'] }}')"><i class="fas fa-sync"></i></button>
                                    <button class="btn btn-white border-secondary bg-white btn-md mt-3 mt-sm-0" onclick="removeCartItem('{{ $item['ticketType'] }}')"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            @if(in_array($item['ticketType'], ['CHOII LIMITED EDITION PACK', 'CHOII 64 LIMITED EDITION PACK']))
                                <div class="elf-tshirt-section">
                                    <!-- Use a class to group the shirt size selections for each ticket -->
                                    @for ($i = 1; $i <= $item['ticketQuantity']; $i++)
                                        <div class="mb-3 mt-3 row">
                                            <!-- Use $i to append a unique number to the label -->
                                            <label for="shirt_size_{{ $key }}_{{ $i }}" class="col-sm-4 col-form-label">Select your shirt size {{ $i }}</label>
                                            <div class="col-sm-8">
                                                <select name="_shirt_sizes[{{ $key }}][]" id="shirt_size_{{ $key }}_{{ $i }}" class="form-control default-select2">
                                                    <!-- Updated shirt size options -->
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL (2XL)</option>
                                                    <option value="XXXL">XXXL (3XL)</option>
                                                    <option value="XXXXL">XXXXL (4XL)</option>
                                                    <option value="XXXXXL">XXXXXL (5XL)</option>
                                                    <option value="XXXXXXL">XXXXXXL (6XL)</option>
                                                    <option value="XXXXXXXL">XXXXXXXL (7XL)</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            @endif
                            <hr>
                        @endforeach

                        <div class="row">
                            <div class="col-md-6 text-start">
                                <a class="btn btn-link" href="{{ route('participant.form') }}">
                                    <i class="fas fa-arrow-left mr-2"></i> Continue Shopping
                                </a>
                            </div>
                            <div class="col-md-6 text-end">
                                <p class="mb-0">Total Amount</p>
                                <!-- Display the overall total -->
                                <h1 class="font-weight-700 mb-0">MYR{{ number_format($overallTotal, 2) }}</h1>
                                <input type="hidden" name="overallTotal" value="{{ number_format($overallTotal, 2) }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="" class="col-md-10 col-lg-8 mx-auto">
                <div class="card mb-4" id="customer-details">
                    <h5 class="card-header">Visitor Details</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="" name="full_name" value="{{ old('full_name') }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="identification_card_number" class="form-label">Identification Card Number / Passport Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="" name="identification_card_number" value="{{ old('identification_card_number') }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="" name="email" value="{{ old('email') }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="" name="phone_number" value="{{ old('phone_number') }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="agent_code" class="form-label">Agent <span class="text-danger">*</span></label>
                                    <select name="agent_code" id="agent_code" class="form-control default-select2">

                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <p class="mb-0 text-center">By clicking <strong>"Confirm & Checkout"</strong>, I hereby agree and consent to the <a target="_blank" href="#">Terms &amp; Conditions</a> of the event.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-0 text-center">
                <button class="btn btn-indigo btn-lg w-300px" onclick="confirmAndCheckout()">
                    Confirm & Checkout
                </button>
            </div>
        </form>
    </div>

@endsection

@push('reg-script')
    <script>
        function removeCartItem(ticketType) {
            $.ajax({
                type: 'POST',
                url: '{{ route('participant.removecartitem') }}', // Update the URL to your route
                data: {
                    ticketType: ticketType,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.status === true) {
                        console.log(response);
                        $('#cart-container').load(window.location.href + ' #data-cart');
                    }
                },
                error: function(error) {
                    console.error('Error removing item:', error);
                }
            });
        }

        function updateQuantity(ticketType) {
            var newQuantity = $('.quantity-input[data-ticket-type="' + ticketType + '"]').val();

            // Make an Ajax request to update the quantity
            $.ajax({
                type: 'POST',
                url: '{{ route('participant.updatequantity') }}',
                data: {
                    ticketType: ticketType,
                    newQuantity: newQuantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === true) {
                        // Refresh only the container
                        $('#cart-container').load(window.location.href + ' #data-cart');
                    } else {
                        console.error('Error updating quantity:', response.message);
                    }
                },
                error: function(error) {
                    console.error('Error updating quantity:', error);
                }
            });
        }

        function confirmAndCheckout() {
            // Update session data
            updateSessionData(function(success) {
                if (success) {
                    // Continue with Confirm & Checkout after updating the session
                    doConfirmAndCheckout();
                } else {
                    console.error('Error updating session data');
                }
            });
        }

        function doConfirmAndCheckout() {
            // Additional data to include in the request (visitor details)
            var visitorDetails = {
                full_name: $('[name="full_name"]').val(),
                identification_card_number: $('[name="identification_card_number"]').val(),
                email: $('[name="email"]').val(),
                phone_number: $('[name="phone_number"]').val(),
                agent_code: $('[name="agent_code"]').val(),
            };

            if (!validateVisitorDetails(visitorDetails)) {
                console.error('Error validating visitor details. Please fill in all required fields.');
                return;
            }

            // Ticket types that require shirt sizes
            var specialTicketTypes = ['CHOII LIMITED EDITION PACK', 'CHOII 64 LIMITED EDITION PACK'];

            // Construct cart data array with indexed keys
            var cartData = [];
            $('.quantity-input').each(function(index) {
                var ticketType = $(this).data('ticket-type');
                var quantity = $(this).val();

                // Construct cart item data
                var cartItemData = {
                    ticketType: ticketType,
                    ticketTypePrice: $('[name="cart[' + index + '][ticketTypePrice]"]').val(),
                    ticketQuantity: quantity,
                    total: $('[name="cart[' + index + '][total]"]').val(),
                };

                // Check if the ticket type requires special handling
                if (specialTicketTypes.includes(ticketType)) {
                    var shirtSizes = [];
                    // Iterate over the shirt size selects for the current ticket type
                    $('select[name="_shirt_sizes[' + index + '][]"]').each(function() {
                        shirtSizes.push($(this).val());
                    });
                    cartItemData.shirtSizes = shirtSizes;
                }

                // Push cart item data to the array
                cartData.push(cartItemData);
            });

            // Combine visitor details with cart data
            var formData = {
                cart: cartData,
                visitorDetails: visitorDetails,
                overallTotal: $('[name="overallTotal"]').val(),
                _token: '{{ csrf_token() }}',
            };

            // Make an Ajax request to handle the submission
            $.ajax({
                type: 'POST',
                url: '{{ route('participant.confirmcheckout') }}', // Update the URL to your route
                data: formData,
                success: function(response) {
                    if (response.status === true) {
                        // Redirect to a success page or perform other actions
                        window.location.href = response.redirect;
                    } else {
                        console.error('Error confirming checkout:', response);
                    }
                },
                error: function(error) {
                    console.error('Error confirming checkout:', error);
                }
            });
        }

        function updateSessionData(callback) {
            $.ajax({
                type: 'POST',
                url: '{{ route('participant.updatesession') }}', // Update the URL to your route
                data: { _token: '{{ csrf_token() }}' },
                success: function(response) {
                    if (response.status === true) {
                        // Callback with success
                        callback(true);
                    } else {
                        // Callback with failure
                        callback(false);
                        console.error('Error updating session data:', response.message);
                    }
                },
                error: function(error) {
                    // Callback with failure
                    callback(false);
                    console.error('Error updating session data:', error);
                }
            });
        }

        function validateVisitorDetails(visitorDetails) {
            // Check if any of the required fields is null or empty
            if (
                !visitorDetails.full_name ||
                !visitorDetails.identification_card_number ||
                !visitorDetails.email ||
                !visitorDetails.phone_number ||
                !visitorDetails.agent_code
            ) {
                return false;
            }

            return true;
        }

        $('.quantity-input').on('change', function() {
            var ticketType = $(this).data('ticket-type');
            var quantity = $(this).val();

            // Remove existing shirt size sections for this ticket type
            $('.elf-tshirt-section[data-ticket-type="' + ticketType + '"]').remove();

            // Append new shirt size sections based on the updated quantity
            for (var i = 1; i <= quantity; i++) {
                var newSection = $('.elf-tshirt-section:first').clone();
                newSection.find('label').text('Select your shirt size ' + i);
                newSection.find('select').attr('id', 'shirt_size_' + ticketType + '_' + i);
                newSection.attr('data-ticket-type', ticketType);
                $('.elf-tshirt-section:last').after(newSection);
            }
        });

        $(document).ready(function() {
            // Initialize jQuery Validate plugin
            $('#cart-form').validate({
                rules: {
                    full_name: {
                        required: true,
                    },
                    identification_card_number: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone_number: {
                        required: true,
                    },
                    agent_code: {
                        required: true,
                        min: 1,
                    }
                },
                messages: {
                    full_name: {
                        required: 'Please enter your full name.',
                    },
                    identification_card_number: {
                        required: 'Please enter your identification card number.',
                    },
                    email: {
                        required: 'Please enter your email address.',
                        email: 'Please enter a valid email address.',
                    },
                    phone_number: {
                        required: 'Please enter your phone number.',
                    },
                    agent_code: {
                        required: 'Please select your agent.',
                        min: 'Please select your agent.',
                    },
                },
                errorElement: "span",
                errorClass: "is-invalid",
                errorPlacement: function (error, element) {
                    error.appendTo(element.closest(".form-control").siblings(".invalid-feedback"));
                },
            });

            // Existing options
            $('#agent_code').append($('<option>', {
                value: 0,
                text: 'Please Select Your Sales Agent'
            }));
            $('#agent_code').append($('<option>', {
                value: 1,
                text: 'Normal Purchase (No Agent)'
            }));

            // Generate options with names starting from ELF001 and values from 3, incrementing both for each option
            for (let i = 1; i <= 50; i++) {
                let agentCode = 'ELF' + pad(i, 3); // pad function adds leading zeros if needed
                $('#agent_code').append($('<option>', {
                    value: i + 1, // Increment by 2 to start from 3
                    text: agentCode
                }));
            }

            // Function to pad numbers with leading zeros
            function pad(number, length) {
                let str = '' + number;
                while (str.length < length) {
                    str = '0' + str;
                }
                return str;
            }
        });

    </script>
@endpush
