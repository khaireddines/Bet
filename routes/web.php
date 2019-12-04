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

use App\Http\Controllers\EventController;

Route::group(['middleware' => ['auth']], function () {
Route::get('/admin/resources','VehiculeController@index')->name('resources');
Route::post('/newveh','VehiculeController@store')->name('newveh');
Route::post('/neweve','EventController@store')->name('neweve');
Route::get('/editform/{id}','VehiculeController@edit')->name('editform');
Route::post('/updateVeh/{id}','VehiculeController@update')->name('updateVeh');
Route::get('/delVeh/{id}','VehiculeController@destroy')->name('delVeh');
Route::get('/delEve/{id}','EventController@destroy')->name('delEve');
Route::get('/editformEve/{id}','EventController@edit')->name('editformEve');
Route::post('/updateEve/{id}','EventController@update')->name('updateEve');
Route::post('/updateBet','VehiculeController@updateBet')->name('updateBet');
Route::get('/Mybets','HomeController@BetList')->name('BetList');
Route::get('/cancelBet/{user_id}/{object_id}','HomeController@cancelBet')->name('cancelBet');
Route::post('/modifyBet/{user_id}/{object_id}','HomeController@modifyBet')->name('modifyBet');
});
Route::get('/','VehiculeController@showallVeh')->name('clientview');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

