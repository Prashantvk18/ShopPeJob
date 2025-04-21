<?php

use App\Http\Controllers\ShopOwnerController;
use Illuminate\Support\Facades\Route;

Route::controller(ShopOwnerController::class)->group(function () {
    Route::get('/shome', 'home')->name('home');
    Route::get('/createjob', 'createjob')->name('createjob');
    Route::post('/store-job', 'storeJob')->name('store.job');
});
