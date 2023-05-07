<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AnimeController@index')->name('anime.index');

Route::get('/show/{anime}', 'AnimeController@show')->name('anime.show');

Route::group(['namespace' => 'Admin', 'prefix'=>'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::group(['namespace' => 'Anime'], function() {
        Route::get('/anime', 'AnimeController@index')->name('admin.anime.index');
        Route::get('/anime/create', 'AnimeController@create')->name('admin.anime.create');
        Route::post('/anime/create', 'AnimeController@store')->name('admin.anime.store');
        Route::get('/anime/{anime}/edit', 'AnimeController@edit')->name('admin.anime.edit');
        Route::patch('/anime/{anime}', 'AnimeController@update')->name('admin.anime.update');
        Route::delete('/anime/{anime}', 'AnimeController@destroy')->name('admin.anime.destroy');
    });
    Route::group(['namespace' => 'Voiceovers'], function() {
        Route::get('/voiceovers', 'VoiceoversController@index')->name('admin.voiceovers.index');
        Route::get('/voiceovers/create', 'VoiceoversController@create')->name('admin.voiceovers.create');
        Route::post('/voiceovers/create', 'VoiceoversController@store')->name('admin.voiceovers.store');
        Route::get('/voiceovers/{voiceover}/edit', 'VoiceoversController@edit')->name('admin.voiceovers.edit');
        Route::patch('/voiceovers/{voiceover}', 'VoiceoversController@update')->name('admin.voiceovers.update');
        Route::delete('/voiceovers/{voiceover}', 'VoiceoversController@destroy')->name('admin.voiceovers.destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
