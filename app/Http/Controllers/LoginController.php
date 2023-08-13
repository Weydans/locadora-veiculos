<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('Usuário e ou senha inválidos');
        }

        return redirect()->route('reserves.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
