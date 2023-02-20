<?php

namespace App\Providers;

use App\Services\Menu\Interfaces\MenuServiceInterface;
use App\Services\Menu\MenuService;
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
