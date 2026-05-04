<?php

namespace App\Http\Controllers\Pueblos;

use Illuminate\Http\Request;
use App\Models\Pueblo;
use App\Models\Event;
use App\Http\Controllers\Controller;

class ListpController extends Controller 
{
    // Este es el método que Laravel dice que no encuentra
    public function listadop()
    {
        $pueblos = Pueblo::all();
        $events = Event::all();

        return view('pueblos.listadop', compact('pueblos','events'));
    }

    public function psearch(Request $request)
    {
        $pueblos = Pueblo::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('pueblos.lista', compact('pueblos'));
    }
}