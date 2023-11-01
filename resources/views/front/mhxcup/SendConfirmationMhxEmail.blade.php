<x-mail::message>

#CONFIRMATION OF REGISTRATION MINI 4WD MXH CUP 2023

Dear {{ $full_name }},

Thank you for registering for the MINI 4WD MHX CUP 2023 racer event. We are excited to have you join us for this thrilling competition!

You have registered for the <span style="text-transform: capitalize;">{{ $category }}</span>. Below are your registration details.

Ref: {{ $uniq }}
Full Name: {{ $full_name }}
Identification Card Number: {{ $identification_card_number }}
Group: {{ $group }}
Email: {{ $email }}
Phone Number: {{ $phone_number }}
Category: {{ $category }}
Registration slot: {{ $registration }}
Nickname: {{ $nickname }}
Race ID: @foreach($runNum as $number){{ $nickname }}{{ $number->register }} @if (!$loop->last), @endif @endforeach


Please find attached a confirmation document containing all the necessary details for your participation. It includes the event schedule, rules and regulations, and other important information. We kindly request that you review the document carefully.

We look forward to seeing you at the Mini 4WD MHX 2023 racer event and wish you the best of luck!

Best regards,

Thanks,

MINI 4WD MHX CUP 2023 ORGANIZER

</x-mail::message>
