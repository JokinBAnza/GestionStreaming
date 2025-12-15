<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\View;

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
    // Pasar el primer usuario a todas las vistas
    View::composer('*', function ($view) {
        $primerUsuario = User::first();
        $view->with('Usuario', $primerUsuario);
    });
}
}
