<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiciplineController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use GuzzleHttp\Middleware;
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

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('site.index');

    Route::middleware(['auth', 'accessLevelAdmin'])->group(function () {
        Route::controller(TeacherController::class)->group(function () {
            Route::get('/professor/', 'index')->name('teacher.index');
            Route::get('/professor/adicionar/', 'createNoRole')->name('teacher.createNoRole');
            Route::get('/professor/adicionar-registrado/', 'createWithRole')->name('teacher.createWithRole');
            Route::post('/professor/criando/', 'storeTeacher')->name('teacher.store');
            Route::post('/professor/atualizando/', 'updateRole')->name('teacher.updateRole');
            Route::put('/professor/atualizando/{professor}', 'updateTeacher')->name('teacher.update');
            Route::delete('/professor/desvinculando/{professor}', 'unlinkTeacher')->name('teacher.unlink');
            Route::delete('/professor/apagando/{professor}', 'destroyTeacher')->name('teacher.destroy');
        });
    });

    Route::middleware(['auth', 'accessLevelTeacher'])->group(function () {
        Route::controller(StudentController::class)->group(function () {
            Route::get('/aluno/', 'index')->name('student.index');
            Route::get('/aluno/adicionar/', 'createNoRole')->name('student.createNoRole');
            Route::get('/aluno/adicionar-registrado/', 'createWithRole')->name('student.createWithRole');
            Route::post('/aluno/criando/', 'storeStudent')->name('student.store');
            Route::post('/aluno/atualizando/', 'updateRole')->name('student.updateRole');
            Route::put('/aluno/atualizando/{aluno}', 'updateStudent')->name('student.update');
            Route::delete('/alunos/desvinculando/{aluno}/', 'unlinkStudent')->name('student.unlink');
            Route::delete('/alunos/apagando/{aluno}/', 'destroyStudent')->name('student.destroy');
        });
    });

    Route::controller(DiciplineController::class)->group(function () {
        Route::get('/diciplinas/', 'index')->name('diciplines.index');
        Route::post('/diciplinas/criando', 'store')->name('diciplines.store');
    });
    
    Route::middleware(['auth', 'accessLevelTeacher'])->group(function () {
        Route::controller(ActivityController::class)->group(function () {
            Route::get('/atividades/', 'index')->name('activity.index');
            Route::get('/atividades/nova-atividade/', 'create')->name('activity.create');
            Route::post('/atividades/cadastrando-atividade/', 'store')->name('activity.store');
            Route::get('/atividades/ver/{atividade}', 'show')->name('activity.show');
            Route::get('/atividades/editar-atividade/{atividade}', 'edit')->name('activity.edit');
        });
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login/', 'loginIndex')->name('authlogin.index');
    Route::post('/login/entrando/', 'loginStore')->name('authlogin.store');
    Route::post('/login/    logout/', 'logout')->name('authlogout.logout');
    Route::get('/registrar-se/', 'registerIndex')->name('authregister.index');
    Route::post('/registar-se/registrando', 'registerStore')->name('authregister.store');
});
