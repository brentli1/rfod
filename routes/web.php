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
            'uses' => 'CategoryController@adminShow',
            'as' => 'admin.categories.show'
        ]);

        Route::post('/new', [
            'uses' => 'CategoryController@create',
            'as' => 'admin.categories.create'
        ]);
    
        Route::post('/{id}', [
            'uses' => 'CategoryController@edit',
            'as' => 'admin.categories.edit'
        ]);

        Route::delete('/{id}', [
            'uses' => 'CategoryController@delete',
            'as' => 'admin.categories.destroy'
        ]);
    });

    Route::group(['prefix' => 'movies'], function() {
        Route::get('/', [
            'uses' => 'MovieController@index',
            'as' => 'admin.movies.index'
        ]);

        Route::get('/{id}', [
            'uses' => 'MovieController@show',
            'as' => 'admin.movies.show'
        ]);
    });
});
