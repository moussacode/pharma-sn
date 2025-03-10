<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Http;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register') ->name('register');
   
    Route::post('/register', 'registerSave') ->name('register.save');
    Route::get('/', 'login') ->name('login');
    Route::post('/login', 'loginAction') ->name('login.action');
    Route::get('/logout', 'logout') ->middleware('auth') ->name('logout');
    
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::controller(ProduitController::class)->prefix('produits')->group(function(){
        Route::get('','index')->name('produits');
        Route::get('create','create')->name('produits.create');
        Route::post('store','store')->name('produits.store');
        Route::get('{produit}/edit','edit')->name('produits.edit');
        Route::put('{produit}','update')->name('produits.update');
        Route::delete('{produit}','destroy')->name('produits.destroy');
        Route ::get('search','search')->name('search');
    });
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::get('', 'index')->name('users');
        Route::get('create', 'create')->name('users.create');
        Route::post('store', 'store')->name('users.store');
        Route::get('{user}/edit', 'edit')->name('users.edit');
        Route::put('{user}', 'update')->name('users.update');
        Route::delete('{user}', 'destroy')->name('users.destroy');
    });
    
    
    Route::controller(CategorieController::class)->prefix('categories')->group(function(){
        Route::get('','index')->name('categories');
        Route::get('create','create')->name('categories.create');
        Route::post('store','store')->name('categories.store');
        Route::get('{categorie}/edit','edit')->name('categories.edit');
        Route::put('{categorie}','update')->name('categories.update');
        Route::delete('{categorie}','destroy')->name('categories.destroy');
        Route ::get('search','search')->name('search');
    });

    Route::controller(FournisseurController::class)->prefix('fournisseurs')->group(function(){
        Route::get('','index')->name('fournisseurs');
        Route::get('create','create')->name('fournisseurs.create');
        Route::post('store','store')->name('fournisseurs.store');
        Route::get('{fournisseur}/edit','edit')->name('fournisseurs.edit');
        Route::put('{fournisseur}','update')->name('fournisseurs.update');
        Route::delete('{fournisseur}','destroy')->name('fournisseurs.destroy');
        Route ::get('search','search')->name('search');
    });
    Route::controller(LivraisonController::class)->prefix('livraisons')->group(function() {
        Route::get('', 'index')->name('livraisons');
        Route::get('create', 'create')->name('livraisons.create');
        Route::post('store', 'store')->name('livraisons.store');
        Route::get('{livraison}/edit', 'edit')->name('livraisons.edit');
        Route::put('{livraison}', 'update')->name('livraisons.update');
        Route::delete('{livraison}', 'destroy')->name('livraisons.destroy');
        Route::get('search', 'search')->name('livraisons.search');
    });
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    // web.php
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
