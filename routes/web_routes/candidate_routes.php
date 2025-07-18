<?php
use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

Route::controller(CandidateController::class)->group(function(){
    Route::post('/jobapply','jobapply')->name('jobapply');
    Route::get('/home','home')->name('home');
    Route::get('/jobs','jobs')->name('jobs');
    Route::get('/appliedjob','appliedjob')->name('appliedjob');
    Route::get('/job_details/{id}/{apl}','job_details')->name('job_details');
    Route::get('/about_us','about_us')->name('about_us');
    Route::get('/profilecreate', 'profilecreate')->name('profilecreate');
    Route::post('/profilestore','profilestore')->name('profilestore');
    Route::get('/privacy_policy', function () {
        return view('candidate.privacy_policy');
    });
    Route::get('/terms_ofservices', function () {
        return view('candidate.terms_ofservice');
    });
    Route::get('/services', function () {
        return view('candidate.services');
    });
});
