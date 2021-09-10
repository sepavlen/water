<?php

namespace App\Providers;

use App\src\services\ErrorService;
use App\src\services\MachineService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \view()->composer('backend.layout.app', function ($view){
            $view->with('machines', resolve(MachineService::class)->getMachines());
            $view->with('errors', resolve(ErrorService::class)->getActiveErrors());
        });
    }
}
