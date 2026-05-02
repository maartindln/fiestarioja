<?php

namespace App\Http\Controllers\Festivos;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Controller;

class FestivosController extends Controller
{
    // Obtener todos los eventos
    public function indexe()
    {
        return response()->json(Event::all());
    }

    // Crear un nuevo evento (opcional)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:events,name',
            'description' => 'nullable|string',
        ]);

        $event = Event::create($request->all());
        return response()->json($event);
    }

    // Obtener un evento específico
    public function showe($id)
    {
        return response()->json(Event::with('pueblos')->findOrFail($id));
    }
}
