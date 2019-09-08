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
 * @description: Rotas para Home
 */
Route::group(['prefix' => 'home', 'namespace' => 'Home', 'middleware' => 'auth'],function(){
   Route::get('/', 'HomeController@index')->name('home');
   Route::get('/perfil-collaborator', 'HomeController@getProfileCollaborator')->name('home.profile');
   Route::get('/perfil-membros-comissão', 'HomeController@getCommissionMembers')->name('home.membros.comissao');
   Route::get('/cronograma', 'HomeController@getSchedules')->name('home.schedules');
   Route::get('/detalhes-instituição/{id}', 'HomeController@getInstituitionDetails')->name('home.details.institution');
   
});

/**
 * @description: Rotas para instituições
 */
Route::group(['prefix' => 'empresa', 'namespace' => 'Institution'], function(){
   Route::get('/', 'InstitutionController@index')->name('index.company');
   Route::post('salvar', 'InstitutionController@saveAllInstutition')->name('save.institution');
   Route::get('login', 'InstitutionController@showLogin')->name('login.institution');

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
