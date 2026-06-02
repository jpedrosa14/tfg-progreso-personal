<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActividadFisicaTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_puede_crear_una_actividad_fisica(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('actividades.store'), [
            'tipo' => 'correr',
            'duracion' => 30,
            'fecha' => now()->toDateString(),
        ]);

        $response->assertRedirect(route('actividades.index'));

        $this->assertDatabaseHas('actividad_fisicas', [
            'tipo' => 'correr',
            'duracion' => 30,
            'fecha' => now()->toDateString(),
            'user_id' => $user->id,
        ]);
    }

    public function test_no_se_puede_crear_actividad_sin_tipo(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('actividades.store'), [
            'tipo' => '',
            'duracion' => 30,
            'fecha' => now()->toDateString(),
        ]);

        $response->assertSessionHasErrors('tipo');
    }

    public function test_usuario_autenticado_puede_actualizar_una_actividad_fisica(): void
    {
        $user = User::factory()->create();

        $actividad = \App\Models\ActividadFisica::create([
            'tipo' => 'andar',
            'duracion' => 20,
            'fecha' => now()->toDateString(),
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->put(route('actividades.update', $actividad->id), [
            'tipo' => 'bicicleta',
            'duracion' => 45,
            'fecha' => now()->toDateString(),
        ]);

        $response->assertRedirect(route('actividades.index'));

        $this->assertDatabaseHas('actividad_fisicas', [
            'id' => $actividad->id,
            'tipo' => 'bicicleta',
            'duracion' => 45,
            'user_id' => $user->id,
        ]);
    }

    public function test_usuario_autenticado_puede_eliminar_una_actividad_fisica(): void
    {
        $user = User::factory()->create();

        $actividad = \App\Models\ActividadFisica::create([
            'tipo' => 'gym',
            'duracion' => 60,
            'fecha' => now()->toDateString(),
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete(route('actividades.destroy', $actividad->id));

        $response->assertRedirect(route('actividades.index'));

        $this->assertDatabaseMissing('actividad_fisicas', [
            'id' => $actividad->id,
        ]);
    }
}
