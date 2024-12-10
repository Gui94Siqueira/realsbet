<!-- resources/views/affiliate_commissions/show.blade.php -->

<h1>Comissões de {{ $affiliate->name }}</h1>

@foreach($commissions as $commission)
    <div>
        <p>Valor: {{ $commission->value }}</p>
        <p>Data: {{ $commission->date }}</p>
        <p>Observações: {{ $commission->observations }}</p>
        <a href="{{ route('affiliate_commissions.destroy', $commission->id) }}">Excluir Comissão</a>
    </div>
@endforeach
