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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {    
    Route::get('/', [
        'uses' => 'AdminController@index',
        'as' => 'admin'
    ]);

    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [
            'uses' => 'CategoryController@adminIndex',
            'as' => 'admin.categories.index'
        ]);

        Route::get('/new', [
            'uses' => 'CategoryController@new',
            'as' => 'admin.categories.new'
        ]);
    
        Route::get('/{id}', [
            'uses' => 'CategoryController@edit',
            'as' => 'admin.categories.edit'
        ]);

        Route::post('/new', [
            'uses' => 'CategoryController@create',
            'as' => 'admin.categories.create'
        ]);
    
        Route::post('/{id}', [
            'uses' => 'CategoryController@update',
            'as' => 'admin.categories.update'
        ]);

        Route::delete('/{id}', [
            'uses' => 'CategoryController@delete',
            'as' => 'admin.categories.destroy'
        ]);
    });

    Route::group(['prefix' => 'movies'], function() {
        Route::get('/', [
            'uses' => 'MovieController@adminIndex',
            'as' => 'admin.movies.index'
        ]);

        Route::get('/new', [
            'uses' => 'MovieController@new',
            'as' => 'admin.movies.new'
        ]);

        Route::get('/{id}', [
            'uses' => 'MovieController@edit',
            'as' => 'admin.movies.edit'
        ]);

        Route::post('/new', [
            'uses' => 'MovieController@create',
            'as' => 'admin.movies.create'
        ]);
    
        Route::post('/{id}', [
            'uses' => 'MovieController@update',
            'as' => 'admin.movies.update'
        ]);

        Route::delete('/{id}', [
            'uses' => 'MovieController@delete',
            'as' => 'admin.movies.destroy'
        ]);
    });

    Route::group(['prefix' => 'reviews'], function() {
        Route::get('/', [
            'uses' => 'ReviewController@adminIndex',
            'as' => 'admin.reviews.index'
        ]);

        Route::get('/new', [
            'uses' => 'ReviewController@new',
            'as' => 'admin.reviews.new'
        ]);

        Route::get('/{id}', [
            'uses' => 'ReviewController@edit',
            'as' => 'admin.reviews.edit'
        ]);

        Route::post('/new', [
            'uses' => 'ReviewController@create',
            'as' => 'admin.reviews.create'
        ]);
    
        Route::post('/{id}', [
            'uses' => 'ReviewController@update',
            'as' => 'admin.reviews.update'
        ]);

        Route::delete('/{id}', [
            'uses' => 'ReviewController@delete',
            'as' => 'admin.reviews.destroy'
        ]);
    });
});
