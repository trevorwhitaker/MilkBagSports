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

Route::get('posts', ['as' => 'posts.index', 'uses' => 'PostController@index']);

Route::post('posts', ['as' => 'posts.store', 'uses' => 'PostController@store']);

Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'PostController@create', 'roles' => ['Admin', 'Author']])->middleware('roles');

Route::get('posts/{posts}', ['as' => 'posts.show', 'uses' => 'PostController@show']);

Route::get('posts/{posts}/edit', ['as' => 'posts.edit', 'uses' => 'PostController@edit', 'roles' => ['Admin', 'Author']])->middleware('roles');

Route::get('posts/tags/{tag}', ['as' => 'posts.getPostByTag', 'uses' => 'PostController@getPostByTag']);

Route::get('posts/author/{author}', ['as' => 'posts.getPostByAuthor', 'uses' => 'PostController@getPostByAuthor']);

Route::delete('posts/{posts}', ['as' => 'posts.destroy', 'uses' => 'PostController@destroy', 'roles' => ['Admin', 'Author']])->middleware('roles');

Route::put('posts/{posts}', ['as' => 'posts.update', 'uses' => 'PostController@update', 'roles' => ['Admin', 'Author']])->middleware('roles');

Route::get('/', 'PageController@getIndex');

Route::get('/week/{week}', ['as' => 'week', 'uses' => 'PageController@find_week_index']);

Route::get('/AboutUs', 'PageController@getAboutUs');

Route::get('/legal', 'PageController@getlegal');

// Session routes

Route::get('/authorsignin', ['as' => 'auth.index', 'uses' => 'UserController@getIndex']);

Route::get('/authorlogout', ['as' => 'auth.logout', 'uses' => 'UserController@logout', 'roles' => ['Admin', 'Author']])->middleware('roles');

Route::post('/authorsignin', ['as' => 'auth.signin', 'uses' => 'UserController@signin']);

Route::get('/authorchangepassword', ['as' => 'auth.getChangePassword', 'uses' => 'UserController@getChangePassword', 'roles' => ['Admin', 'Author']])->middleware('roles');

Route::post('/authorchangepassword', ['as' => 'auth.changePassword', 'uses' => 'UserController@changePassword', 'roles' => ['Admin', 'Author']])->middleware('roles');

// Admin routes

Route::get('admindashboard', ['as' => 'admin.index', 'uses' => 'AdminController@getIndex', 'roles' => ['Admin']])->middleware('roles');

Route::get('admindashboard/authors', ['as' => 'admin.getAuthors', 'uses' => 'AdminController@getAuthors', 'roles' => ['Admin']])->middleware('roles');

Route::get('admindashboard/authors/edit/{id}', ['as' => 'admin.editAuthor', 'uses' => 'AdminController@editAuthor', 'roles' => ['Admin']])->middleware('roles');

Route::get('admindashboard/authors/create', ['as' => 'admin.addAuthor', 'uses' => 'AdminController@addAuthor', 'roles' => ['Admin']])->middleware('roles');

Route::post('admindashboard/authors/create', ['as' => 'admin.createAuthor', 'uses' => 'AdminController@createAuthor', 'roles' => ['Admin']])->middleware('roles');

Route::post('admindashboard/authors/{id}/edit', ['as' => 'admin.updateAuthor', 'uses' => 'AdminController@updateAuthor', 'roles' => ['Admin']])->middleware('roles');

Route::delete('admindashboard/authors/{id}', ['as' => 'admin.deleteAuthor', 'uses' => 'AdminController@deleteAuthor', 'roles' => ['Admin']])->middleware('roles');

// Author routes
Route::get('/authordashboard', ['as' => 'author.index', 'uses' => 'AdminController@getAuthorDashboard', 'roles' => ['Admin', 'Author']])->middleware('roles');
