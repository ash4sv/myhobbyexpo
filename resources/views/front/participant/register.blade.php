@extends('front.layout.master')

@section('page-title', 'PARTICIPANT REGISTRATION')

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
            <h4 class="text-white font-weight-700">Please Select Your Pack</h4>
            <p class="mb-0 text-white">Ticket Information</p>
        </div>
    </div>

    <div class="row pb-5">
        <div id="card-container" class="col-md-8 col-lg-6 mx-auto">
        </div>
    </div>

@endsection

@push('reg-script')
    <script>
        $(document).ready(function () {
            function pricing(earlyBird, walkIn) {
                var currentDate = new Date();
                var price;

                var earlyBirdEndDate = new Date('2023-12-01T23:59:59');
                // price = (currentDate <= earlyBirdEndDate) ? 'RM85.00' : 'RM99.00';
                price = (currentDate <= earlyBirdEndDate) ? earlyBird : walkIn;

                return price;
            }

            function storeTicketDetails(ticketType, ticketTypePrice, ticketQuantity) {
                return {
                    ticketType: ticketType,
                    ticketTypePrice: ticketTypePrice,
                    ticketQuantity: ticketQuantity
                };
            }

            // Function to create a card with dynamic data
            function createCard(cardTitle, ticketType, priceText, quantity, image) {
                // Create the card element
                var card = $('<div class="card mb-3">');
                var carRow = $('<div class="row g-0">');
                var cardColImg = $('<div class="col-md-4">' +
                    '<a data-fancybox data-src="' + image + '" href=""><img src="' + image + '" class="img-fluid rounded-start" alt=""></a>' +
                    '</div>');
                var cardColBody = $('<div class="col-md-8">');
                var cardBody = $('<div class="card-body">');

                var title = $('<h5 class="card-title font-weight-700">').text(cardTitle);
                cardBody.append(title);

                cardBody.append('<hr class="">');

                var row = $('<div class="row align-items-center">');

                var hiddenTicketType = $('<input type="hidden" name="ticket_type" value="' + ticketType + '">');
                var numericPrice = priceText.match(/\d+\.\d+/)[0];
                var hiddenTicketTypePrice = $('<input type="hidden" name="ticket_type_price" value="' + numericPrice + '">');
                cardBody.append(hiddenTicketType, hiddenTicketTypePrice);

                var colTicketType = $('<div class="col-md-5 ticket-type">').text(ticketType);
                var colPrice = $('<div class="col-md-6 col-6 price font-weight-600">').html('<span class="price-text">' + priceText + '</span>');

                var selectName = 'ticket_qty_' + ticketType.replace(/\s+/g, '_').toLowerCase();
                var colQuantity = $('<div class="col-md-6 col-6">').append(
                    $('<select class="form-control default-select2" name="' + selectName + '">').append(
                        // Generate options for quantity starting from zero
                        Array.from({ length: 11 }, (_, i) => '<option value="' + i + '">' + i + '</option>')
                    )
                );

                row.append(colPrice, colQuantity);
                cardBody.append(row);
                cardColBody.append(cardBody);
                carRow.append(cardColImg, cardColBody);
                card.append(carRow);
                return card;
            }

            // Call the function for each card
            var elfMusicCard = createCard('ELF MUSIC PACK', 'ELF MUSIC PACK', pricing('RM85.00', 'RM99.00') + ' / [Normal]', '', '{{ asset('assets/images/ticket_concert.jpg') }}');
            var adultTicketCard = createCard('ADULT TICKET', 'ADULT TICKET', 'RM20.00 / 2 Days', '', '{{ asset('assets/images/ticket_adult.jpg') }}');
            var kidsTicketCard = createCard('KIDS TICKET', 'KIDS TICKET', 'RM5.00 / 2 Days', '', '{{ asset('assets/images/ticket_kids.jpg') }}');
            var choii64Card = createCard('CHOII 64 LIMITED EDITION PACK', 'CHOII 64 LIMITED EDITION PACK', 'RM259.00 / Pack', '', '{{ asset('assets/images/ticket_super_vvip.jpg') }}');
            var choiiLimitedCard = createCard('CHOII LIMITED EDITION PACK', 'CHOII LIMITED EDITION PACK', 'RM189.00 / Pack', '', '{{ asset('assets/images/ticket_super_special.jpg') }}');

            // Append the generated cards to the container (assuming there is a container with id "card-container")
            $('#card-container').append(elfMusicCard, choiiLimitedCard, choii64Card, adultTicketCard, kidsTicketCard);

            // Append the "Buy Ticket Now" section outside the card
            var buyTicketButton = $('<input class="btn btn-indigo btn-lg w-300px" type="button" value="Buy Ticket Now">');
            $('#card-container').append('<div class="mb-0 text-center">');
            $('#card-container div.mb-0.text-center').append(buyTicketButton);

            buyTicketButton.on('click', function () {
                // Array to store ticket details
                var ticketDetailsArray = [];

                // Loop through each card to gather ticket details
                $('.card').each(function() {
                    var card = $(this);
                    var ticketType = card.find('input[name="ticket_type"]').val();
                    var ticketTypePrice = card.find('input[name="ticket_type_price"]').val();
                    var ticketQuantity = card.find('select').val();

                    // Store the ticket details in the array
                    ticketDetailsArray.push(storeTicketDetails(ticketType, ticketTypePrice, ticketQuantity));
                });

                var postData = {
                    _token: '{{ csrf_token() }}',
                    tickets: ticketDetailsArray
                };

                // Make the AJAX post request
                $.ajax({
                    type: 'POST',
                    url: '{{ route('participant.post') }}', // Replace with your actual backend endpoint
                    data: postData,
                    success: function (response) {
                        // Handle success response
                        console.log('Order submitted successfully');
                        if (response.status === true) {
                            window.location.href = response.redirect;
                        }
                    },
                    error: function (error) {
                        // Handle error response
                        console.error('Error submitting order:', error);
                    }
                });
            });


            // Initialize Select2 plugin for all select elements
            $('select').select2();
        });
    </script>
@endpush
