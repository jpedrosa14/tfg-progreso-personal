<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lectura;

class LecturaController extends Controller
{
    public function index()
    {
        $lecturas = Lectura::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $totalLecturas = $lecturas->count();
        $pendientes = $lecturas->where('estado', 'pendiente')->count();
        $leyendo = $lecturas->where('estado', 'leyendo')->count();
        $leidas = $lecturas->where('estado', 'leido')->count();

        return view('lecturas.index', compact(
            'lecturas',
            'totalLecturas',
            'pendientes',
            'leyendo',
            'leidas'
        ));
    }

    public function create()
    {
        return view('lecturas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'nullable|string|max:255',
            'estado' => 'required|in:pendiente,leyendo,leido',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ]);

        Lectura::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'estado' => $request->estado,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('lecturas.index')
            ->with('success', 'Lectura guardada correctamente.');
    }

    public function edit($id)
    {
        $lectura = Lectura::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('lecturas.edit', compact('lectura'));
    }

    public function update(Request $request, $id)
    {
        $lectura = Lectura::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'nullable|string|max:255',
            'estado' => 'required|in:pendiente,leyendo,leido',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ]);

        $lectura->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'estado' => $request->estado,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
        ]);

        return redirect()->route('lecturas.index')
            ->with('success', 'Lectura actualizada correctamente.');
    }

    public function destroy($id)
    {
        $lectura = Lectura::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $lectura->delete();

        return redirect()->route('lecturas.index')
            ->with('success', 'Lectura eliminada correctamente.');
    }
}
