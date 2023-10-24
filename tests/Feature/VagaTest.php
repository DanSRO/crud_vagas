<?php

use App\Models\Vaga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VagaTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_vaga()
    {
        $vaga = Vaga::factory()->create();

        $this->assertDatabaseHas('vagas', [
            'id' => $vaga->id,
        ]);
    }

    public function testTituloIsRequired()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        Vaga::create([
            'descricao' => 'Teste de descrição',
            'tipo' => 'CLT',
            'ativa' => true,
            'titulo' => 'Qualquer'
        ]);
    }

    public function test_vaga_creation()
    {
        $response = $this->post(route('vagas.store'), [
            'descricao' => 'Teste de descrição',
            'tipo' => 'CLT',
            'ativa' => true,
            'titulo' => 'Um titulo'
        ]);
    
        $response->assertRedirect(route('vagas.index'));
        $this->assertDatabaseCount('vagas', 1);               
    }
}