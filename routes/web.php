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

Route::get('/', 'HomeController@index');


//workouts
Route::get('/workouts/{workout}', 'WorkoutsController@show');


//exercises
Route::get('/workout/{workout_id}/exercise/new', 'ExercisesController@new');
Route::post('/workout/{workout_id}/exercise/create', 'ExercisesController@create');
Route::delete('/exercise/{exercise}/destroy', 'ExercisesController@destroy');