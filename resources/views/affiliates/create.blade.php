<!-- resources/views/affiliates/create.blade.php -->

<form method="POST" action="{{ route('affiliates.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="text" name="cpf" placeholder="CPF" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Telefone" required>
    <input type="text" name="address" placeholder="Endereço" required>
    <input type="text" name="city" placeholder="Cidade" required>
    <input type="text" name="state" placeholder="Estado" required>
    <button type="submit">Cadastrar Afiliado</button>
</form>
