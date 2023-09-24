<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class WebController extends Controller
{
    private $view = 'web.';

    public function welcome()
    {
        return view($this->view.'welcome');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'contact_name' => 'required|string',
            'contact_phone' => 'required|string',
            'contact_email' => 'required|email',
            'contact_message' => 'required|string',
        ]);

        // Get data from the form
        $name = $request->input('contact_name');
        $phone = $request->input('contact_phone');
        $email = $request->input('contact_email');
        $message = $request->input('contact_message');

        // Compose the email
        $mailData = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
        ];

        // Send the email using Postmark API
        Mail::send('web.emails.contact', ['mailData' => $mailData], function ($message) use ($mailData) {
            $message->to('myhobbyexpo@gmail.com'); // Replace with the recipient's email address
            $message->subject('New Contact Form Submission');
        });

        Alert::success('Thank you for enquiry', 'Our team will return contact you back.');
        return redirect()->back();
    }
}
