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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','EventController@showPlanOfWeek')->name('default');
Route::get('/trainning/vuejs','VueJsController@index')->name('vue.index');
Route::get('/planning/{annee}/{mois}/{jour}','EventController@showPlanOfWeek')->name('index');
Route::get('/planning/mensuel','EventController@showPlanOfMonth')->name('mensuel');
Route::post('/planning/add','EventController@addPlanning')->name('plan.add');
Route::get('/planning/redirect','EventController@performPlan')->name('plan.redirect');
