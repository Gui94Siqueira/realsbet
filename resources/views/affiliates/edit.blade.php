@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
        <h1 class="mb-4 text-2xl font-semibold">Editar Afiliado</h1>

        <!-- Formulário para edição -->
        <form action="{{ route('affiliates.update', $affiliate->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $affiliate->name }}" required>
            </div>

            <!-- CPF -->
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $affiliate->cpf }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $affiliate->email }}" required>
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $affiliate->phone }}" required>
            </div>

            <!-- Endereço -->
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $affiliate->address }}" required>
            </div>

            <!-- Estado e Cidade -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">Estado</label>
                    <select class="form-select" id="state" name="state" required>
                        <option value="SP" {{ $affiliate->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
                        <option value="RJ" {{ $affiliate->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                        <option value="MG" {{ $affiliate->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Cidade</label>
                    <select class="form-select" id="city" name="city" required>
                        <option value="{{ $affiliate->city }}">{{ $affiliate->city }}</option>
                    </select>
                </div>
            </div>

            <!-- Botão de Enviar -->
            <button type="submit" class="w-full bg-green-700 hover:bg-green-600 py-2 mt-4 rounded-lg">Salvar Alterações</button>
        </form>

        <br>
        <a href="{{ route('affiliates.index') }}" class="btn w-full bg-slate-400 hover:bg-slate-100 text-black">Voltar para a lista de afiliados</a>
@endsection
