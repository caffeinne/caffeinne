<?php

declare(strict_types=1);

namespace Caffeinne\Checkout\App\Providers;

use Caffeinne\Checkout\Domain\Model\Cart\TotalCalculatorManagerInterface;
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
            $this->mergeConfigFrom(__DIR__.'/../../../config/caffeinne.checkout.php', 'caffeinne.checkout');
        }

        $this->resolveDefaultBindings();
        $this->resolveDefaultSingletons();
        $this->resolveDefaultCartCalculators();
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
                __DIR__.'/../../../config/caffeinne.checkout.php' => config_path('caffeinne.checkout.php'),
            ], 'caffeinne-checkout-config');
        }
    }

    private function resolveDefaultBindings()
    {
        $bindings = config('caffeinne.checkout.bindings', []);

        foreach ($bindings as $abstract => $concrete) {
            $this->app->bind($abstract, $concrete);
        }
    }

    private function resolveDefaultSingletons()
    {
        $singletons = config('caffeinne.checkout.singletons', []);

        foreach ($singletons as $abstract => $concrete) {
            $this->app->singleton($abstract, $concrete);
        }
    }

    private function resolveDefaultCartCalculators()
    {
        $calculators = config('caffeinne.checkout.cart.calculators', []);

        if (!$calculators) {
            return;
        }

        $this->app->extend(TotalCalculatorManagerInterface::class, function ($calculatorsManager) use ($calculators) {

            /** @var TotalCalculatorManagerInterface $calculatorsManager */
            $calculatorsManager->registerMany($calculators);

            return $calculatorsManager;
        });
    }
}
