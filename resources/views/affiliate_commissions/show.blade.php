@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h2>Comissões para Afiliado: {{ $affiliate->name }}</h2>

    <table class="w-full mt-8 ">
        <thead class="text-center">
            <tr>
                <th>Valor</th>
                <th>Data</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($commissions as $commission)
                <tr class="">
                    <td>{{ $commission->value }}</td>
                    <td>{{ $commission->date }}</td>
                    <td>
                        <form action="{{ route('affiliate_commissions.destroy', $commission->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('affiliate_commissions.create', $affiliate->id) }}" class="flex justify-center bg-green-700 hover:bg-green-600 py-2 mt-4 rounded-lg">Adicionar</a>
    </div>
</div>
@endsection
