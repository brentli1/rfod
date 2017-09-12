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

Route::get('/admin', 'AdminController@index')->name('admin');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'api'], function() {
        Route::get('/categories', 'CategoryController@apiCategories');
        Route::get('/movies', 'MovieController@apiMovies');
    });
    
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/categories', function() {
            return view('admin.categories');
        })->name('admin.categories');
    });
});
