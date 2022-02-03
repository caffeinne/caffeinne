<?php

declare(strict_types=1);


namespace Caffeinne\Laravel\Sales;


use Caffeinne\Catalog\Interfaces\ProductRepositoryInterface;
use Caffeinne\Laravel\Catalog\Adapters\Repositories\ProductRepositoryAdapter;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{

    public function register()
    {
//        $this->app->bind(ProductRepositoryInterface::class, ProductRepositoryAdapter::class);
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }
}
