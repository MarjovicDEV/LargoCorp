<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('admin', function ($user) {
            // Allow user if role is admin or email matches demo
            return $user->role === 'admin' || $user->email === 'test@example.com' || $user->email === 'marjovicalejado123@gmail.com';
        });
    }
}
