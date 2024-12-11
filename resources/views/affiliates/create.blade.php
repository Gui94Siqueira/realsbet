@extends('layouts.app')

@section('affiliate')
    <div class="container mt-5">
        <h1 class="mb-4">{{ isset($affiliate) ? 'Editar' : 'Criar' }} Afiliado</h1>

        <!-- Formulário para criação ou edição -->
        <form action="{{ isset($affiliate) ? route('affiliates.update', $affiliate->id) : route('affiliates.store') }}" method="POST">
            @csrf
            @if(isset($affiliate))
                @method('PUT')  <!-- Define que o método da requisição será PUT para edição -->
            @endif

            <!-- Nome -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ isset($affiliate) ? $affiliate->name : '' }}" required>
            </div>

            <!-- CPF -->
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{ isset($affiliate) ? $affiliate->cpf : '' }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ isset($affiliate) ? $affiliate->email : '' }}" required>
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ isset($affiliate) ? $affiliate->phone : '' }}" required>
            </div>

            <!-- Endereço -->
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ isset($affiliate) ? $affiliate->address : '' }}" required>
            </div>

            <!-- Estado e Cidade -->
            <div class="row">
                <!-- Estado -->
                <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">Estado</label>
                    <select class="form-select" id="state" name="state" required>
                        <option value="">Selecione o Estado</option>
                        <option value="SP" {{ isset($affiliate) && $affiliate->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
                        <option value="RJ" {{ isset($affiliate) && $affiliate->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                        <option value="MG" {{ isset($affiliate) && $affiliate->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                        <!-- Adicione mais estados conforme necessário -->
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Cidade</label>
                    <select class="form-select" id="city" name="city" required>
                        <option value="">Selecione a Cidade</option>
                        <!-- As cidades serão preenchidas dinamicamente com JavaScript -->
                    </select>
                </div>
            </div>

            <!-- Botão de Enviar -->
            <button type="submit" class="btn btn-primary">{{ isset($affiliate) ? 'Salvar Alterações' : 'Cadastrar Afiliado' }}</button>
        </form>

        <br>
        <a href="{{ route('affiliates.index') }}" class="btn btn-secondary">Voltar para a lista de afiliados</a>
    </div>

    <!-- Script para atualizar cidades com base no estado selecionado -->
    <script>
        // Dados fictícios de cidades por estado
        const cities = {
            SP: ["São Paulo", "Campinas", "Santos"],
            RJ: ["Rio de Janeiro", "Niterói", "Campos dos Goytacazes"],
            MG: ["Belo Horizonte", "Uberlândia", "Juiz de Fora"]
        };

        // Função para atualizar as cidades com base no estado selecionado
        $('#state').change(function() {
            const state = $(this).val();
            const citySelect = $('#city');

            citySelect.empty(); // Limpa as cidades anteriores
            citySelect.append('<option value="">Selecione a Cidade</option>'); // Opção padrão

            if (state && cities[state]) {
                // Preenche as cidades para o estado selecionado
                cities[state].forEach(function(city) {
                    citySelect.append(`<option value="${city}" ${city == '{{ $affiliate->city ?? "" }}' ? 'selected' : ''}>${city}</option>`);
                });
            }
        });

        // Preenche a lista de cidades quando a página carrega, com base no estado atual
        $(document).ready(function() {
            const state = $('#state').val();
            if (state && cities[state]) {
                cities[state].forEach(function(city) {
                    $('#city').append(`<option value="${city}" ${city == '{{ $affiliate->city ?? "" }}' ? 'selected' : ''}>${city}</option>`);
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    @endsection
