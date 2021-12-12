<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * @return View
    */
    public function showRegister()
    {
        return view('register.index');
    }

    public function thanks(RegisterRequest $request)
    {
        User::createUser($request);

        return view('register.thanks');
    }
}
