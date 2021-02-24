<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('dashboard');
})->middleware('auth');


Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'backend\DashboardController@index')
            ->name('dashboard');
        Route::get('/users', 'backend\UserController@index')->name('dashboard.users');
        Route::get('/machine', 'backend\MachineController@machine')->name('dashboard.machine');
        Route::get('/statistic', 'backend\StatisticController@index')->name('dashboard.statistic');
    });

//Route::get('/add.php', 'HomeController@index')->name('home');

Auth::routes();
