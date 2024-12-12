<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);


        return redirect()->route('users.index');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }
        return view('users.edit', compact('user'));
    }



    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id . '|max:255',  // Garantir que o email seja único, mas ignore o usuário atual
            'password' => 'nullable|string|min:8|confirmed',  // A senha pode ser nula se não for alterada
        ]);


        $user = User::findOrFail($id);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,  // Só altera a senha se fornecida
        ]);


        return redirect()->route('users.index');
    }


    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}

