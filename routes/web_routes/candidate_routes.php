<?php
use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::controller(CandidateController::class)->group(function(){
    Route::get('/home','home')->name('home');
});
