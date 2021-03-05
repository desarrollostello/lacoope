<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, $user_id)
    {
        //dd($user);
     //   return (($user_id == auth()->user()->id) || auth()->user()->hasRole('Admin'))?true:false;
    }
}
