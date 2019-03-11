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

Route::get('/',[
       'uses' => 'FrontController@index',
       'as'   => 'welcome'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('category/{id}',[
       'uses' => 'FrontController@category',
       'as'   => 'category_single'
]);

Route::get('tag/{id}',[
       'uses' => 'FrontController@tag',
       'as'   => 'tag_single'
]);

Route::get('post/{id}',[
       'uses' => 'FrontController@post',
       'as'   => 'post_single'
]);

Route::group(['perfix' => 'admin' , 'middleware' => 'auth'] , function(){
    Route::get('/index', [
    	'uses' => 'postsController@index_admin',
    	'as'   => 'index'
    ]);

    Route::get('/categories/index', [
    	'uses' => 'categoriesController@index',
    	'as'   => 'category.index'
    ]);

    Route::get('/categories/create', [
    	'uses' => 'categoriesController@create',
    	'as'   => 'category.create'
    ]);

    Route::post('/categories/store', [
    	'uses' => 'categoriesController@store',
    	'as'   => 'category.store'
    ]);

    Route::get('/categories/edit/{id}' ,[
        'uses' => 'categoriesController@edit',
        'as'   => 'category.edit'
    ]);

    Route::post('/categories/update/{id}', [
        'uses' => 'categoriesController@update',
        'as'   => 'category.update'
    ]);

    Route::get('/categories/delete/{id}', [
        'uses' => 'categoriesController@destroy',
        'as'   => 'category.delete'
    ]);

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as'   => 'users'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as'   => 'user.delete'
    ]);
    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as'   => 'user.create'
    ]);

    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as'   => 'user.store'
    ]);
    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@Auth_admin',
        'as'   => 'user.admin'
    ]);

    Route::get('/user/non_admin/{id}', [
        'uses' => 'UsersController@Auth_non_admin',
        'as'   => 'user.non.admin'
    ]);

    Route::get('/setting', [
        'uses' => 'SettingsController@edit',
        'as' => 'setting.index'
    ]);

    Route::post('/setting/edit', [
        'uses' => 'SettingsController@update',
        'as' => 'setting.store'
    ]);

    Route::get('/user/profile', [
        'uses' => 'ProfileController@profile',
        'as' => 'user.profile'
    ]);

    Route::post('/user/profile/udpate',[
        'uses' => 'ProfileController@profile_update',
        'as' => 'user.profile.update'
    ]);


    Route::resource('posts', 'postsController');
    Route::resource('Tag', 'TagsController');

});