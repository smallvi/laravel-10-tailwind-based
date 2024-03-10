<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::prefix('artisan')->group(
    function () {
        Route::get('/permission-seed', function () {
            Artisan::call('db:seed --class=ModuleRolePermissionSeeder');
            return 'done-permission-seed';
        });

        Route::get('/optimize', function(){
            Artisan::call('optimize:clear');
            return 'done-optimize-clear';
        });

        Route::get('/migrate', function(){
            Artisan::call('migrate');
            return 'done-migrate';
        });

        Route::get('/migrate-roll', function(){
            Artisan::call('migrate:roll');
            return 'done-migrate-roll';
        });
    }
);
