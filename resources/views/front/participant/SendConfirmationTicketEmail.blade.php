<x-mail::message>
# Confirmation of MHX 2023 Ticket Purchase

Dear {{ json_decode($visitors->visitor)->full_name }},

Thank you for choosing MHX 2023! We are excited to confirm your ticket purchase for the upcoming event. Below are the details of your transaction. Kindly refer to the attached receipt for your reference.

Transaction Details:

- Event: MHX 2023
- Ticket Type and Quantity: @foreach(json_decode($carts->cart) as $key => $item) {{ $item->ticketType }}  {{ $item->ticketQuantity }} @if (!$loop->last), @endif @endforeach
- Total Amount: {{ $carts->overallTotal }}

We appreciate your support and look forward to welcoming you to MHX 2023. If you have any further questions or need assistance, feel free to contact our customer support team at [Customer Support Email or Phone Number].

Best regards,

MHX2023 Secretariat
Sales Team <br>
</x-mail::message>
