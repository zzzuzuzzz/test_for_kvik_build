<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\IndexController::class)->name('welcome');

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
    Route::group(['prefix' => '/dev/admin'], function () {
        Route::get('/', \App\Http\Controllers\Admin\IndexController::class)->name('admin.index');

        Route::group(['prefix' => '/users'], function () {
            Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.user.index');
            Route::get('/admins', \App\Http\Controllers\Admin\User\IndexAdminController::class)->name('admin.admin.index');
            Route::get('/premium', \App\Http\Controllers\Admin\User\IndexPremiumController::class)->name('admin.premium.index');
            Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
            Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
            Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
            Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
            Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
            Route::delete('/{user}', \App\Http\Controllers\Admin\User\DeleteController::class)->name('admin.user.delete');
        });

        Route::group(['prefix' => '/tasks'], function () {
            Route::get('/', \App\Http\Controllers\Admin\Task\IndexController::class)->name('admin.task.index');
            Route::get('/{task}', \App\Http\Controllers\Admin\Task\ShowController::class)->name('admin.task.show');
            Route::delete('/{task}', \App\Http\Controllers\Admin\Task\DeleteController::class)->name('admin.task.delete');
        });
    });
});

Route::group(['prefix' => '/laravel', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => '/home'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/search', \App\Http\Controllers\Preview\SearchGroupController::class)->name('search');
        Route::post('/search', \App\Http\Controllers\Preview\EnterGroupController::class)->name('enterToGroup');
        Route::get('/premiumPreview', \App\Http\Controllers\Preview\PremiumPreviewController::class)->name('premiumPreview');
        Route::get('/premiumBuy', \App\Http\Controllers\Preview\PremiumBuyController::class)->name('premiumBuy');
        Route::patch('/premiumBuy', \App\Http\Controllers\Preview\PremiumBuyUpdateController::class)->name('premiumBuyUpdate');
        Route::get('/createGroup', \App\Http\Controllers\Preview\CreateGroupController::class)->name('createGroup');
        Route::post('/createGroup', \App\Http\Controllers\Preview\CreateGroupStoreController::class)->name('createGroupStore');
    });

    Route::group(['prefix' => '/premium'], function () {
        Route::get('/{group_id}', \App\Http\Controllers\Premium\IndexController::class)->name('premium.index');
        Route::get('/admin/{group_id}', \App\Http\Controllers\Premium\AdminIndexController::class)->name('premium.admin.index');
    });

    Route::get('{page}', \App\Http\Controllers\Vue\IndexController::class)->where('page', '.*');
});

Auth::routes(['verify' => true]);
