<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function (User $user) {
            return $user->roles()->first()->name == 'admin';
        });

        Gate::define('is-doctor', function (User $user) {
           return $user->roles()->first()->name == 'doctor';
        });

        Gate::define('is-patient', function (User $user) {
            return $user->roles()->first()->name == 'patient';
        });
    }

}
