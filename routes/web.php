<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create-todo', 'HomeController@storeTodo');
Route::get('/getTodosForUser', 'HomeController@getTodosForUser');
Route::post('/removeTodo', 'HomeController@removeTodo');
Route::get('/editTodo/{id}', 'HomeController@edit');
Route::post('updateTodo/{id}', 'HomeController@update')->name('todo.update');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/edit', 'AdminController@edit')->name('admin.edit');
});
