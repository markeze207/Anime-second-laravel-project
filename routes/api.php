<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'API', 'middleware' => 'jwt.auth'], function() {
    Route::group(['namespace' => 'Anime'], function() {
        Route::get('/anime', 'AnimeController@index')->name('anime.index');
        Route::get('/anime/{anime}', 'AnimeController@show')->name('anime.show');
        Route::group(['namespace' => 'Admin', 'prefix'=>'admin'], function() {
            Route::group(['namespace' => 'Anime'], function() {
                Route::post('/anime/create', 'AnimeController@store')->name('admin.anime.store');
                Route::patch('/anime/{anime}', 'AnimeController@update')->name('admin.anime.update');
                Route::delete('/anime/{anime}', 'AnimeController@destroy')->name('admin.anime.destroy');
            });
        });
    });
});
