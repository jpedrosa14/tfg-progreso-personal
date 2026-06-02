<?php

namespace App\Http\Controllers;

use App\Models\ActividadFisica;
use App\Models\Habito;
use App\Models\Lectura;
use App\Models\RegistroHabito;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $inicioSemana = now()->startOfWeek();
        $finSemana = now()->endOfWeek();

        $habitosActivos = Habito::where('user_id', $user->id)->count();

        $habitosCompletadosHoy = RegistroHabito::whereHas('habito', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->whereDate('fecha', now()->toDateString())
            ->where('completado', 1)
            ->count();

        $minutosSemana = ActividadFisica::where('user_id', $user->id)
            ->whereBetween('fecha', [$inicioSemana, $finSemana])
            ->sum('duracion');

        $sesionesSemana = ActividadFisica::where('user_id', $user->id)
            ->whereBetween('fecha', [$inicioSemana, $finSemana])
            ->count();

        $lecturasMes = Lectura::where('user_id', $user->id)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $totalHabitos = Habito::where('user_id', $user->id)->count();

        $lecturasPendientes = Lectura::where('user_id', $user->id)
            ->where('estado', 'pendiente')
            ->count();

        $lecturasLeyendo = Lectura::where('user_id', $user->id)
            ->where('estado', 'leyendo')
            ->count();

        $lecturasLeidas = Lectura::where('user_id', $user->id)
            ->where('estado', 'leido')
            ->count();

        $ultimosHabitosCompletados = RegistroHabito::whereHas('habito', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->where('completado', 1)
            ->with('habito')
            ->orderBy('fecha', 'desc')
            ->take(5)
            ->get();

        $ultimasActividades = ActividadFisica::where('user_id', $user->id)
            ->orderBy('fecha', 'desc')
            ->take(5)
            ->get();

        $ultimasLecturas = Lectura::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Datos de hábitos últimos 7 días
        $labelsHabitos = [];
        $datosHabitos = [];

        for ($i = 6; $i >= 0; $i--) {
            $fecha = now()->copy()->subDays($i);
            $labelsHabitos[] = $fecha->format('d/m');

            $completados = RegistroHabito::whereHas('habito', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
                ->whereDate('fecha', $fecha->toDateString())
                ->where('completado', 1)
                ->count();

            $datosHabitos[] = $completados;
        }

        // Datos de actividad física últimos 7 días
        $labelsActividad = [];
        $datosActividad = [];

        for ($i = 6; $i >= 0; $i--) {
            $fecha = now()->copy()->subDays($i);
            $labelsActividad[] = $fecha->format('d/m');

            $minutos = ActividadFisica::where('user_id', $user->id)
                ->whereDate('fecha', $fecha->toDateString())
                ->sum('duracion');

            $datosActividad[] = $minutos;
        }

        return view('dashboard', compact(
            'habitosActivos',
            'habitosCompletadosHoy',
            'minutosSemana',
            'sesionesSemana',
            'lecturasMes',
            'totalHabitos',
            'labelsHabitos',
            'datosHabitos',
            'labelsActividad',
            'datosActividad',
            'lecturasPendientes',
            'lecturasLeyendo',
            'lecturasLeidas',
            'ultimosHabitosCompletados',
            'ultimasActividades',
            'ultimasLecturas',
        ));
    }
}
