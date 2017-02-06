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

Route::group(['middleware'=>['web']], function()
{
	Route::get('/', function () {
    return view('welcome');
});

Route::get('movies/add', 'MoviesController@add');

Route::post('movies/add', 'MoviesController@store');

Route::get('movies', 'MoviesController@view');

Route::delete('movies/{movie}/remove', 'MoviesController@delete');

Route::get('{user}/edit-info', 'UserController@editInfo');

Route::get('{user}/edit-info/name', 'UserController@editName');

Route::get('{user}/edit-info/birthdate', 'UserController@editBirthdate');

Route::get('{user}/edit-info/email', 'UserController@editEmail');

Route::get('{user}/edit-info/password', 'UserController@editPassword');

Route::patch('{user}/edit-info/name', 'UserController@updateName');

Route::patch('{user}/edit-info/birthdate', 'UserController@updateBirthdate');

Route::patch('{user}/edit-info/email', 'UserController@updateEmail');

Route::patch('{user}/edit-info/password', 'UserController@updatePassword');

Route::get('{user}/reviews', 'UserController@reviews');


//__________________________________________________________________//

Route::get('review','ReviewsController@review');
Route::post('Review/Post','ReviewsController@store');
Route::get('/Reviews/{movie}/update','ReviewsController@edit');
Route::patch('/Reviews/{movie}/update','ReviewsController@Update');
Route::get('Review/Remove','ReviewsController@remove'); // Delete later 
Route::delete('Reviews/{movie}/remove','ReviewsController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
