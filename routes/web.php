<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiciplineController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(SiteController::class)->group(function() {
    Route::get('/', 'index')->name('site.index');

    Route::controller(DiciplineController::class)->group(function() {
        Route::get('/diciplinas/', 'index')->name('diciplines.index');
    })->middleware('accessLevel');
}); 

Route::controller(AuthController::class)->group(function() {

    Route::get('/login/', 'loginIndex')->name('authlogin.index');
    Route::post('/login/entrando/', 'loginStore')->name('authlogin.store');
    Route::post('/login/logout/', 'logout')->name('authlogout.logout');

    Route::get('/registrar-se/', 'registerIndex')->name('authregister.index');
    Route::post('/registar-se/registrando', 'registerStore')->name('authregister.store');
});