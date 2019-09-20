<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'Institution\InstitutionController@welcome')->name('welcome');

Auth::routes();
/***
 * Salvando Usuario
 */
Route::post('/user-register', 'Auth\RegisterController@create')->name('user.register');

/***
 * @description: Rotas para Home
 */
Route::group(['prefix' => 'home', 'namespace' => 'Home', 'middleware' => 'auth'],function(){
   Route::get('/', 'HomeController@index')->name('home');
   Route::get('/perfil-collaborator', 'HomeController@getProfileCollaborator')->name('home.profile');
   Route::get('/perfil-membros-comissão', 'HomeController@getCommissionMembers')->name('home.membros.comissao');
   Route::get('/cronograma', 'HomeController@getSchedules')->name('home.schedules');
   Route::get('/detalhes-instituição/{id}', 'HomeController@getInstituitionDetails')->name('home.details.institution');
   Route::get('/user-index', 'HomeController@getIndexUser')->name('home.index.user');
 
   
});

/**
 * @description: Rotas para instituições
 */
Route::group(['prefix' => 'empresa', 'namespace' => 'Institution'], function(){
   Route::get('/', 'InstitutionController@index')->name('index.company');
   Route::post('salvar', 'InstitutionController@saveAllInstutition')->name('save.institution');

   Route::post('/update', 'InstitutionController@update')->name('update.institution');

   Route::get('login', 'InstitutionController@showLogin')->name('login.institution');
   Route::get('login/access', 'InstitutionController@auth')->name('auth.institution');
   Route::get('login/membros-comissão', 'InstitutionController@getMembrersComission')->name('auth.membrers');

   Route::get('login/diagnostico-censiratio', 'InstitutionController@getDiagnosticoCensitario')->name('auth.get.diagnostico.censitario');
   Route::get('login/diagnostico-cronograma', 'InstitutionController@getShedule')->name('auth.get.shedule');
   Route::get('login/diagnostico-branches', 'InstitutionController@getBranches')->name('auth.get.branches');

});

/***
 * @description: Rotas para editar o diagnostico censitario
 */
Route::group(['prefix' => 'nivel-collaboradores-atividade', 'namespace' => 'CollaboratorActivityLevel'], function () {
   Route::get('/', 'CollaboratorActivityLevelController@getDiagnosticoCensitarioEdit')->name('show.edit.cencisitario');
   Route::put('/update', 'CollaboratorActivityLevelController@update')->name('update.censitario');
   // Route::post('/update/cencitário', 'CollaboratorActivityLevelController@updateDiagnostico')->name('edit.censitario');
});

/***
 * Rotas para Repostas do Diagnóstico censitário
 */
Route::group(['prefix' => 'reposta', 'namespace' => 'Answer'], function () {
   Route::post('/', 'AnswerController@show')->name('show.edit.answer');
   
});
/***
 * Rotas Membros da comissão
 */
Route::group(['prefix' => 'membros-comissão', 'namespace' => 'CommissionMembers'], function () {
   Route::get('/show', 'CommissionMembersController@show')->name('show.comission');
   Route::post('/update', 'CommissionMembersController@update')->name('update.comission');
   
});


/***
 * @Description: Rotas para o Cronograma
 */
Route::group(['prefix' => 'auth-cronograma', 'namespace' => 'Schedule'], function () {
   // Route::get('/', 'CollaboratorActivityLevelController@getDiagnosticoCensitarioEdit')->name('show.edit.cencisitario');
   Route::get('/show/insert', 'ScheduleController@getSheduleInsert')->name('show.schedule.insert');
   Route::post('/store', 'ScheduleController@store')->name('schedule.store');
   Route::get('/show/{id}', 'ScheduleController@showSchedule')->name('showSchedule');
   Route::post('/update', 'ScheduleController@update')->name('schedule.update');

});

/***
 * Rotas para filiais da instituição autenticada
 * TO-DE Fazer: add middleware de auth para todas as rotas da instituição
 */
Route::group(['prefix' => 'filiais', 'namespace' => 'Branche'], function () {
   Route::post('/', 'BrancheController@store')->name('branche.store');
   Route::get('/show', 'BrancheController@show')->name('branche.show');
   Route::post('/update', 'BrancheController@update')->name('branche.update');
   Route::post('/delete', 'BrancheController@delete')->name('branche.delete');
});

/***
 * @description: Rotas para ActionSheduleController
 */
Route::group(['prefix' => 'ações', 'namespace' => 'Shedule'], function () {
   Route::get('/cronograma', 'SheduleActionController@index')->name('index.shedule.action');
   Route::post('/save', 'SheduleActionController@store')->name('store.shedule.action');
   Route::get('/show', 'SheduleActionController@showAction')->name('show.shedule.action');
   Route::post('/update', 'SheduleActionController@update')->name('update.shedule.action');
   Route::post('/delete', 'SheduleActionController@delete')->name('delete.shedule.action');
});
/***
 * @description rotas para notificação
 */
Route::group(['prefix' => 'notifications', 'namespace' => 'Notification','middleware' => 'auth'], function () {
   Route::get('/', 'NotificationController@notificationRegisterInstitution')->name('notification.institution');
   
});
