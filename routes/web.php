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
    return view('welcome');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('leads','LeadController');
    Route::resource('products','ProductController');
    Route::get('deals/open', 'DealController@open')->name('deals.open');
    Route::get('deals/closed', 'DealController@closed' )->name('deals.closed');
    Route::get('deals/deadline', 'DealController@deadline')->name('deals.deadline');
    Route::get('chats/form/{id}','ChatController@showForm')->name('chats.form');
    Route::post('chats/store','ChatController@storeChat')->name('chats.store');
});

