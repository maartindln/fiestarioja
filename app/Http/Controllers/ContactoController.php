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
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string',
        ]);

        $correo = new MailController(
            $request->input('nombre'),
            $request->input('email'),
            $request->input('mensaje')
        );

        Mail::to('riojafiesta@gmail.com')->send($correo);

        return redirect('/')->with('success','Mensaje enviado correctamente');

    }
}

