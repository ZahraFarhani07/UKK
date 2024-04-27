<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * 
     */
    public function register(): void 
    {
        //
    }

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role_id == 1;
        });

        /* define a accounting role */
        Gate::define('isAccounting', function($user) {
            return $user->role_id == 2;
        });

         /* define a accounting role */
         Gate::define('isKaryawan', function($user) {
            return $user->role_id == 3;
        });
        
    }
}
