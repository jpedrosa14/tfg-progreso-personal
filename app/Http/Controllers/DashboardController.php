<?php

namespace App\Http\Controllers;

use App\Models\Habito;
use App\Models\Lectura;
use App\Models\RegistroHabito;
use App\Models\ActividadFisica;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $inicioSemana = now()->startOfWeek();
        $finSemana = now()->endOfWeek();

        $habitosHoy = Habito::where('user_id', $user->id)->count();

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

        $lecturasActuales = Lectura::where('user_id', $user->id)
            ->where('estado', 'leyendo')
            ->count();

        $totalHabitos = Habito::where('user_id', $user->id)->count();

        return view('dashboard', compact(
            'habitosHoy',
            'habitosCompletadosHoy',
            'minutosSemana',
            'sesionesSemana',
            'lecturasMes',
            'lecturasActuales',
            'totalHabitos'
        ));
    }
}
