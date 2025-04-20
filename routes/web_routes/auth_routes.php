<?php
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

    Route::get('/login','login')->name('login');
    Route::post('/','login_user')->name('login_user');