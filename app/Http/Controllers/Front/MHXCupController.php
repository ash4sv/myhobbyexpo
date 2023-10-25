<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MHXCupController extends Controller
{
    protected string $view = 'front.mhxcup.';

    public function welcome()
    {
        return view($this->view.'welcome');
    }
    public function register()
    {
        return view($this->view.'register');
    }
    public function categoryPost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category' => 'required',
        ]);
        $category = $request->input('category');
        $request->session()->put('category', $category);
        return response()->json(['message' => 'Category submitted successfully', 'redirect' => route('mhxcup.registerFrom')]);
    }

    public function registerFrom()
    {

        return view($this->view.'racer-register');
    }
    public function registerPost(Request $request)
    {

    }
}
