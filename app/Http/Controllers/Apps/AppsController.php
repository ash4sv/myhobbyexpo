<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    public function login()
    {
        return view('apps.login');
    }

    public function dashboard()
    {
        return view('apps.index');
    }
}
