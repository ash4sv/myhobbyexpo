@extends('front.layout.master')

@section('page-title', 'VENDOR ADD ON CART')

@section('reg-form')

    <div id="" class="dynamic-section">
        <div class="row justify-content-center g-4 pb-5">
            <div id="cart-body" class="col-md-9">

                <div class="card mb-4 shadow-lg rounded">
                    <div class="card-body">
                        <h4 class="card-title">Add on Carts ({{ $invoice }})</h4>
                        <input type="hidden" name="invoice_number" value="{{ $invoice }}">
                        <hr class="my-10px">
                        <table class="table table-striped align-middle" id="add_on_tableCart">
                            <thead>
                            <tr>
                                <th class="text-start">Item Disruption</th>
                                <th class="w-100px text-center">Price</th>
                                <th class="w-100px text-center">Quantity</th>
                                <th class="w-100px text-end">Total</th>
                                <th class="w-100px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $key => $item)
                            <tr data-item-key="{{ $item['key'] }}">
                                <td class="text-start">
                                    {{ $item['name'] }}
                                    <input type="hidden" name="itemKey" value="{{ $item['key'] }}">
                                    <input type="hidden" name="itemName" value="{{ $item['name'] }}">
                                </td>
                                <td class="text-center">
                                    RM {{ number_format($item['price'], 2) }}
                                    <input type="hidden" name="unitPrice" value="{{ number_format($item['price'], 2) }}">
                                </td>
                                <td class="text-center">
                                    <input type="number" name="quantity" id="quantity_{{ $item['key'] }}" value="{{ $item['quantity'] }}" class="form-control text-center my-n1 quantity-input">
                                </td>
                                <td class="text-end">
                                    RM {{ number_format($item['total_price'], 2) }}
                                    <input type="hidden" name="price" value="{{ number_format($item['total_price'], 2) }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-white my-n1" onclick="updateQuantity('{{ $item['key'] }}')"><i class="fas fa-sync"></i></button>
                                    <button class="btn btn-sm btn-white my-n1" onclick="removeCartItem('{{ $item['key'] }}')"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3" class="text-end py-3">
                                    <p class="mb-0 font-weight-400">Total Amount</p>
                                    <h1 class="mb-0 font-weight-700">RM {{ number_format(array_sum(array_column($cartItems, 'total_price')), 2) }}</h1>
                                    <input type="hidden" name="total_add_on" value="{{ number_format(array_sum(array_column($cartItems, 'total_price')), 2) }}">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="mb-0">
                            <p class="mb-0 text-center">By clicking <strong>"Confirm & Checkout"</strong>, I hereby agree and consent to the <a target="_blank" href="#">Terms &amp; Conditions</a> of the event.</p>
                        </div>
                    </div>
                </div>

                <div class="mb-0 text-center">
                    <button class="btn btn-indigo btn-lg w-300px" onclick="confirmAndCheckout()">
                        Confirm & Checkout
                    </button>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('reg-script')
    <script>
        function removeCartItem(itemKey) {
            $.ajax({
                url: '{{ route("front.removeCartItem") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    itemKey: itemKey
                },
                success: function (response) {
                    // Assuming 'add_on_tableCart' is the ID of your table
                    $('#add_on_tableCart').load(location.href + ' #add_on_tableCart');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function updateQuantity(itemKey) {
            var newQuantity = $('#add_on_tableCart').find('tr[data-item-key="' + itemKey + '"] input.quantity-input').val();

            $.ajax({
                url: '{{ route('front.updateCartItem') }}', // Replace with the actual route
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    itemKey: itemKey,
                    newQuantity: newQuantity,
                },
                success: function (response) {
                    if (response.status) {
                        // Update the total in the table
                        $('#total_' + itemKey).text('RM ' + response.newTotal.toFixed(2));

                        // Refresh the table display
                        // Assuming 'add_on_tableCart' is the ID of your table
                        $('#add_on_tableCart').load(location.href + ' #add_on_tableCart');
                    } else {
                        // Handle error
                        console.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });
        }

        function confirmAndCheckout() {
            var cartData = {
                _token: '{{ csrf_token() }}',
                items: []
            };

            $('#add_on_tableCart tbody tr').each(function () {
                var itemKey = $(this).data('item-key');
                var itemName = $('input[name="itemName"]', this).val();
                var unitPrice = $('input[name="unitPrice"]', this).val();
                var quantity = $('#quantity_' + itemKey).val();
                var price = $('input[name="price"]', this).val();

                cartData.items.push({
                    key: itemKey,
                    name: itemName,
                    unit: unitPrice,
                    quantity: quantity,
                    price: price
                });
            });

            cartData.invoice = $('input[name="invoice_number"]').val();
            cartData.total = '{{ number_format(array_sum(array_column($cartItems, 'total_price')), 2) }}';

            $.ajax({
                url: '{{ route("front.proceedCart") }}',
                type: 'POST',
                data: cartData,
                success: function (response) {
                    // Handle the response as needed
                    window.location.href = response.redirect;
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    </script>
@endpush
