<?php
use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::controller(CandidateController::class)->group(function(){
    Route::get('/home','home')->name('home');
    Route::get('/jobs','jobs')->name('jobs');
    Route::get('/job_details/{id}','job_details')->name('job_details');
    Route::get('/about_us','about_us')->name('about_us');
    Route::get('/profilecreate', 'profilecreate')->name('profilecreate');
    Route::post('/profilestore','profilestore')->name('profilestore');
});
