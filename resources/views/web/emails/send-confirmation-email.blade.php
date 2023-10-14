<x-mail::message>

Dear {{ $vendor['company'] }},

Thank you for registering as a vendor for MHX2023 Secretariat! We are excited to have you on board. This email serves as a confirmation of your registration.

Here are the details of your registration:

- Company Name: {{ $vendor['company'] }}
- ROC/ROB/: {{ $vendor['roc_rob'] }}
- Person in Charge: {{ $vendor['pic_name'] }}
- Contact Number: {{ $vendor['phone_num'] }}
- Email: {{ $vendor['email'] }}
- Hall: {{ $section->hall->name }}
- Zone: {{ $section->name }}
- Booths @foreach($booths as $booth) {{ $booth->booth_number }}@if (!$loop->last), @endif @endforeach

Please note that the information provided during registration is preliminary and subject to verification. Our team will review your registration and contact you if any additional information or documents are required.

We appreciate your interest in participating in our event and look forward to a successful collaboration. If you have any questions or need further assistance, please don't hesitate to reach out to us.

Please find attached the PDF file as proof of payment.

Best regards,

Thanks,

MHX2023 Secretariat
Sales Team <br>

</x-mail::message>
