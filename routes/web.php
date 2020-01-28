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

Route::get('/', 'PostController@index')->name('login');
Route::get('/post/{post}', 'PostController@post');


Route::get('/login', 'AuthController@login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'AuthController@register');
Route::post('/postregister', 'AuthController@postregister');
Route::post('/post/{id}/postcomment', 'CommentController@postcomment');
Route::get('/deletecom/{id}', 'CommentController@delete');
Route::get('/category/{id}', 'CategoryController@show');


Route::group(['middleware' => ['auth','checkRole:admin']], function() {
	Route::get('/dashboard', 'PostController@dashboard');
	Route::get('/dashboard/newpost', 'PostController@newpost');
	Route::post('/dashboard/create', 'PostController@create');
	Route::get('/edit/{id}', 'PostController@edit');
	Route::post('/update/{id}', 'PostController@update');
	Route::get('/delete/{id}', 'PostController@delete');

	Route::get('/dashboard/category', 'CategoryController@index');
	Route::post('/dashboard/category/create', 'CategoryController@add');
	// Route::get('/dashboard/category/edit/{id}', 'CategoryController@edit');
	Route::get('/dashboard/category/delete/{id}', 'CategoryController@delete');


});