<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailController extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $nombre;
    public $municipio;
    public $fecha;
    public $descripcion;

    public function __construct($email, $nombre, $municipio, $fecha, $descripcion)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->municipio = $municipio;
        $this->fecha = $fecha;
        $this->descripcion = $descripcion;
    }

    public function build()
    {
        return $this->subject("Nuevo festivo a añadir:  $this->nombre")
                    ->view('mails.contacto');
    }
}

