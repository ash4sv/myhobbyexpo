<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\PreRegistration;
use Illuminate\Http\Request;

class AppsController extends Controller
{
    private string $view = 'apps.preregister.';

    public function login()
    {
        return view('apps.login');
    }

    public function dashboard()
    {
        return view('apps.index');
    }

    public function sellingVendor()
    {
        $selling_vendor = PreRegistration::Where('selection_in', '=', 1)->get();
        return view($this->view.'index', [
            'registers' => $selling_vendor,
        ]);
    }
    public function hobbyActivity()
    {
        $hobby_activity = PreRegistration::Where('selection_in', '=', 2)->get();
        return view($this->view.'index', [
            'registers' => $hobby_activity,
        ]);
    }
    public function hobbyShowoff()
    {
        $hobby_showoff = PreRegistration::Where('selection_in', '=', 3)->get();
        return view($this->view.'index', [
            'registers' => $hobby_showoff,
        ]);
    }
}
