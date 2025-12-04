<?php

namespace App\Providers;

use App\Models\Asistencia;
use App\Models\Tutoria;
use App\Observers\AsistenciaObserver;
use App\Observers\TutoriaObserver;
use Illuminate\Routing\UrlGenerator;
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
    public function boot(UrlGenerator $url): void
    {
        Asistencia::observe(AsistenciaObserver::class);
        Tutoria::observe(TutoriaObserver::class);

        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}
