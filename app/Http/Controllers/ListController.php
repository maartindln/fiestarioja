<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pueblo;
class ListController extends Controller
{
    public function listado()
    {
        $pueblos = Pueblo::all();
        return view('listado', compact('pueblos'));
    }

    public function search(Request $request)
    {
        $pueblos = Pueblo::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return view('pueblos.lista', compact('pueblos'));
    }

     public function modal(Pueblo $pueblo)
    {
        return view('pueblos.modalPueblos', compact('pueblo'));
    }

}
