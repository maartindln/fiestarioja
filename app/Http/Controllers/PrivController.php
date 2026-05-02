<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivController extends Controller
{
    /**
     * Muestra la página de políticas legales.
     */
    public function politicas()
    {
        return view('politicas.priv');
    }
    public function terminos()
    {
        return view('politicas.terminos');
    }
}
