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
        Gate::define('switch_type', function (User $user, int $id) {
            if ($user->id == $id) {
                return true;
            }

            $user->load('roles');
            if ($user->roles->first()->name == 'admin') {
                return true;
            }

            return false;
        });
    }
}
