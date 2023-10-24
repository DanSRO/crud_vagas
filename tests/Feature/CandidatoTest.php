<?php

use App\Models\Candidato;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidatoTest extends TestCase
{
    use RefreshDatabase;

    public function testAtualizarCandidato()
    {
        $candidato = Candidato::factory()->create();

        $response = $this->put(route('candidatos.update', $candidato), [
            'nome' => 'Novo Nome',
            'email' => 'novo_email@example.com',
            'experiencia' => 'Nova Experiência',
        ]);

        $response->assertRedirect(route('candidatos.index'));
        $this->assertDatabaseHas('candidatos', [
            'id' => $candidato->id,
            'nome' => 'Novo Nome',
            'email' => 'novo_email@example.com',
            'experiencia' => 'Nova Experiência',
        ]);
    }

    public function testCampoNomeIsRequired()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        Candidato::create([
            'email' => 'teste@example.com',
            'experiencia' => 'Experiência de teste',
        ]);
    }

    public function testCampoEmailIsRequired()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        Candidato::create([
            'nome' => 'Nome do Candidato',
            'experiencia' => 'Experiência de teste',
        ]);
    }

    public function testCampoExperienciaIsRequired()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        Candidato::create([
            'nome' => 'Nome do Candidato',
            'email' => 'teste@example.com',
        ]);
    }
}