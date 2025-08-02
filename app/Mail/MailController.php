<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailController extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $mensaje;

    public function __construct($nombre, $email, $mensaje)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->mensaje = $mensaje;
    }

    public function build()
    {
        return $this->subject("Nuevo mensaje de contacto de $this->nombre")
                    ->view('mails.contacto');
    }
}

