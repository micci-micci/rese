<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * @return View
    */
    public function showLogin()
    {
        return view('login.index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($request->all());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('restaurants.index')
                ->with('success', 'ログイン成功しました。');
        }

        return back()->with('danger', 'ログイン失敗しました');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.show')
            ->with('danger', 'ログアウトしました。');
    }

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
