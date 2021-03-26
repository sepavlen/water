<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('dashboard');
})->middleware('auth');

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('dashboard')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'backend\DashboardController@index')
            ->name('dashboard');

        Route::middleware('check.admin')->group(function (){
            Route::get('/users', 'backend\UserController@index')->name('dashboard.users');
            Route::get('/users/create', 'backend\UserController@create')->name('dashboard.user.create');
            Route::post('/users/create', 'backend\UserController@save')->name('dashboard.user.create');
            Route::get('/users/edit/{user}', 'backend\UserController@edit')->name('dashboard.user.edit');
            Route::get('/users/delete/{user}', 'backend\UserController@destroy')->name('dashboard.user.delete');
            Route::get('/errors-unknown', 'backend\DashboardController@errors')->name('dashboard.unknownErrors');
            Route::get('/error-remove', 'backend\DashboardController@errorRemove')->name('dashboard.removeErrors');
        });
        Route::post('/users/update', 'backend\UserController@update')->name('dashboard.user.update');

        Route::get('/machine', 'backend\MachineController@machine')->name('dashboard.machine');
        Route::get('/machine/create', 'backend\MachineController@create')->name('dashboard.machine.create');
        Route::post('/machine/create', 'backend\MachineController@save')->name('dashboard.machine.create');
        Route::get('/machine/edit/{machine}', 'backend\MachineController@edit')->name('dashboard.machine.edit');
        Route::post('/machine/update/{machine}', 'backend\MachineController@update')->name('dashboard.machine.update');
        Route::get('/machine/show-statistic/{machine}', 'backend\MachineController@showStatistic')->name('dashboard.machine.show-statistic');
        Route::get('/machine/delete/{machine}', 'backend\MachineController@delete')->name('dashboard.machine.delete');

        Route::get('/statistic', 'backend\StatisticController@index')->name('dashboard.statistic');
        Route::get('/table', 'backend\TableController@index')->name('dashboard.table');
    });

Route::get('/add.php', 'RequestController@index');

