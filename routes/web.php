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
    return view('home');
});



Route::get('', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/producto/registrar','ProductoController@registrar_producto_BD')->middleware('auth');
Route::get('/producto/registrar','ProductoController@registrar_producto')->name('add')->middleware('auth');
Route::get('/producto/modificar','ProductoController@modificar_producto')->name('edit')->middleware('auth');
Route::post('/producto/modificar','ProductoController@modificar_producto_BD')->name('edit')->middleware('auth');

Route::get('/producto/vender','ProductoController@vender_producto')->name('vender')->middleware('auth');


Route::get('/spa', function () {
    return view('spa');
});
Auth::routes();
