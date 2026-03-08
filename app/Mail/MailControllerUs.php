<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailControllerUs extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $nombre;
    public $descripcion;

    public function __construct($email, $nombre, $descripcion)
    {
        $this->email = $email;
        $this->nombre = $nombre;      
        $this->descripcion = $descripcion;
    }

    public function build()
    {
        return $this->subject("Nuevo mensaje de soporte:  $this->nombre")
                    ->view('mails.contacto');
    }
}

