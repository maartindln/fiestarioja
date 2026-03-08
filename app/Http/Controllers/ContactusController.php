<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // IMPORTANTE: Para enviar correos
use App\Mail\ContactoMailable;      // IMPORTANTE: La clase que define el diseño del email

class ContactusController extends Controller
{
    public function index()
    {
        return view('mails.contactus'); 
    }

    public function enviar(Request $request)
    {
        // 1. Validamos los datos (nombre, email, mensaje)
        $data = $request->validate([
            'nombre'  => 'required|string',
            'email'   => 'required|email',
            'mensaje' => 'required|string',
        ]);

        // 2. ENVIAR EL CORREO
        // 'riojafiesta@gmail.com' es donde tú recibirás los mensajes
        Mail::to('riojafiesta@gmail.com')->send(new ContactoMailable($data));

        // 3. Volver atrás con mensaje de éxito
        return back()->with('success', '¡Mensaje enviado! Nos pondremos en contacto contigo pronto.');
    }
}