<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthenticationController::class)->group(function(){
    require __DIR__ . '/web_routes/auth_routes.php'; 
});

Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');



Route::group(['middleware' => 'checkedloggedin'],function() {
    require __DIR__ . '/web_routes/candidate_routes.php'; 
    require __DIR__ . '/web_routes/shopowner_routes.php'; 
});





