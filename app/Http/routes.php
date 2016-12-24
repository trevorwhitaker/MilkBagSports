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

Route::get('posts/tags/{tag}', ['as' => 'posts.getPostByTag', 'uses' => 'PostController@getPostByTag']);

Route::delete('posts/{posts}', ['as' => 'posts.destroy', 'uses' => 'PostController@destroy'])->middleware('auth.basic');

Route::put('posts/{posts}', ['as' => 'posts.update', 'uses' => 'PostController@update'])->middleware('auth.basic');

Route::get('/', 'PageController@getIndex');

Route::get('/AboutUs', 'PageController@getAboutUs');
