<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //novo usuario
    // public function create(array $data)
    // {
    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'role_id' => Role::where('name', 'default')->value('id'),
    //     ]);

    //     return $user;
    // }

    public function showRegistrationForm()
    {
        $data = [
            'name' => '',
            'email' => '',
            'role_id' => null,
        ];

        $roles = Role::all();
        return view('cadastro', compact('roles', 'data'));
    }



    public function register(Request $request)
    {
        //     $validatedData = $request->validate([
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'required|email|unique:users',
        //         'password' => 'required|min:6|confirmed',
        //     ]);

        //     $user = User::create([
        //         'first_name' => $validatedData['first_name'],
        //         'last_name' => $validatedData['last_name'],
        //         'email' => $validatedData['email'],
        //         'password' => Hash::make($validatedData['password']),
        //         'role_id' => Role::where('name', 'default')->value('id'),
        //     ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);

        //     dd($user);

        return view('login')->with('success', 'Usuário registrado com sucesso! Faça login para continuar.');
        //   return redirect()->route('login')->with('success', 'Usuário registrado com sucesso! Faça login para continuar.');
        // }

    }
}

    // public function create(array $data)
    // {
    //     $data['password'] = Hash::make($data['password']);

    //     $user = User::create($data);

    //     return $user;
    // }
