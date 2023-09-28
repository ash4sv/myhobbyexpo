<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogsController extends Controller
{
    public function index()
    {
        return view('apps.logs.index', [
            'logs' => Activity::all()
        ]);
    }
}
