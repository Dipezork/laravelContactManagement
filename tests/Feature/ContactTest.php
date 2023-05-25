<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /** @test */
    public function validacao_de_erros_quando_inserido_contatos_com_dados_invalidos()
    {
        $user = User::factory()->create([
            'role_id' => 2,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->post(route('contacts.store'), [
            'name' => '', // Nome para evitar erro de validação
            'contact' => '123456789', // Contato válido
            'email' => 'email@example.com', // E-mail válido
        ]);

        $response->assertSessionHasErrors('name'); // Verifica se há erro de validação para o campo 'name'
    }

    /** @test */
    public function validacao_de_erros_quando_editado_contatos_com_dados_invalidos()
    {
        $user = User::factory()->create([
            'role_id' => 2,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $contact = Contact::factory()->create([
            'name' => 'John', // Nome para evitar erro de validação
            'contact' => '123456789', // Contato para evitar erro de validação
            'email' => 'john2@hotmail.com', // Contato para evitar erro de validação
        ]);

        $response = $this->actingAs($user)->put(route('contacts.update', $contact), [
            'name' => '', // Nome em branco para forçar erro de validação
            'contact' => '1234567892', // Contato válido
            'email' => 'email@example.com', // E-mail válido
        ]);

        $response->assertSessionHasErrors('name'); // Verifica se há erro de validação para o campo 'name'
    }
}
