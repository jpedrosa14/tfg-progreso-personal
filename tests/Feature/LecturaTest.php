<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LecturaTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_autenticado_puede_crear_una_lectura(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('lecturas.store'), [
            'titulo' => 'Hábitos atómicos',
            'autor' => 'James Clear',
            'estado' => 'leyendo',
            'fecha_inicio' => now()->toDateString(),
            'fecha_fin' => null,
        ]);

        $response->assertRedirect(route('lecturas.index'));

        $this->assertDatabaseHas('lecturas', [
            'titulo' => 'Hábitos atómicos',
            'autor' => 'James Clear',
            'estado' => 'leyendo',
            'user_id' => $user->id,
        ]);
    }

    public function test_no_se_puede_crear_lectura_sin_titulo(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('lecturas.store'), [
            'titulo' => '',
            'autor' => 'Autor de prueba',
            'estado' => 'pendiente',
            'fecha_inicio' => null,
            'fecha_fin' => null,
        ]);

        $response->assertSessionHasErrors('titulo');
    }

    public function test_no_se_puede_crear_lectura_con_estado_invalido(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('lecturas.store'), [
            'titulo' => 'Libro de prueba',
            'autor' => 'Autor de prueba',
            'estado' => 'estado_invalido',
            'fecha_inicio' => null,
            'fecha_fin' => null,
        ]);

        $response->assertSessionHasErrors('estado');
    }

    public function test_usuario_autenticado_puede_actualizar_una_lectura(): void
    {
        $user = User::factory()->create();

        $lectura = \App\Models\Lectura::create([
            'titulo' => 'Libro inicial',
            'autor' => 'Autor inicial',
            'estado' => 'pendiente',
            'fecha_inicio' => null,
            'fecha_fin' => null,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->put(route('lecturas.update', $lectura->id), [
            'titulo' => 'Libro actualizado',
            'autor' => 'Autor actualizado',
            'estado' => 'leido',
            'fecha_inicio' => now()->subDays(5)->toDateString(),
            'fecha_fin' => now()->toDateString(),
        ]);

        $response->assertRedirect(route('lecturas.index'));

        $this->assertDatabaseHas('lecturas', [
            'id' => $lectura->id,
            'titulo' => 'Libro actualizado',
            'autor' => 'Autor actualizado',
            'estado' => 'leido',
            'user_id' => $user->id,
        ]);
    }

    public function test_usuario_autenticado_puede_eliminar_una_lectura(): void
    {
        $user = User::factory()->create();

        $lectura = \App\Models\Lectura::create([
            'titulo' => 'Libro a eliminar',
            'autor' => 'Autor de prueba',
            'estado' => 'pendiente',
            'fecha_inicio' => null,
            'fecha_fin' => null,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete(route('lecturas.destroy', $lectura->id));

        $response->assertRedirect(route('lecturas.index'));

        $this->assertDatabaseMissing('lecturas', [
            'id' => $lectura->id,
        ]);
    }
}
