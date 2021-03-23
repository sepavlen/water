<?php

namespace App\Providers;

use App\src\services\MachineService;
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
        \view()->composer('backend.layout.app', function ($view){
            $view->with('machines', resolve(MachineService::class)->getMachines());
        });
    }
}
