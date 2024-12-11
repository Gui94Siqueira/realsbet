@extends('layouts.app')

@section('title', 'Adicionar comissão')

@section('content')
<div class="">
    <h1 class="text-gray-300"">Adicione comissão para o afiliado: {{ $affiliate->name }}</h1>

    <form action="{{ route('affiliate_commissions.store', $affiliate->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="value" class="text-gray-300 mt-4 mb-2">Valor da comissão: </label>
            <input type="number" class="form-control" id="value" name="value" required>
        </div>

        <div class="mb-3">
            <label for="date" class="text-gray-300 mb-2">Data:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <button type="submit" class="w-full bg-green-700 hover:bg-green-600 py-2 mt-4 rounded-lg">Salvar comissão</button>
    </form>
</div>
@endsection
