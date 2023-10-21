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
}