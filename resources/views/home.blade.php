<!-- resources/views/home.blade.php -->
@extends('layouts.app') <!-- Estende o layout base -->

@section('title', 'Dashboard - Home') <!-- Definindo o título da página -->

@section('content') <!-- Definindo o conteúdo específico da página -->

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Bem-vindo ao Painel de Controle</h1>

        <div class="grid grid-cols-3 gap-4 mt-4 text-black text-center">
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl">Afiliados</h2>
                <p>{{ $totalAffiliates }}</p>
            </div>
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl">Comissões</h2>
                <p>{{ $totalCommissions }}</p>
            </div>
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl">Usuários</h2>
                <p>{{ $totalUsers }}</p>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="text-lg border-b border-b-slate-600 mb-4 text-center">Ações rápidas:</h3>
            <ul>
                <li><a href="{{ route('affiliates.index') }}" class="btn w-full mb-2 bg-slate-400 hover:bg-slate-100 text-black">Ver Afiliados</a></li>
                <li><a href="{{ route('users.index') }}" class="btn w-full bg-slate-400 hover:bg-slate-100 text-black">Gerenciar Usuários</a></li>
            </ul>
        </div>
    </div>

@endsection
