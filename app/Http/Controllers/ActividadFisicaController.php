<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActividadFisica;

class ActividadFisicaController extends Controller
{
    public function index()
    {
        $actividades = ActividadFisica::where('user_id', auth()->id())
            ->orderBy('fecha', 'desc')
            ->get();

        $totalActividades = $actividades->count();

        $minutosTotales = $actividades->sum('duracion');

        $actividadesEstaSemana = ActividadFisica::where('user_id', auth()->id())
            ->whereBetween('fecha', [now()->startOfWeek(), now()->endOfWeek()])
            ->count();

        $minutosEstaSemana = ActividadFisica::where('user_id', auth()->id())
            ->whereBetween('fecha', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('duracion');

        return view('actividades.index', compact(
            'actividades',
            'totalActividades',
            'minutosTotales',
            'actividadesEstaSemana',
            'minutosEstaSemana'
        ));
    }

    public function create()
    {
        return view('actividades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'duracion' => 'required|integer|min:1',
            'fecha' => 'required|date'
        ]);

        ActividadFisica::create([
            'tipo' => $request->tipo,
            'duracion' => $request->duracion,
            'fecha' => $request->fecha,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad registrada correctamente.');
    }

    public function edit($id)
    {
        $actividad = ActividadFisica::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('actividades.edit', compact('actividad'));
    }

    public function update(Request $request, $id)
    {
        $actividad = ActividadFisica::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'tipo' => 'required|string',
            'duracion' => 'required|integer|min:1',
            'fecha' => 'required|date'
        ]);

        $actividad->update([
            'tipo' => $request->tipo,
            'duracion' => $request->duracion,
            'fecha' => $request->fecha
        ]);

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad actualizada correctamente.');
    }

    public function destroy($id)
    {
        $actividad = ActividadFisica::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $actividad->delete();

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad eliminada correctamente.');
    }
}
