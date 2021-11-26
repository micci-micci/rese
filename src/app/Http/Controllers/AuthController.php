<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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
        $credentials = $request->only('email', 'passowrd');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('home')
                ->with('login_success', 'ログイン成功しました。');
        }

        return back()->withErrors([
            'login_email' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }
}
