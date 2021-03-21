<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactFront extends Mailable
{
    use Queueable, SerializesModels;

    protected $nombre, $mensaje, $email, $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->nombre = $this->data['nombre'];
        $this->email = $this->data['email'];
        $this->mensaje = $this->data['mensaje'];
        
        return $this->subject('Mensaje desde el Sitio Web')
                ->view('emails.sendContactFront', [
                    'nombre'    => $this->nombre,
                    'email'     => $this->email,
                    'mensaje'   => $this->mensaje
                ]);

       // return $this->view('view.name');
    }
}
