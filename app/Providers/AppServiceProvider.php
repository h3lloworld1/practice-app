<?php

namespace App\Providers;

use App\Services\Menu\Interfaces\MenuServiceInterface;
use App\Services\Menu\MenuService;
use App\Services\Orders\Interfaces\OrderInProgressInterface;
use App\Services\Orders\Interfaces\OrderSentInterface;
use App\Services\Orders\OrderInProgress\OrderInProgressService;
use App\Services\Orders\OrderSent\OrderSentService;
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
        $this->app->bind(MenuServiceInterface::class, MenuService::class);
        $this->app->bind(OrderSentInterface::class, OrderSentService::class);
        $this->app->bind(OrderInProgressInterface::class, OrderInProgressService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
