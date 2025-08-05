<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailController;
;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nombre' => 'required|string',
            'municipio' => 'required|string',
            'fecha' => 'required|string',
            'descripcion' => 'string',
        ]);

        $correo = new MailController(
            $request->input('email'),
            $request->input('nombre'),
            $request->input('municipio'),
            $request->input('fecha'),
            $request->input('descripcion')
        );

        Mail::to('riojafiesta@gmail.com')->send($correo);

        return redirect('/')->with('success','Mensaje enviado correctamente');

    }
}

