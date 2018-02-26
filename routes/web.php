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

Route::get('/comments/{id}', 'CommentController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts/create', 'PostsController@create');
    Route::get('/sections/create', 'SectionController@create');
    Route::post('/posts/{post}/comments', 'CommentController@save');
    Route::post('/posts', 'PostsController@save');
	Route::delete('/comments/{id}', 'CommentController@delete');
});

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/', 'SectionController@index');
Route::get('/sections/{section}', 'SectionController@show');


Route::get('/event', function () {
    event(new \App\Events\UserRegistered(\App\User::first()));
});
Route::get('/verify/{token}', function($token) {
    User::where('token', $token)->update(['verified' => true]);
});

Auth::routes();