<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\RedirectLinkController;
use App\Http\Controllers\homeController;

Route::get('/', function () {
    homeController::show();
    return view('home');
});



Route::view("404", 'errors/404');

// Route::get('login', [CustomAuthController::class, 'index'])->name('login'); 
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::post('shortenurl', [ShortLinkController::class, 'shortenurl']); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut']);

Route::group(['middleware' => ['protectedPages']], function(){
    Route::get('shortenlink', [ShortLinkController::class,'show']);
});

Route::get('/{code}', [RedirectLinkController::class,'shortenLink']);