<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Apps\PreRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AppsController extends Controller
{
    private string $view = 'apps.preregister.';

    public function login()
    {
        return view('apps.login');
    }

    public function dashboard()
    {
        $dailyCounts = PreRegistration::selectRaw('DATE(created_at) as date, COUNT(*) as count')->groupBy('date')->get();

        $selling_vendor = PreRegistration::Where('selection_in', '=', 1)->get();
        $hobby_activity = PreRegistration::Where('selection_in', '=', 2)->get();
        $hobby_showoff = PreRegistration::Where('selection_in', '=', 3)->get();
        $sponsors = PreRegistration::Where('become_sponsors', '=', 1)->get();
        return view('apps.index', [
            'selling_vendor' => $selling_vendor,
            'hobby_activity' => $hobby_activity,
            'hobby_showoff'  => $hobby_showoff,
            'sponsors'       => $sponsors,
            'dailyCounts'    => $dailyCounts
        ]);
    }

    public function sellingVendor()
    {
        $selling_vendor = PreRegistration::Where('selection_in', '=', 1)->get();

        $title = 'Delete Registered!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'registers' => $selling_vendor,
            'title' => 'Selling Vendor',
        ]);
    }
    public function hobbyActivity()
    {
        $hobby_activity = PreRegistration::Where('selection_in', '=', 2)->get();

        $title = 'Delete Registered!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'registers' => $hobby_activity,
            'title' => 'Hobby Activity',
        ]);
    }
    public function hobbyShowoff()
    {
        $hobby_showoff = PreRegistration::Where('selection_in', '=', 3)->get();

        $title = 'Delete Registered!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view($this->view.'index', [
            'registers' => $hobby_showoff,
            'title' => 'Hobby Show-off',
        ]);
    }

    public function routeList()
    {
        return view('apps.route.index', [
            'routes' => Route::getRoutes()
        ]);
    }
}
