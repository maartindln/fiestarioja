<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pueblo;

class CalendarController extends Controller
{
    public function calendario()
    {
        $pueblos = Pueblo::all();
        return view('calendario', compact('pueblos'));
    }
}
