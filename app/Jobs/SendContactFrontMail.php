<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactFront;

class SendContactFrontMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nombre, $email, $mensaje;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($nombre, $email, $mensaje)
    {
        $this->nombre   = $nombre;
        $this->email    = $email;
        $this->mensaje  = $mensaje;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendContactFront($this->nombre, $this->email, $this->mensaje);
        Mail::to($this->email)->send($email);
    }
}
