<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * @return View
    */
    public function showRegister()
    {
        return view('registration.register_form');
    }
}
