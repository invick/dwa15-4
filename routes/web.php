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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('tasks', 'TaskController',  ['except' => ['show']]);
    Route::get('tasks/{task}/mark-as-done', 'TaskController@markAsDone')->name('mark-as-done');
    Route::get('tasks/{task}/mark-as-undone', 'TaskController@markAsUndone')->name('mark-as-undone');

});


