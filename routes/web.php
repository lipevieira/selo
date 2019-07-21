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

Route::get('/', 'Institution\InstitutionController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'empresa', 'namespace' => 'Institution'], function(){
   Route::get('/', 'InstitutionController@index')->name('index.company');
   Route::get('cronograma/ações', 'InstitutionController@getSheduleActions')->name('cronograma.actions');
});
