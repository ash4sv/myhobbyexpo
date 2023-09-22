<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apps\PreRegistration;
use App\Models\Apps\TypeOfInterest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function preRegister()
    {
        return view('front.pre-register');
    }

    public function preRegSubmit(Request $request)
    {
        return $request;

        $validatedData = $request->validate([
            'name_company' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_no' => 'required|string',
            'email' => 'required|email',
            'selection_in' => 'required|in:1,2,3',
        ]);

        /*$preRegistration = new PreRegistration($validatedData);
        $preRegistration->save();

        return redirect()->back()->with('success', 'Pre-registration successful!');*/
    }

    public function register()
    {
        $exhibits = TypeOfInterest::all();
        return view('front.interest', [
            'exhibits' => $exhibits
        ]);
    }

    public function typeOfInterest(Request $request)
    {
        $type = TypeOfInterest::where('slug', $request->key)->firstOrFail();
        return view('front.booth', [
            'type' => $type
        ]);
    }

}
