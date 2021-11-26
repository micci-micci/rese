<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $credentials = $request->only('email', 'password');
        // dd($request->all());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // return redirect()->route('home')
            //     ->with('login_success', 'ログイン成功しました。');
            return redirect('home')
                ->with('login_sucess', 'ログイン成功しました。');
        }

        return back()->withErrors([
            'login_error' => 'The provided credentials do not match our records.',
        ]);
    }
}
