<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pueblo;
use App\Models\Event;
class ListController extends Controller
{
    public function listado()
    {
        $pueblos = Pueblo::all();
        $events = Event::all();;

        return view('listado', compact('pueblos','events'));
    }

    public function search(Request $request)
    {
        $pueblos = Pueblo::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return view('pueblos.lista', compact('pueblos'));
    }
}
