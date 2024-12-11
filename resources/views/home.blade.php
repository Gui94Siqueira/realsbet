<!-- resources/views/home.blade.php -->
@extends('layouts.app') <!-- Estende o layout base -->

@section('title', 'Dashboard - Home') <!-- Definindo o título da página -->

@section('content') <!-- Definindo o conteúdo específico da página -->

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Bem-vindo ao Painel de Controle</h1>

        <div class="grid grid-cols-3 gap-4 mt-4">
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
            <h3 class="text-lg">Ações rápidas:</h3>
            <ul>
                <li><a href="{{ route('affiliates.index') }}">Ver Afiliados</a></li>
                <li><a href="{{ route('affiliate_commissions.index') }}">Ver Comissões</a></li>
                <li><a href="{{ route('users.index') }}">Gerenciar Usuários</a></li>
            </ul>
        </div>
    </div>

@endsection
