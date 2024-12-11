@extends('layout.app')

@section('title', 'lista de afiliados')

@section('content')
    <div class="container mt-5">
        <h1>Lista de Afiliados</h1>


        <div class="mb-3">
            <a href="{{ route('affiliates.create') }}" class="btn btn-primary">Criar Novo Afiliado</a>
        </div>

        <div class="list-group">
            @foreach($affiliates as $affiliate)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $affiliate->name }}</strong><br>
                        <small>{{ $affiliate->email }}</small>
                    </div>
                    <div>
                        <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="{{ route('affiliates.destroy', $affiliate->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja inativar este afiliado?')">Inativar</a>

                        <a href="{{ route('affiliate_commissions.create', $affiliate->id) }}" class="btn btn-success btn-sm">Adicionar Comissão</a>

                        <a href="{{ route('affiliate_commissions.show', $affiliate->id) }}" class="btn btn-info btn-sm">Visualizar Comissões</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
