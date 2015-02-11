<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

Route::get('/', function () {
		return View::make('hello');
	});
Route::resource('internos', 'InternosController');
Route::resource('frequencia', 'InternoFrequenciaController');
Route::resource('setors', 'SetorsController');

Route::get('reports/horaInterno', function () {
		return View::make('reports.horaInterno');
	});

Route::get('report/{id}/{mesano}/horasInterno', 'ReportsController@horasTrabInterno');
Route::get('report/{datai}/{dataf}/horasSetor', 'ReportsController@horasTrabSetor');
Route::get('reports', 'ReportsController@getReports');
Route::get('report/{data}/produtividade', 'ReportsController@getProdutividade');
Route::get('report/{data}/ponto', 'ReportsController@getPonto');