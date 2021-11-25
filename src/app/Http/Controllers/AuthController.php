<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
     * @return View
     */
    public function showLogin()
    {
        return view('login.login_form');
    }

    public function login(LoginRequest $request)
    {
        dd($request->all());
    }
}
