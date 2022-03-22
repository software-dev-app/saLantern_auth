<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth/login');
});

//create new account
Route::post('/auth/save',[RegisterController::class, 'save'])->name('auth.save');

//verify if user credentials exists in our database
Route::post('/auth/check',[LoginController::class, 'check'])->name('auth.check');

//log us out of the application
Route::get('/auth/logout',[LoginController::class, 'logout'])->name('auth.logout');


//our protected routes only authenticated users can access
Route::group(['middleware'=>['AuthCheck']], function(){
    //directs us to profile page upon succesfull login
    Route::get('/account/profile',[HomeController::class,'profile']);

    //Route::get('/admin/dashboard',[HomeController::class, 'dashboard']);
    //redirects us to the login page
    Route::get('/auth/login',[LoginController::class, 'login'])->name('auth.login');

    //redirects us to the register page
    Route::get('/auth/register',[RegisterController::class, 'register'])->name('auth.register');

    //updates user profile on profile page
    Route::post('/account/profile/update', [HomeController::class, 'update_profile']);

    //updates user password
    Route::post('/account/profile/update/password', [HomeController::class, 'update_pass']);
 });
