<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendRrhh extends Mailable
{
    use Queueable, SerializesModels;

    protected $nombre, $telefono, $email, $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        /*
        $this->nombre   = $data['nombre'];
        $this->telefono = $data['telefono'];
        $this->email    = $data['email'];
        */
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->nombre = $this->data['nombre'];
        $this->telefono = $this->data['telefono'];
        $this->email = $this->data['email'];
        
        return $this->subject('Envío de Curriculum al Área de RRHH')
                ->view('emails.rrhh', [
                    'nombre'    => $this->nombre,
                    'telefono'  => $this->telefono,
                    'email'     => $this->email

                ])
                ->attach($this->data['file']->getRealPath(),[
                    'as'    => $this->data['file']->getClientOriginalName()
                ]);

        /*
        $file = Storage::get('cv/cv.pdf');

        return $this->from('maurotello73@gmail.com', 'La Cooperativa - RRHH')
                    ->subject('Envío de Curriculum al área de RRHH')
                    ->view('emails.rrhh')
                    ->attach($file,  [
                        'as' => 'curriculum.pdf',
                        'mime' => 'application/pdf',
                    ])
                    ->with([
                        'nombre'    => $this->nombre,
                        'telefono'  => $this->telefono,
                        'email'     => $this->email
                    ]);
        */
    }
}
/**/