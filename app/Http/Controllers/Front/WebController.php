<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    private $view = 'web.';

    public function welcome()
    {
        return view($this->view.'welcome');
    }
}
