<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistrationController extends Controller
{
    /**
     * @return View
    */
    public function showRegister()
    {
        return view('registration.register_form');
    }

    public function thanks(Request $request)
    {
        User::create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            'password'=> Hash::make($request['password']),
        ]);

        return view('registration.thanks');
    }
}
