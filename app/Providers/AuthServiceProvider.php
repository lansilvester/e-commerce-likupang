<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-dashboard', function ($user) {
            // SA (Super Admin) dapat mengakses semua menu
            return $user->role === 'SA';
        });

        Gate::define('access-homestay', function ($user) {
            return $user->role === 'SA' || $user->role === 'admin_homestay';
        });

        Gate::define('access-souvenir', function ($user) {
            return $user->role === 'SA' || $user->role === 'admin_souvenir';
        });

        Gate::define('access-destinasi-wisata', function ($user) {
            return $user->role === 'SA' || $user->role === 'admin_objek_wisata';
        });
        Gate::define('access-kuliner', function ($user) {
            return $user->role === 'SA' || $user->role === 'admin_kuliner';
        });
    }
}
