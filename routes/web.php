<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register') ->name('register');
   
    Route::post('/register', 'registerSave') ->name('register.save');
    Route::get('/login', 'login') ->name('login');
    Route::post('/login', 'loginAction') ->name('login.action');
    Route::get('/logout', 'logout') ->middleware('auth') ->name('logout');
    
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::controller(ProduitController::class)->prefix('produits')->group(function(){
        Route::get('','index')->name('produits');
    });
    Route::controller(CategorieController::class)->prefix('categories')->group(function(){
        Route::get('','index')->name('categories');
    });
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
