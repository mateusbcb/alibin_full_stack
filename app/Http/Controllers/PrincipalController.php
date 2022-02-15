<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PrincipalController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function autorizate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/')->with('success', 'Login realizado com sucesso!');
        }
    
        return back()->withErrors([
            'email' => 'Usuário ou senha inválido.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('principal.index');
    }

    public function registerShow()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate(['email' => 'exists:users,email'], ['email.exists' => 'E-mail já cadastrado!']);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->intended('/');
    }
}
