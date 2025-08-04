<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    // Obtener todos los eventos
    public function index()
    {
        return response()->json(Event::with('pueblo')->get());
    }

    // Guardar un nuevo evento
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'notes' => 'nullable|string',
            'tag' => 'nullable|string',
            'pueblo_id' => 'required|exists:pueblos,id',
        ]);

        $event = Event::create($request->all());
        return response()->json($event);
    }

    // Obtener un evento específico
    public function show($id)
    {
        $event = Event::with('pueblo')->findOrFail($id);
        return response()->json($event);
    }

    // Actualizar un evento
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|date',
            'notes' => 'nullable|string',
            'tag' => 'nullable|string',
            'pueblo_id' => 'sometimes|required|exists:pueblos,id',
        ]);

        $event->update($request->all());
        return response()->json($event);
    }

    // Eliminar un evento
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Evento eliminado']);
    }
}
