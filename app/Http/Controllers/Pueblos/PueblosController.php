<?php

namespace App\Http\Controllers\Pueblos;

use Illuminate\Http\Request;
use App\Models\Pueblo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PueblosController extends Controller
{
    // Carga la tabla en el panel de administración
    public function indexp()
    {
        $pueblos = Pueblo::all();
        return view('admin.allpueblos', compact('pueblos'));
    }

    // Procesa el registro de un nuevo pueblo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pueblos,name|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'como_llegar' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/pueblos', $filename);
            $data['image'] = $filename;
        }

        Pueblo::create($data);

        // Redirecciona a la tabla de pueblos en lugar de devolver JSON
        return redirect()->route('allpueblos')->with('success', 'Pueblo registrado correctamente');
    }

    // Actualiza los datos desde la tabla de edición rápida
    public function update(Request $request, $id)
    {
        $pueblo = Pueblo::findOrFail($id);
        $pueblo->update($request->only(['name', 'latitude', 'longitude']));

        return redirect()->back()->with('success', 'Pueblo actualizado con éxito');
    }

    // Elimina el pueblo y su imagen asociada
    public function destroy($id)
    {
        $pueblo = Pueblo::findOrFail($id);
        
        if ($pueblo->image) {
            Storage::disk('public')->delete('pueblos/' . $pueblo->image);
        }

        $pueblo->delete();

        return redirect()->back()->with('success', 'Pueblo eliminado correctamente');
    }

    // Para la vista pública detallada (usada en tus rutas)
    public function showp($id)
    {
        $pueblo = Pueblo::with('events')->findOrFail($id);
        return view('pueblos.detalle', compact('pueblo')); // O tu vista de detalle
    }
}