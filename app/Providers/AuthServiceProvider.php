<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user){
            return $user->hasRole('Admin');
        });

        Gate::define('update-user', function (User $user, $user_id) {
            return (($user_id == $user->id) || $user->hasRole('Admin'))?true:false;
        });
        
    }
}
