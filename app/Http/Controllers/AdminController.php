<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PageVisit;
use App\Models\Pueblo;

class AdminController extends Controller
{
    public function admin()
    {
        $usuarios = User::all();
        $userCount = User::count();
        $pueblos = Pueblo::all();
        $pueblosCount = Pueblo::count();
        $pageVisit = PageVisit::first();
        $visitCount = $pageVisit ? $pageVisit->visits : 0;
        return view('admin.general', compact('userCount','visitCount','pueblosCount'))->with('users', $usuarios)->with('pueblos', $pueblos);
    }

    public function allusers()
    {
        $usuarios = User::all();
        return view('admin.allusers')->with('users', $usuarios);
    }
    public function registeruser()
    {
        return view('admin.registeruser');
    }

    public function allpueblos()
    {
        $pueblos = Pueblo::all();
        return view('admin.allpueblos')->with('pueblos', $pueblos);
    }

    public function update(Request $request, $id)
{
    try {
        $usuario = User::findOrFail($id);
        $usuario->name  = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->role  = $request->input('role');
        $usuario->save();

        return redirect()->route('allusers')->with('success', 'Usuario actualizado correctamente');
    } catch (\Exception $e) {
        return redirect()->route('allusers')->with('error', 'No se pudo actualizar el usuario. ' . $e->getMessage());
    }
}

    public function destroy($id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            return redirect()->route('allusers')->with('success', 'Usuario eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('allusers')->with('error', 'No se pudo eliminar el usuario. ' . $e->getMessage());
        }
    }
}
