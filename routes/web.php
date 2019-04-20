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

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@save');

Route::view('/examples/blank', 'examples.blank');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('dams', 'DamController');

Route::resource('sensors', 'SensorController');
Route::get('/sensors/reading/{sensor_id}/{value}','SensorController@reading');

Route::get('/dam_report', 'DamReportController@index');
Route::post('/dam_report', 'DamReportController@search');