<?php

namespace Tests\Feature;

use App\Models\Affiliate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AffiliateControllerTest extends TestCase
{
    use RefreshDatabase; // Usado para garantir que o banco de dados seja limpo após cada teste

    // Testa o cadastro de um afiliado
    public function test_store_affiliate()
    {
        // Dados do afiliado válidos
        $data = [
            'name' => 'John Doe',
            'cpf' => '12345678909',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Main Street',
            'city' => 'CityName',
            'state' => 'SP',
        ];

        // Realiza uma requisição POST para o método store
        $response = $this->post(route('affiliates.store'), $data);

        // Verifica se a resposta foi um redirecionamento para a página de afiliados
        $response->assertRedirect(route('affiliates.index'));

        // Verifica se o afiliado foi criado no banco de dados
        $this->assertDatabaseHas('affiliates', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }

    // Testa a exibição da lista de afiliados
    public function test_index_affiliates()
    {
        // Cria um afiliado no banco de dados
        Affiliate::factory()->create();

        // Realiza uma requisição GET para o método index
        $response = $this->get(route('affiliates.index'));

        // Verifica se a resposta contém a lista de afiliados
        $response->assertStatus(200);
        $response->assertViewHas('affiliates');
    }

    // Testa a exibição do formulário de criação de afiliado
    public function test_create_affiliate()
    {
        $response = $this->get(route('affiliates.create'));

        // Verifica se a resposta contém o formulário de criação
        $response->assertStatus(200);
        $response->assertViewIs('affiliates.create');
    }

    // Testa a exclusão de um afiliado
    public function test_destroy_affiliate()
    {
        $affiliate = Affiliate::factory()->create();

        // Realiza uma requisição DELETE para o método destroy
        $response = $this->delete(route('affiliates.destroy', $affiliate->id));

        // Verifica se o afiliado foi removido do banco de dados
        $this->assertDatabaseMissing('affiliates', [
            'id' => $affiliate->id,
        ]);

        // Verifica se foi feito o redirecionamento
        $response->assertRedirect(route('affiliates.index'));
    }
}
