<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habito;
use Illuminate\Support\Facades\Auth;

class HabitoController extends Controller
{
    //
	public function index()
	{
		$habitos = Habito::where('user_id', Auth::id())->get();

		return view('habitos.index', compact('habitos'));
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
}
