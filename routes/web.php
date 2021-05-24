<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomesController@index');
Route::get('/courses', 'CoursesController@index');
Route::get('/majors', 'MajorsController@index');
Route::post('/courses', 'CoursesController@store');
Route::post('/majors', 'MajorsController@store');
