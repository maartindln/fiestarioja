<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pueblo;
use App\Models\Event;

class CalendarController extends Controller
{
    public function calendario()
    {
        $pueblos = Pueblo::all();
        $events = Event::all();
        return view('calendario', compact('pueblos','events'));
    }
}
