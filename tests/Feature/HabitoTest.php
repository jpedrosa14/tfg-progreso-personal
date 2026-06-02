<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HabitoTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_puede_crear_un_habito(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('habitos.store'), [
            'nombre' => 'Leer diariamente',
            'descripcion' => 'Leer al menos 20 minutos al día',
            'frecuencia' => 'diaria',
        ]);

        $response->assertRedirect(route('habitos.index'));

        $this->assertDatabaseHas('habitos', [
            'nombre' => 'Leer diariamente',
            'descripcion' => 'Leer al menos 20 minutos al día',
            'frecuencia' => 'diaria',
            'user_id' => $user->id,
        ]);
    }

    public function test_no_se_puede_crear_un_habito_sin_nombre(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('habitos.store'), [
            'nombre' => '',
            'descripcion' => 'Descripción de prueba',
            'frecuencia' => 'diaria',
        ]);

        $response->assertSessionHasErrors('nombre');
    }

    public function test_usuario_autenticado_puede_marcar_habito_como_completado(): void
    {
        $user = User::factory()->create();

        $habito = \App\Models\Habito::create([
            'nombre' => 'Beber agua',
            'descripcion' => 'Beber dos litros de agua',
            'frecuencia' => 'diaria',
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->post(route('habitos.completar', $habito->id));

        $response->assertRedirect(route('habitos.index'));

        $this->assertDatabaseHas('registro_habitos', [
            'habito_id' => $habito->id,
            'completado' => 1,
        ]);
    }
}
