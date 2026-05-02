<?php

namespace App\Http\Controllers\Pueblos;

use Illuminate\Http\Request;
use App\Models\Pueblo;
use App\Http\Controllers\Controller;

class PueblosController extends Controller
{
    // Obtener todos los pueblos
    public function indexp()
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
    public function showp($id)
    {
        return response()->json(Pueblo::with('events')->findOrFail($id));
    }
}
