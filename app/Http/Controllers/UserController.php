<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Método para listar todos os usuários
    public function index()
    {
        $users = User::all();  // Recupera todos os usuários do banco de dados
        return view('users.index', compact('users'));  // Passa os usuários para a view 'users.index'
    }

    // Método para exibir o formulário de criação de um usuário
    public function create()
    {
        return view('users.create');
    }

    // Método para salvar um novo usuário no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Criação do usuário no banco de dados
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Redirecionar para a lista de usuários após a criação
        return redirect()->route('users.index');
    }

    // Método para exibir um usuário específico com base no ID
    public function show($id)
    {
        $user = User::findOrFail($id);  // Recupera o usuário com o ID fornecido
        return view('users.show', compact('user'));  // Passa o usuário para a view 'users.show'
    }

    // Método para exibir o formulário de edição de um usuário
    public function edit($id)
    {
        $user = User::findOrFail($id);  // Recupera o usuário com o ID fornecido
        return view('users.edit', compact('user'));  // Passa o usuário para a view 'users.edit'
    }

    // Método para atualizar os dados de um usuário
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id . '|max:255',  // Garantir que o email seja único, mas ignore o usuário atual
            'password' => 'nullable|string|min:8|confirmed',  // A senha pode ser nula se não for alterada
        ]);

        // Recupera o usuário a ser atualizado
        $user = User::findOrFail($id);

        // Atualiza os dados do usuário
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,  // Só altera a senha se fornecida
        ]);

        // Redirecionar para a lista de usuários após a atualização
        return redirect()->route('users.index');
    }

    // Método para excluir um usuário
    public function destroy($id)
    {
        // Recupera o usuário a ser excluído
        $user = User::findOrFail($id);

        // Exclui o usuário
        $user->delete();

        // Redireciona de volta para a lista de usuários
        return redirect()->route('users.index');
    }
}

