<?php

declare(strict_types=1);

namespace Caffeinne\Event\App\Providers;

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
        if (! app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../../../config/caffeinne.event.php', 'caffeinne.event');
        }

        $this->resolveDefaultBindings();
        $this->resolveDefaultSingletons();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../../config/caffeinne.event.php' => config_path('caffeinne.event.php'),
            ], 'caffeinne-event-config');
        }
    }

    private function resolveDefaultBindings()
    {
        $bindings = config('caffeinne.event.bindings', []);

        foreach($bindings as $abstract => $concrete){
            $this->app->bind($abstract, $concrete);
        }
    }

    private function resolveDefaultSingletons()
    {
        $singletons = config('caffeinne.event.singletons', []);

        foreach($singletons as $abstract => $concrete){
            $this->app->singleton($abstract, $concrete);
        }
    }
}
