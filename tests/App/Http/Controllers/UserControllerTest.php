<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testa se a página de listagem de usuários está acessível
     *
     * @return void
     */
    public function test_index_users_page_is_accessible()
    {
        // Cria alguns usuários no banco de dados
        User::factory()->count(3)->create();

        // Acessa a página de listagem
        $response = $this->get(route('users.index'));

        // Verifica se a resposta foi bem-sucedida (código HTTP 200)
        $response->assertStatus(200);

        // Verifica se os usuários estão presentes na página
        $response->assertViewHas('users');
    }

    /**
     * Testa se a página de criação de um usuário está acessível
     *
     * @return void
     */
    public function test_create_user_page_is_accessible()
    {
        $response = $this->get(route('users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('users.create');
    }

    /**
     * Testa se a criação de um novo usuário funciona corretamente
     *
     * @return void
     */
    public function test_store_new_user()
    {
        // Dados do usuário para criação
        $userData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // Envia uma requisição POST para criar o usuário
        $response = $this->post(route('users.store'), $userData);

        // Verifica se o usuário foi redirecionado para a lista de usuários
        $response->assertRedirect(route('users.index'));

        // Verifica se o usuário foi criado no banco de dados
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
        ]);
    }


    /**
     * Testa se a página de edição de um usuário está acessível
     *
     * @return void
     */
    public function test_edit_user_page_is_accessible()
    {
        // Cria um usuário no banco de dados
        $user = User::factory()->create();

        // Envia uma requisição para editar o usuário
        $response = $this->get(route('users.edit', $user->id));

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user');
    }

    /**
     * Testa se a atualização de um usuário funciona corretamente
     *
     * @return void
     */
    public function test_update_user()
    {
        // Cria um usuário no banco de dados
        $user = User::factory()->create();

        // Dados atualizados para o usuário
        $updatedData = [
            'name' => 'John Updated',
            'email' => 'john.updated@example.com',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ];

        // Envia uma requisição PUT para atualizar o usuário
        $response = $this->put(route('users.update', $user->id), $updatedData);

        // Verifica se o usuário foi redirecionado para a lista de usuários
        $response->assertRedirect(route('users.index'));

        // Verifica se os dados do usuário foram atualizados no banco de dados
        $this->assertDatabaseHas('users', [
            'name' => 'John Updated',
            'email' => 'john.updated@example.com',
        ]);
    }

    /**
     * Testa se a exclusão de um usuário funciona corretamente
     *
     * @return void
     */
    public function test_destroy_user()
    {
        // Cria um usuário no banco de dados
        $user = User::factory()->create();

        // Envia uma requisição DELETE para excluir o usuário
        $response = $this->delete(route('users.destroy', $user->id));

        // Verifica se o usuário foi redirecionado para a lista de usuários
        $response->assertRedirect(route('users.index'));

        // Verifica se o usuário foi excluído do banco de dados
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }
}
