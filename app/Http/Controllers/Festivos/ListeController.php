<?php

namespace App\Http\Controllers\Festivos;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Pueblo;
use App\Http\Controllers\Controller;
class ListeController extends Controller
{
    public function listadoe()
    {
        $events = Event::all();;
        $pueblos = Pueblo::all();

        return view('festivos.listadoe', compact('events','pueblos'));
    }

    public function esearch(Request $request)
    {
        $pueblos = Pueblo::where('name', 'LIKE', '%' . $request->search . '%')->get();
        $eventos = Event::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return view('eventos.lista', compact('pueblos', 'eventos'));
    }
}
