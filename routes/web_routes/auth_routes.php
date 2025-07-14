<?php
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

    Route::get('/login','login')->name('login');
    Route::post('/','login_user')->name('login_user');
    Route::get('/privacy_policy','privacy_policy')->name('privacy_policy');

    Route::get('/privacy_policy', function () {
        return view('authentication.privacy_policy');
    });