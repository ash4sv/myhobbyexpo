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
        $validatedData = $request->validate([
            'name_company' => 'required|string',
            'person_in_charge' => 'required|string',
            'contact_no' => 'required|string',
            'email' => 'required|email',
            'selection_in' => 'required|in:1,2,3',
            'bare_size' => '',
            'shell_scheme' => '',
            'basic_lot' => '',
        ]);

        $preRegistration = new PreRegistration();
        $preRegistration->name_company = $request->name_company;
        $preRegistration->person_in_charge = $request->person_in_charge;
        $preRegistration->contact_no = $request->contact_no;
        $preRegistration->email = $request->email;
        $preRegistration->selection_in = $request->selection_in;
        $preRegistration->bare_size = $bare_size = json_encode([ 'length' => $request->bare_size[0], 'width' => $request->bare_size[1] ]);;
        $preRegistration->shell_scheme = $request->shell_scheme;
        $preRegistration->basic_lot = $request->basic_lot;
        $preRegistration->save();

        return redirect()->back()->with('success', 'Pre-registration successful!');
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
