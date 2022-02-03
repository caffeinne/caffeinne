<?php

declare(strict_types=1);


namespace Caffeinne\Laravel\Cart;


use Caffeinne\Cart\Interfaces\Factories\CartFactoryInterface;
use Caffeinne\Cart\Interfaces\Repositories\CartRepositoryInterface;
use Caffeinne\Laravel\Cart\Adapters\Factories\CartFactoryAdapter;
use Caffeinne\Laravel\Cart\Adapters\Repositories\CartRepositoryAdapter;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{

    public function register()
    {
        $this->app->bind(CartFactoryInterface::class, CartFactoryAdapter::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepositoryAdapter::class);
    }

    public function boot()
    {
//        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }
}
