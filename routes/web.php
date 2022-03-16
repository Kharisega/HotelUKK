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
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//! Route khusus untuk Admin
Route::middleware('role:admin')->resource('kamar', 'KamarController');  
Route::middleware('role:admin')->resource('fkamar', 'FkamarController');  
Route::middleware('role:admin')->resource('fhotel', 'FhotelController');
Route::middleware('role:admin')->resource('admin', 'AdminController');
Route::middleware('role:admin')->resource('resepsionis', 'ResepsionisController');


//! Route khusus untuk Resepsionis
// Route::middleware('role:resepsionis')->resource('kartu', 'KartuController');