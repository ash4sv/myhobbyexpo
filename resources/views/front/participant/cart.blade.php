@extends('front.layout.master')

@section('page-title', 'PARTICIPANT CART')

@section('reg-form')

    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto mb-4 text-center">
            <h4 class="text-white font-weight-700">Confirm Your Selection</h4>
            <p class="mb-0 text-white">Please check your selection and click 'Confirm & Checkout' when ready</p>
        </div>
    </div>

    <div class="row">
        <div id="cart-container" class="col-md-10 col-lg-8 mx-auto">
            <div class="card mb-4" id="data-cart">
                <h5 class="card-header py-2">&nbsp;</h5>
                <div class="card-body">

                    @foreach($cartItems as $item)
                        <div class="row align-items-center">
                            <div class="col-md-4 col-12 text-sm-start text-center">
                                <h5 class="font-weight-700 mb-0 py-2">{{ $item['ticketType'] }}</h5>
                            </div>
                            <div class="col-md-2 col-4 text-center">
                                <h5 class="mb-0 py-2">RM{{ $item['ticketTypePrice'] }}</h5>
                            </div>
                            <div class="col-md-2 col-4">
                                <input class="form-control text-center quantity-input" type="number" name="quantity" value="{{ $item['ticketQuantity'] }}" data-ticket-type="{{ $item['ticketType'] }}">
                                {{--<input class="form-control text-center" type="number" name="" id="" value="{{ $item['ticketQuantity'] }}">--}}
                            </div>
                            <div class="col-md-2 col-4 text-center">
                                <!-- Display the total for each item -->
                                <h5 class="mb-0 py-2">RM{{ number_format($item['total'], 2) }}</h5>
                            </div>
                            <div class="col-md-2 text-sm-end text-center">
                                <button class="btn btn-white border-secondary bg-white btn-md mt-3 mt-sm-0 update-quantity-btn" data-ticket-type="{{ $item['ticketType'] }}">
                                    <i class="fas fa-sync"></i>
                                </button>
                                <button class="btn btn-white border-secondary bg-white btn-md mt-3 mt-sm-0" onclick="removeCartItem('{{ $item['ticketType'] }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="row">
                        <div class="col-md-6 ms-auto text-end">
                            <p class="mb-0">Total Amount</p>
                            <!-- Display the overall total -->
                            <h1 class="font-weight-700 mb-0">MYR{{ number_format($overallTotal, 2) }}</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="mb-0 text-center">
            <input class="btn btn-indigo btn-lg w-300px" type="button" value="Confirm & Checkout">
        </div>
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

        // Attach an event listener to the update button
        $('.update-quantity-btn').on('click', function() {
            var ticketType = $(this).data('ticket-type');
            var newQuantity = 1; // Set the new quantity as needed

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
        });

    </script>
@endpush
