<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityResponseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiciplineController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\ActivityResponse;
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

    //Access routes for admin level or higher
    Route::middleware(['auth', 'accessLevelAdmin'])->group(function () {
        //Teacher controller routes
        Route::prefix('admin')->group(function () {
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
            //Diciplines controller routes
            Route::controller(DiciplineController::class)->group(function () {
                Route::get('/diciplinas/', 'index')->name('diciplines.index');
                Route::post('/diciplinas/criando', 'store')->name('diciplines.store');
                Route::put('/diciplinas/atualizando/{diciplina}', 'update')->name('diciplines.update');
                Route::delete('/diciplina/excluindo/{diciplina}', 'destroy')->name('diciplines.destroy');
            });
            //Activity Response controller routes
            Route::controller(ActivityController::class)->group(function () {
                Route::get('/atividades/', 'index')->name('activity.index');
            }); 
        });
    });
    //Access routes for teacher level or higher
    Route::middleware(['auth', 'accessLevelTeacher'])->group(function () {
        //Students controller routes
        Route::controller(StudentController::class)->group(function () {
            Route::get('/aluno/', 'index')->name('student.index');
            Route::get('/aluno/adicionar/', 'createNoRole')->name('student.createNoRole');
            Route::get('/aluno/adicionar-registrado/', 'createWithRole')->name('student.createWithRole');
            Route::post('/aluno/criando/', 'storeStudent')->name('student.store');
            Route::post('/aluno/atualizando/', 'updateRole')->name('student.updateRole');
            Route::put('/aluno/atualizando/{aluno}', 'updateStudent')->name('student.update');
            Route::delete('/alunos/desvinculando/{aluno}/', 'unlinkStudent')->name('student.unlink');
        });
        //Activity controller routes
        Route::controller(ActivityController::class)->group(function () {
            Route::get('/atividades/nova-atividade/', 'create')->name('activity.create');
            Route::post('/atividades/cadastrando-atividade/', 'store')->name('activity.store');
            Route::get('/atividades/ver/{atividade}', 'show')->name('activity.show');
            Route::get('/atividades/editar-atividade/{atividade}', 'edit')->name('activity.edit');
            Route::put('/atividades/atualizando-atividade/{atividade}', 'update')->name('activity.update'); 
            Route::delete('/atividades/apagando-atividade/{atividade}', 'destroy')->name('activity.destroy');
        });
        //Activity Response controller routes
        Route::controller(ActivityResponseController::class)->group(function () {
            Route::get('/respostas-atividades/', 'index')->name('responseacty.index');
            Route::get('/reposta-atividade/{atividade}', 'showActivityResponse')->name('responseacty.show');
        });
    });
});
//Routes for authentication
Route::controller(AuthController::class)->group(function () {
    Route::get('/login/', 'loginIndex')->name('authlogin.index');
    Route::post('/login/entrando/', 'loginStore')->name('authlogin.store');
    Route::post('/login/    logout/', 'logout')->name('authlogout.logout');
    Route::get('/registrar-se/', 'registerIndex')->name('authregister.index');
    Route::post('/registar-se/registrando', 'registerStore')->name('authregister.store');
});
