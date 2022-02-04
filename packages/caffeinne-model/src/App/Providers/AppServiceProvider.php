<?php

declare(strict_types=1);

namespace Caffeinne\Model\App\Providers;

use Caffeinne\Checkout\Domain\Model\CartInterface;
use Illuminate\Foundation\Application;
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
            $this->mergeConfigFrom(__DIR__.'/../../../config/caffeinne.model.php', 'caffeinne.model');
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
                __DIR__.'/../../../config/caffeinne.model.php' => config_path('caffeinne.model.php'),
            ], 'caffeinne-model-config');
        }
    }

    private function resolveDefaultBindings()
    {
        $bindings = config('caffeinne.model.bindings', []);

        foreach ($bindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    private function resolveDefaultSingletons()
    {
        $singletons = config('caffeinne.model.singletons', []);

        foreach ($singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }
}
