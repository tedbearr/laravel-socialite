<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'App\Http\Controllers\InputController@index');
        Route::get('/get-provider', 'App\Http\Controllers\InputController@getProvider');
        Route::post('/insert-manual', 'App\Http\Controllers\InputController@insertManual');
        Route::post('/insert-auto', 'App\Http\Controllers\InputController@insertAuto');
    
        Route::get('/output', 'App\Http\Controllers\OutputController@index');
        Route::get('/output-table', 'App\Http\Controllers\OutputController@table');
        Route::get('/output-find', 'App\Http\Controllers\OutputController@find');
        Route::post('/output-update', 'App\Http\Controllers\OutputController@update');
        Route::post('/output-delete', 'App\Http\Controllers\OutputController@deleteData');
    });
    

    Route::get('/login', 'App\Http\Controllers\SocialiteController@index');
    Route::get('/redirect', 'App\Http\Controllers\SocialiteController@redirect');
    Route::get('/auth', 'App\Http\Controllers\SocialiteController@login');
    Route::get('/logout', 'App\Http\Controllers\SocialiteController@logout');
});
