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
        // Esto busca el archivo en resources/views/politicas/priv.blade.php
        return view('politicas.priv');
    }
    public function terminos()
    {
        return view('politicas.terminos');
    }
}

