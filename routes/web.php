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


 //Auth::routes();

 // Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 // Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

 // Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'PostController@index')->name('home');

Route::name('create_post')->get('/create', 'PostController@create');
Route::name('store_post')->post('/home', 'PostController@store');
Route::name('view_post')->get('/{id}', 'PostController@show');
Route::name('edit_post')->get('/{id}/edit', 'PostController@edit');
Route::name('update_post')->put('/{id}', 'PostController@update');
Route::name('delete_post')->delete('/{id}', 'PostController@delete');

//Route::resource('comments', 'CommentController');
Route::name('store_comments')->post('/{post_id}', 'CommentController@store');
