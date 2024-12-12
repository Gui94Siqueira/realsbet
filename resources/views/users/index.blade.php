@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
        @if($users->isEmpty())
            <p>Nenhum usuário cadastrado.</p>
        @else
            <table class="table text-slate-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Iteração sobre os usuários -->
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <!-- Links para ações, como editar e excluir -->
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                <!-- Formulário de exclusão -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('users.create') }}" class="flex justify-center bg-green-700 hover:bg-green-600 py-2 mt-4 rounded-lg">Cadastrar Novo Usuário</a>
@endsection
