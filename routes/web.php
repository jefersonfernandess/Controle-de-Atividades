<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiciplineController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TeacherController;
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

    Route::controller(TeacherController::class)->group(function() {
        Route::get('/professor/', 'index')->name('teacher.index');
        Route::get('/professor/adicionar/', 'createNoRole')->name('teacher.createNoRole');
        Route::get('/professor/adicionar-registrado/', 'createWithRole')->name('teacher.createWithRole');
        Route::post('/professor/adicionando/', 'storeWithRole')->name('teacher.storeWithRole');
    })->middleware('accessLevel');   

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