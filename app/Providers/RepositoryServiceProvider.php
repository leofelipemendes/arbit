<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\TesteRepository::class, \App\Repositories\TesteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NegocieCoinRepository::class, \App\Repositories\NegocieCoinRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BitcoinTradeRepository::class, \App\Repositories\BitcoinTradeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MercadoBitcoinRepository::class, \App\Repositories\MercadoBitcoinRepositoryEloquent::class);
        //:end-bindings:
    }
}
