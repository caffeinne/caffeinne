<?php

declare(strict_types=1);

namespace Caffeinne\Container\App\Providers;

use Caffeinne\Container\App\InterceptorManagerInterface;
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
            $this->mergeConfigFrom(__DIR__.'/../../../config/caffeinne.container.php', 'caffeinne.container');
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
                __DIR__.'/../../../config/caffeinne.container.php' => config_path('caffeinne.container.php'),
            ], 'caffeinne-container-config');
        }

        $this->bindInterceptors();
    }

    private function resolveDefaultBindings()
    {
        $bindings = config('caffeinne.container.bindings', []);

        foreach ($bindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    private function resolveDefaultSingletons()
    {
        $singletons = config('caffeinne.container.singletons', []);

        foreach ($singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    private function bindInterceptors()
    {
        $interceptorManager = $this->app->make(InterceptorManagerInterface::class);

        foreach ($interceptorManager->getInterceptors() as $original => $interceptors) {
            $this->app->extend($original, function ($concrete) use ($interceptors) {
                return $this->app->make(\Caffeinne\Container\App\InterceptorCaller::class, [
                    'concrete' => $concrete,
                    'interceptors' => $interceptors
                ]);
            });
        }
    }
}
