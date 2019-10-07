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
Route::group(['prefix' => 'home', 'namespace' => 'Home', 'middleware' => 'auth'], function () {
   Route::get('/', 'HomeController@index')->name('home');
   Route::get('/perfil-collaborator', 'HomeController@getProfileCollaborator')->name('home.profile');
   Route::get('/nivel-atividade', 'HomeController@getActivitLevelCollaborator')->name('home.activit.level');
   Route::get('/perfil-membros-comissão', 'HomeController@getCommissionMembers')->name('home.membros.comissao');
   Route::get('/cronograma', 'HomeController@getSchedules')->name('home.schedules');
   Route::get('/detalhes-instituição/{id}', 'HomeController@getInstituitionDetails')->name('home.details.institution');
   Route::get('/user-index', 'HomeController@getIndexUser')->name('home.index.user');
   Route::get('show/document/{name}', 'HomeController@show')->name('home.document.show');

});

/**
 * @description: Rotas para instituições
 */
Route::group(['prefix' => 'institution', 'namespace' => 'Institution'], function () {
   Route::get('/', 'InstitutionController@index')->name('index.company');
   Route::get('/start', 'InstitutionController@start')->name('start.register');
   Route::post('salvar', 'InstitutionController@saveAllInstutition')->name('save.institution');
   /**
    * Rotas para Instituições logados
    */
   Route::group(['middleware'  =>  'auth.institution:client'], function () {
      Route::post('/update', 'InstitutionController@update')->name('update.institution');
   });
});
/***
 * @description Autenticação da Instituição
 */
Route::group(['prefix' => 'autentication-client', 'namespace' => 'Client'], function () {
   Route::get('show', 'ClientController@showLogin')->name('login.client');
   Route::post('/auth', 'ClientController@clientLogin')->name('client.auth');

   /**
    * Rotas para Instituições logados
    */
   Route::group(['middleware'  =>  'auth.institution:client'], function () {
      Route::get('index', 'ClientController@index')->name('index.client');
      Route::get('/logout', 'ClientController@logout')->name('logout');
   });
});


/***
 * @description: Rotas para editar o diagnostico censitario
 */
Route::group(['prefix' => 'nivel-collaboradores-atividade', 'namespace' => 'CollaboratorActivityLevel'], function () {
   /**
    * Rotas para Instituições logados
    */
   Route::group(['middleware'  =>  'auth.institution:client'], function () {
      Route::get('/', 'CollaboratorActivityLevelController@getDiagnosticoCensitarioEdit')->name('show.edit.cencisitario');
      Route::put('/update', 'CollaboratorActivityLevelController@update')->name('update.censitario');
      // Route::post('/update/cencitário', 'CollaboratorActivityLevelController@updateDiagnostico')->name('edit.censitario');
      Route::get('/diagnostico-censiratio', 'CollaboratorActivityLevelController@index')->name('diagnostico.censitario.index');
   });
});

/***
 * Rotas para Repostas do Diagnóstico censitário
 */
Route::group(['prefix' => 'reposta', 'namespace' => 'Answer'], function () {
   /**
    * Rotas para Instituições logados
    */
   Route::group(['middleware'  =>  'auth.institution:client'], function () {
      Route::post('/', 'AnswerController@show')->name('show.edit.answer');
   });
});
/***
 * Rotas Membros da comissão
 */
Route::group(['prefix' => 'membros-comissão', 'namespace' => 'CommissionMembers'], function () {
   /**
    * Rotas para Instituições logados
    */
   Route::group(['middleware'  =>  'auth.institution:client'], function () {
      Route::get('/index', 'CommissionMembersController@index')->name('auth.membrers');
      Route::get('/show', 'CommissionMembersController@show')->name('show.comission');
      Route::post('/update', 'CommissionMembersController@update')->name('update.comission');
   });
});


/***
 * @Description: Rotas para o Cronograma
 */
Route::group(['prefix' => 'auth-cronograma', 'namespace' => 'Schedule', 'middleware'  =>  'auth.institution:client'], function () {
      Route::get('/index', 'ScheduleController@index')->name('get.shedule.index');
      Route::get('/show/insert', 'ScheduleController@getSheduleInsert')->name('show.schedule.insert');
      Route::post('/store', 'ScheduleController@store')->name('schedule.store');
      Route::get('/show/{id}', 'ScheduleController@showSchedule')->name('showSchedule');
      Route::post('/update', 'ScheduleController@update')->name('schedule.update');
});

/***
 * Rotas para filiais da instituição autenticada
 * TO-DE Fazer: add middleware de auth para todas as rotas da instituição
 */
Route::group(['prefix' => 'filiais', 'namespace' => 'Branche', 'middleware'  =>  'auth.institution:client'], function () {
      Route::post('/', 'BrancheController@store')->name('branche.store');
      Route::get('index', 'BrancheController@index')->name('get.branches.index');
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
 * @description rotas para o menu de 
 * documentos de instituições cadastradas
 */
Route::group(['prefix' => 'documentos', 'namespace' => 'Document', 'middleware'  =>  'auth.institution:client'], function () {
   Route::get('/', 'DocumentController@index')->name('doc.index');
   Route::post('save', 'DocumentController@saveDoc')->name('save.doc');
   Route::get('show/document/{name}', 'DocumentController@show')->name('document.show');
   Route::get('show/anexo01', 'DocumentController@downloandAnexoOne')->name('anexo01.show');
   Route::get('downloand/anexo06', 'DocumentController@downloandAnexoSix')->name('anexo06.show');
   Route::get('show/anexo07', 'DocumentController@downloandAnexoServen')->name('anexo07.show');
});

/***
 * @description rotas para notificação
 */
Route::group(['prefix' => 'notifications', 'namespace' => 'Notification', 'middleware' => 'auth'], function () {
   Route::get('/', 'NotificationController@notificationRegisterInstitution')->name('notification.institution');
});
