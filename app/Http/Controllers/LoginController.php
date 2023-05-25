<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    protected $redirectTo = '/home';

    public function showLoginForm()
    {
        return view('login');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redirecionar para a página inicial ou área restrita
            // Autenticação bem-sucedida, redirecionar para a página inicial ou área restrita
return redirect()->route('contacts.index');

        }

        // Autenticação falhou, redirecionar de volta ao formulário de login com mensagem de erro
        return redirect()->route('login')->with('error', 'Credenciais inválidas. Por favor, tente novamente.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
