<?php

namespace App\Providers;

use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use App\Repositories\Menu\MenuRepository;
use App\Repositories\OrderSent\Interfaces\OrderSentRepositoryInterface;
use App\Repositories\OrderSent\OrderSentRepository;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
        $this->app->bind(OrderSentRepositoryInterface::class, OrderSentRepository::class);
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
