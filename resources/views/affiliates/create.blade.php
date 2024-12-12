@extends('layouts.app')

@section('title', 'Crie um Afiliado')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-2xl font-semibold">Criar Afiliado</h1>

        <form action="{{ route('affiliates.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="phone" id="phone" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="address" id="address" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">Estado</label>
                    <select class="form-select" id="state" name="state" required>
                        <option value="">Selecione o Estado</option>
                        <option value="SP">São Paulo</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="MG">Minas Gerais</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Cidade</label>
                    <select class="form-select" id="city" name="city" required>
                        <option value="">Selecione a Cidade</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="w-full bg-green-700 hover:bg-green-600 py-2 mt-4 rounded-lg">Cadastrar Afiliado</button>
        </form>

        <br>
        <a href="{{ route('affiliates.index') }}" class="btn w-full bg-slate-400 hover:bg-slate-100 text-black">Voltar para a lista de afiliados</a>
    </div>
@endsection
