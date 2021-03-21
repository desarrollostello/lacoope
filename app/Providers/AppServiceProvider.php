<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        \Carbon\Carbon::setLocale(config('app.locale'));
        setlocale(LC_TIME, config('app.locale'));
        //Category::observe(CategoryObserver::class);
        //User::observe(UserObserver::class);
    }
}
