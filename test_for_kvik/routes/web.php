<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\IndexController::class)->name('welcome');

Auth::routes();

Route::group(['prefix' => '/home'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/search', \App\Http\Controllers\preview\SearchGroupController::class)->name('search');
    Route::post('/search', \App\Http\Controllers\preview\EnterGroupController::class)->name('enterToGroup');
    Route::get('/premiumPreview', \App\Http\Controllers\preview\PremiumPreviewController::class)->name('premiumPreview');
    Route::get('/createGroup', \App\Http\Controllers\preview\CreateGroupController::class)->name('createGroup');
    Route::post('/createGroup', \App\Http\Controllers\preview\CreateGroupStoreController::class)->name('createGroupStore');
});
