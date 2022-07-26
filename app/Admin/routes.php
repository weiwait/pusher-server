<?php

namespace App\Admin\Controllers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {
    Route::get('/', [HomeController::class, 'index']);

    // Pusher App
    Route::resource('pusher-apps', PusherApplicationController::class);
});
