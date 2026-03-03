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
            'dateIni' => 'sometimes|required|date',
            'dateFin' => 'sometimes|required|date|after_or_equal:dateIni',
            'cartel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pueblo_id' => 'sometimes|required|exists:pueblos,id',
        ]);

        if ($request->hasFile('cartel')) {
            if ($event->cartel) {
                Storage::disk('public')->delete($event->cartel);
            }
            $event->cartel = $request->file('cartel')->store('carteles', 'public');
        }

        $event->update($request->only(['name','dateIni','dateFin','pueblo_id']));

        return response()->json($event);
    }

    // Eliminar un evento
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->cartel) {
            Storage::disk('public')->delete($event->cartel);
        }

        $event->delete();

        return response()->json(['message' => 'Evento eliminado']);
    }
}
