<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habito;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistroHabito;
use Carbon\Carbon;

class HabitoController extends Controller
{
    //
    public function index()
    {
        $habitos = \App\Models\Habito::where('user_id', auth()->id())->get();

        $registrosHoy = \App\Models\RegistroHabito::whereDate('fecha', now()->toDateString())
            ->whereHas('habito', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('completado', 1)
            ->pluck('habito_id')
            ->toArray();

        $totalHabitos = $habitos->count();
        $completadosHoy = count($registrosHoy);
        $pendientesHoy = $totalHabitos - $completadosHoy;

        return view('habitos.index', compact(
            'habitos',
            'registrosHoy',
            'totalHabitos',
            'completadosHoy',
            'pendientesHoy'
        ));
    }

	public function create()
	{
		return view('habitos.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'nombre' => 'required|string|max:255',
			'descripcion' => 'nullable|string',
			'frecuencia' => 'required|string'
		]);

		Habito::create([
			'nombre' => $request->nombre,
			'descripcion' => $request->descripcion,
			'frecuencia' => $request->frecuencia,
			'user_id' => Auth::id()
		]);

		return redirect()->route('habitos.index');
	}

    public function completar(\App\Models\Habito $habito)
    {
        if ($habito->user_id !== auth()->id()) {
            abort(403);
        }

        \App\Models\RegistroHabito::firstOrCreate(
            [
                'habito_id' => $habito->id,
                'fecha' => now()->toDateString(),
            ],
            [
                'completado' => 1,
            ]
        );

        return redirect()->route('habitos.index')
            ->with('success', 'Hábito marcado como completado hoy.');
    }

    public function edit($id)
    {
        $habito = Habito::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('habitos.edit', compact('habito'));
    }

    public function update(Request $request, $id)
    {
        $habito = Habito::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'frecuencia' => 'required|string'
        ]);

        $habito->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'frecuencia' => $request->frecuencia
        ]);

        return redirect()->route('habitos.index')
            ->with('success', 'Hábito actualizado correctamente');
    }

    public function destroy($id)
    {
        $habito = Habito::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $habito->delete();

        return redirect()->route('habitos.index')
            ->with('success', 'Hábito eliminado');
    }
}
