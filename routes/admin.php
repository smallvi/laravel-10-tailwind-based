<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::middleware(['custom.auth:admin'])->group(function () {
    // Route::get('/dashboard', fn() => view('admin.dashboard'))->name('.dashboard');
    Route::get('/dashboard','HomeController@index')->name('.dashboard');
});

require __DIR__.'/admin/auth.php';