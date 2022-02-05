<?php

declare(strict_types=1);

namespace Caffeinne\Catalog\App\Providers;

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
            $this->mergeConfigFrom(__DIR__.'/../../../config/caffeinne.catalog.php', 'caffeinne.catalog');
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
                __DIR__.'/../../../config/caffeinne.catalog.php' => config_path('caffeinne.catalog.php'),
            ], 'caffeinne-catalog-config');
        }
    }

    private function resolveDefaultBindings()
    {
        $bindings = config('caffeinne.catalog.bindings', []);

        foreach ($bindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    private function resolveDefaultSingletons()
    {
        $singletons = config('caffeinne.catalog.singletons', []);

        foreach ($singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }
}
