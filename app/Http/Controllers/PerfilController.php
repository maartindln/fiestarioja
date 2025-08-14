<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Custom;
use App\Models\Emotion;
use App\Models\User;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function perfil()
    {
        return view('perfil');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'usuario' => 'nullable|string',
            'correo' => 'nullable|email',
            'contrasena' => 'nullable|string|confirmed|min:8',
        ], [
            'contrasena.confirmed' => 'Las contraseñas no coinciden.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'correo.email' => 'El correo debe tener un formato válido.',
        ]);

        $user = auth()->user();
        $updatedFields = [];

        if ($request->filled('usuario')) {
            $updatedFields['name'] = $request->input('usuario');
        }

        if ($request->filled('correo')) {
            $updatedFields['email'] = $request->input('correo');
        }

        if ($request->filled('contrasena')) {
            $updatedFields['password'] = bcrypt($request->input('contrasena'));
        }

        if (!empty($updatedFields)) {
            User::where('id', $user->id)->update($updatedFields);
        }

        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}
