@extends('layouts.app')

@section('title', 'Lista de Afiliados')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-2xl font-semibold">Lista de Afiliados</h1>

        <div class="mb-3">
            <a href="{{ route('affiliates.create') }}" class="btn btn-primary">Criar Novo Afiliado</a>
        </div>

        <div class="row">
            @foreach($affiliates as $affiliate)
                <div class="col-md-4 mb-4 text-black">
                    <div class="card">
                        <div class="card-header d-flex justify-center">
                            <h5 class="card-title">{{ $affiliate->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> {{ $affiliate->email }}</p>
                            <p><strong>Telefone:</strong> {{ $affiliate->phone }}</p>
                            <p><strong>Endereço:</strong> {{ $affiliate->address }}</p>
                            <p><strong>Estado:</strong> {{ $affiliate->state }}</p>
                            <p><strong>Cidade:</strong> {{ $affiliate->city }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('affiliates.destroy', $affiliate->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja inativar este afiliado?')">Inativar</a>
                            <a href="{{ route('affiliate_commissions.create', $affiliate->id) }}" class="btn btn-success btn-sm">Adicionar Comissão</a>
                            <a href="{{ route('affiliate_commissions.show', $affiliate->id) }}" class="btn btn-info btn-sm">Visualizar Comissões</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
