<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('posts/saveComment', ['as' => 'posts.saveComment', 'uses' => 'PostController@saveComment']);

Route::get('posts', ['as' => 'posts.index', 'uses' => 'PostController@index']);

Route::post('posts', ['as' => 'posts.store', 'uses' => 'PostController@store']);

Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'PostController@create'])->middleware('auth.basic');

Route::get('posts/{posts}', ['as' => 'posts.show', 'uses' => 'PostController@show']);

Route::get('posts/{posts}/edit', ['as' => 'posts.edit', 'uses' => 'PostController@edit'])->middleware('auth.basic');

Route::get('posts/tags/{tag}', ['as' => 'posts.getPostByTag', 'uses' => 'PostController@getPostByTag']);

Route::get('posts/author/{author}', ['as' => 'posts.getPostByAuthor', 'uses' => 'PostController@getPostByAuthor']);

Route::delete('posts/{posts}', ['as' => 'posts.destroy', 'uses' => 'PostController@destroy'])->middleware('auth.basic');

Route::delete('posts/deleteComment/{posts}/{title}', ['as' => 'posts.deleteComment', 'uses' => 'PostController@deleteComment'])->middleware('auth.basic');

Route::put('posts/{posts}', ['as' => 'posts.update', 'uses' => 'PostController@update'])->middleware('auth.basic');

Route::get('/', 'PageController@getIndex');

Route::get('/week/{week}', ['as' => 'week', 'uses' => 'PageController@find_week_index']);

Route::get('/AboutUs', 'PageController@getAboutUs');
