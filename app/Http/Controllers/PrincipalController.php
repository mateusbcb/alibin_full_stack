<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify;

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

            $user = User::where('email', $request->email)->first();
            
            return redirect()->intended('/')->with('success', 'Olá, '.$user->name.'!');
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
        $regras = [
            'name' => 'required',
            'email' => 'required|exists:users,email',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'email.exists' => 'E-mail já cadastrado!'
        ];

        // $request->validate($regras, $feedback);
        $user = new User();
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->save();
        
        return redirect()->intended('/');
    }
}
