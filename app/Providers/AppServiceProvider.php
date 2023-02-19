<?php

namespace App\Providers;

use App\Repositories\Menu\Interfaces\MenuRepositoryInterface;
use App\Repositories\Menu\MenuRepository;
use App\Services\Menu\Contracts\MenuServiceContract;
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
        $this->app->bind(MenuServiceContract::class, MenuService::class);
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
