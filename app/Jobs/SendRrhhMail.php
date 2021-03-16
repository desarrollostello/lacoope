<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;

use App\Mail\SendRrhh;

class SendRrhhMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nombre, $email, $telefono, $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($nombre, $telefono, $email, $file )
    {
        $this->nombre   = $nombre;
        $this->telefono = $telefono;
        $this->email    = $email;
        $this->file     = $file;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendRrhh($this->nombre, $this->telefono, $this->email, $this->file);
        Mail::to($this->email)->send($email);
    }
}
