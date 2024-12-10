<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Afiliado</title>
</head>
<body>
    <h1>Editar Afiliado</h1>

    <!-- Formulário para edição de afiliado -->
    <form action="{{ route('affiliates.update', $affiliate->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Define que o método da requisição será PUT -->

        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ $affiliate->name }}" required>
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{ $affiliate->cpf }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ $affiliate->email }}" required>
        </div>

        <div>
            <label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" value="{{ $affiliate->phone }}" required>
        </div>

        <div>
            <label for="address">Endereço:</label>
            <input type="text" name="address" id="address" value="{{ $affiliate->address }}" required>
        </div>

        <div>
            <label for="city">Cidade:</label>
            <input type="text" name="city" id="city" value="{{ $affiliate->city }}" required>
        </div>

        <div>
            <label for="state">Estado:</label>
            <input type="text" name="state" id="state" value="{{ $affiliate->state }}" required>
        </div>

        <button type="submit">Salvar Alterações</button>
    </form>

    <br>
    <a href="{{ route('affiliates.index') }}">Voltar para a lista de afiliados</a>
</body>
</html>
