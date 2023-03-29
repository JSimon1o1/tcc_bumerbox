<?php

namespace App\Providers;

use App\Models\Usuario;
use App\Observers\UsuarioObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Usuario::observe(UsuarioObserver::class);
        Paginator::useBootstrapFive();
    }
}
