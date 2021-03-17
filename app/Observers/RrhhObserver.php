<?php

namespace App\Observers;
use App\Models\Rrhh;
use Illuminate\Support\Facades\Storage;

class RrhhObserver
{
    public function created(Rrhh $rrhh)
    {
        //
    }

    public function deleting(Rrhh $rrhh)
    {
        /*
        if($post->imgage)
        {
            Storage::delete($post->image->url);
        }
        */
    }
}
