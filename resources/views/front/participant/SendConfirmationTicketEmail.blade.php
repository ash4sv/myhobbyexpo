<x-mail::message>
# Confirmation of MHX 2023 Ticket Purchase

Dear {{ json_decode($visitors->visitor)->full_name }},

Thank you for choosing MHX 2023! We are excited to confirm your ticket purchase for the upcoming event. Below are the details of your transaction. Kindly refer to the attached receipt for your reference.

Transaction Details:

Event: MHX 2023
Total Amount: RM {{ number_format($carts->overallTotal, 2) }}
Ticket and Quantity:
@foreach(json_decode($carts->cart) as $key => $item) {{ $item->ticketType }} : {{ $item->ticketQuantity }} @if (!$loop->last), @endif @endforeach

We appreciate your support and look forward to welcoming you to MHX 2023.

Best regards,

MHX2023 Secretariat
Sales Team <br>
</x-mail::message>
