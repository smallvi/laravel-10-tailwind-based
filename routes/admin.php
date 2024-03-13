<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

require __DIR__ . '/admin/auth.php';
require __DIR__ . '/artisan.php';

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::middleware(['auth', 'custom.auth:admin'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('admins', AdminController::class)->only('index');
});


