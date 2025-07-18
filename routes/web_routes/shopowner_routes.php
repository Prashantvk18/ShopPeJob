<?php

use App\Http\Controllers\ShopOwnerController;
use Illuminate\Support\Facades\Route;

Route::controller(ShopOwnerController::class)->group(function () {
    Route::get('/shome', 'home')->name('shome');
    Route::get('/applieduser/{id}', 'applieduser')->name('applieduser');
    Route::get('/user_details/{id}/{jid}', 'user_details')->name('user_details');
    Route::get('/createjob/{id}', 'createjob')->name('createjob');
    Route::post('/store-job', 'storeJob')->name('store.job');
    Route::post('/job_status', 'job_status')->name('job_status');
    Route::post('/job_delete', 'job_delete')->name('job_delete');
    Route::post('/user_jobstatus', 'user_jobstatus')->name('user_jobstatus');
    Route::get('/sabout_us','about_us')->name('about_us');
    Route::get('/sprivacy_policy', function () {
        return view('shop_owner.privacy_policy');
    });
    Route::get('/sterms_ofservice', function () {
        return view('shop_owner.terms_ofservice');
    });
    Route::get('/sservices', function () {
        return view('shop_owner.services');
    });
});
