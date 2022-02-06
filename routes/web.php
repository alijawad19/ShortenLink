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

Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 

Route::group(['middleware' => ['protectedPages']], function(){
    Route::get('shortenlink', [ShortLinkController::class,'show']);
    Route::post('shortenurl', [ShortLinkController::class, 'shortenurl']); 
    Route::get('edit/{id}', [ShortLinkController::class,'edit']);
    Route::post('edit', [ShortLinkController::class,'update']);
    Route::get('delete/{id}', [ShortLinkController::class,'delete']);
    Route::get('signout', [CustomAuthController::class, 'signOut']);
});

Route::get('/{code}', [RedirectLinkController::class,'shortenLink']);
