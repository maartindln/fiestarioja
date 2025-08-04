<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pueblo;

class PueblosController extends Controller
{
    // Obtener todos los pueblos
    public function index()
    {
        return response()->json(Pueblo::all());
    }

    // Crear un nuevo pueblo (opcional)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pueblos,name',
            'description' => 'nullable|string',
        ]);

        $pueblo = Pueblo::create($request->all());
        return response()->json($pueblo);
    }

    // Obtener un pueblo específico
    public function show($id)
    {
        return response()->json(Pueblo::with('events')->findOrFail($id));
    }
}
