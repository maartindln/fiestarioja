<?php

namespace App\Http\Controllers;

use App\Models\PageVisit;

class HomeController extends Controller
{
    public function inicio()
    {
        $pageVisit = PageVisit::first();

        if (!$pageVisit) {
            // Si no existe el registro, lo creamos
            $pageVisit = PageVisit::create(['visits' => 1]);
        } else {
            // Si ya existe, incrementamos
            $pageVisit->increment('visits');
        }

        return view('index', ['visits' => $pageVisit->visits]);
    }

}
