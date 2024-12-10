<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afiliados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Afiliados</h1>

        <!-- Botão para criar novo afiliado -->
        <div class="mb-3">
            <a href="{{ route('affiliates.create') }}" class="btn btn-primary">Criar Novo Afiliado</a>
        </div>

        <!-- Lista de Afiliados -->
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Optional Bootstrap JS (for confirmation dialogs) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>




