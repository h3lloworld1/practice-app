<?php

namespace App\Providers;

use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use App\Repositories\Menu\MenuRepository;
use App\Repositories\Orders\Interfaces\OrderFinishedRepositoryInterface;
use App\Repositories\Orders\Interfaces\OrderInProgressRepositoryInterface;
use App\Repositories\Orders\Interfaces\OrderSentRepositoryInterface;
use App\Repositories\Orders\OrderFinished\OrderFinishedRepository;
use App\Repositories\Orders\OrderInProgress\OrderInProgressRepository;
use App\Repositories\Orders\OrderSent\OrderSentRepository;
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
        $this->app->bind(OrderInProgressRepositoryInterface::class, OrderInProgressRepository::class);
        $this->app->bind(OrderFinishedRepositoryInterface::class, OrderFinishedRepository::class);
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
