<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        Alert::success('Thank you for enquiry', 'Our team will return contact you back.');
        return redirect()->back();
    }
}
