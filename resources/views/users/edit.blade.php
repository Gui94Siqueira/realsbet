@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
        <h1 class="mb-4 text-2xl font-semibold">Editar Usuário</h1>

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="password">Nova Senha</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password_confirmation">Confirmar Nova Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="w-full bg-green-700 hover:bg-green-600 py-2 mt-4 rounded-lg">Salvar Alterações</button>
        </form>

@endsection

