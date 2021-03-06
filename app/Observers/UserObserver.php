<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserObserver
{
    public function deleting($user)
    {
        if ($user->posts->count() > 0)
        {
            session()->flash('error', 'Este usuario tiene Noticias cargadas, no se puede Eliminar antes deberá reasignar dichas noticias');
            return false;
        }

        if (!Gate::allows('isAdmin')) 
        {
            session()->flash('error', 'Ud no puede borrar este usuario!');
            return false;
        }
        return true;
    }
}
