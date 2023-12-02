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

Route::resource('/cursos', '\App\Http\Controllers\CursoController')
->middleware(['auth']);

//como definir a rota:
Route::resource('curso', 'CursoController');
Route::prefix('/site')->group(function() {
    Route::get('/curso', 'SiteController@getCurso')->name('site.curso');
    
});