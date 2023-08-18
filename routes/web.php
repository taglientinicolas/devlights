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
    return view('app');
});

Auth::routes();

Route::get('/deals', 'DealsController@index')->name('deals.index');
Route::get('/deals/{id}/edit', 'DealsController@edit')->name('deals.edit');
Route::put('/deals/{deal}', 'DealsController@update')->name('deals.update');
Route::delete('/deals/{deal}', 'DealsController@destroy')->name('deals.destroy');
Route::get('/deals/create', 'DealsController@create')->name('deals.create');
Route::post('/deals', 'DealsController@store')->name('deals.store');

