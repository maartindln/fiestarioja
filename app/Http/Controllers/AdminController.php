<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PageVisit;
use App\Models\Pueblo;
use App\Models\Event;

class AdminController extends Controller
{
    public function admin()
    {
        $usuarios = User::all();
        $userCount = User::count();
        $pueblos = Pueblo::all();
        $pueblosCount = Pueblo::count();
        $events = Event::all();
        $eventsCount = Event::count();
        $pageVisit = PageVisit::first();
        $visitCount = $pageVisit ? $pageVisit->visits : 0;
        return view('admin.general', compact('userCount','visitCount','pueblosCount','eventsCount'))->with('users', $usuarios)->with('pueblos', $pueblos)->with('events', $events);
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

    public function updateUser(Request $request, $id)
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

    public function destroyUser($id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            return redirect()->route('allusers')->with('success', 'Usuario eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('allusers')->with('error', 'No se pudo eliminar el usuario. ' . $e->getMessage());
        }
    }

   public function updatePueblo(Request $request, $id)
    {
        try {
            $pueblo = Pueblo::findOrFail($id);
            $pueblo->name  = $request->input('name');
            $pueblo->email = $request->input('email');
            $pueblo->role  = $request->input('role');
            $pueblo->save();

            return redirect()->route('allpueblos')->with('success', 'Pueblo actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('allpueblos')->with('error', 'No se pudo actualizar el pueblo. ' . $e->getMessage());
        }
    }

    public function destroyPueblo($id)
    {
        try {
            $pueblo = Pueblo::findOrFail($id);
            $pueblo->delete();
            return redirect()->route('allpueblos')->with('success', 'Pueblo eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('allpueblos')->with('error', 'No se pudo eliminar el Pueblo. ' . $e->getMessage());
        }
    }

    public function allevents()
    {
        $events = Event::all();
        return view('admin.allevents')->with('events', $events);
    }

     public function updateEvent(Request $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->name  = $request->input('name');
            $event->email = $request->input('email');
            $event->role  = $request->input('role');
            $event->save();

            return redirect()->route('allevents')->with('success', 'Evento actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('allevents')->with('error', 'No se pudo actualizar el evento. ' . $e->getMessage());
        }
    }

    public function destroyEvent($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            return redirect()->route('allevents')->with('success', 'Evento eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('allevents')->with('error', 'No se pudo eliminar el evento. ' . $e->getMessage());
        }
    }
}
