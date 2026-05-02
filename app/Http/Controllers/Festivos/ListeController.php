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
        $search = $request->search;

        $pueblos = Pueblo::where('name', 'LIKE', "%$search%")->get();

        $eventos = Event::where('name', 'LIKE', "%$search%")
            ->orWhereHas('pueblo', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%");
            })
            ->get();

        return view('festivos.lista', compact('eventos', 'pueblos'));
    }
}
