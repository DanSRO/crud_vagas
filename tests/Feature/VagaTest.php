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
        ]);
    }

    public function test_vaga_creation()
    {
        $vagaData = [
            'titulo' => 'Nova Vaga',
            'descricao' => 'Descrição da nova vaga',
            'tipo' => 'CLT',
            'ativa' => true,
        ];

        $vaga = Vaga::create($vagaData);

        $this->assertEquals($vagaData['titulo'], $vaga->titulo);
        $this->assertEquals($vagaData['descricao'], $vaga->descricao);        
    }
}