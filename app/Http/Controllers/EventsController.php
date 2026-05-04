<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    // Guardar un nuevo evento
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dateIni' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateIni',
            'pueblo_id' => 'required|exists:pueblos,id',
            'cartel' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $eventData = $request->only(['name', 'dateIni', 'dateFin', 'pueblo_id']);

        if ($request->hasFile('cartel')) {
            $file = $request->file('cartel');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/carteles', $filename);
            $eventData['cartel'] = $filename;
        } else {
            $eventData['cartel'] = null;
        }

        $event = Event::create($eventData);

        return redirect()->back()->with('success', 'Evento guardado correctamente');

    }

    // Actualizar un evento
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'dateIni' => 'sometimes|required|date',
            'dateFin' => 'sometimes|required|date|after_or_equal:dateIni',
            'cartel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pueblo_id' => 'sometimes|required|exists:pueblos,id',
        ]);

        if ($request->hasFile('cartel')) {
            if ($event->cartel) {
                // Asegúrate de borrar la ruta correcta
                Storage::disk('public')->delete('carteles/' . $event->cartel);
            }
            $file = $request->file('cartel');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/carteles', $filename);
            $event->cartel = $filename;
        }

        $event->update($request->only(['name','dateIni','dateFin','pueblo_id']));

        return redirect()->back()->with('success', 'Evento actualizado correctamente');
    }

    // Eliminar un evento
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->cartel) {
            Storage::disk('public')->delete('carteles/' . $event->cartel);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Evento eliminado correctamente');
    }
}
