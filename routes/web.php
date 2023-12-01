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


Route::get('/', function () {
    return view('index');
})->name('index');


Route::resource('info', 'InfoController');
Route::resource('mamb', 'MambController');
Route::resource('mec', 'MecController');

Route::prefix('/site')->group(function() {
    Route::get('/info', 'SiteController@getInfo')->name('site.info');
    Route::get('/mamb', 'SiteController@getMamb')->name('site.mamb');
    Route::get('/mec', 'SiteController@getMec')->name('site.mec');
});