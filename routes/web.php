<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/login',[AuthenticationController::class,'login'])->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home' , function(){
    return view('candidate.home');
});


