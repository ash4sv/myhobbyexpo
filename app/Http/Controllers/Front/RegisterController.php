<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apps\TypeOfInterest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    public function register()
    {
        return view('front.register');
    }
}
