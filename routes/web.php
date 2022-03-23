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
Route::middleware('auth')->get('/tamu', 'TamuController@index')->name('tamu');
Route::post('/tamu/pesan', 'TamuController@pesan')->name('tamu.pesan');
Route::post('/tamu/reservasi', 'TamuController@reservasi')->name('tamu.reservasi');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//! Route khusus untuk Admin
Route::middleware('role:admin')->resource('kamar', 'KamarController');  
Route::middleware('role:admin')->resource('fkamar', 'FkamarController');  
Route::middleware('role:admin')->resource('fhotel', 'FhotelController');
Route::middleware('role:admin')->resource('admin', 'AdminController');
Route::middleware('role:admin')->resource('resepsionis', 'ResepsionisController');

// Route::middleware('role:resepsionis','role:admin')->get('reservasi', 'ReservasiController@index')->name('reservasi.index');  
// Route::middleware('role:resepsionis','role:admin')->post('reservasi/cari', 'ReservasiController@cari')->name('reservasi.cari');  
// Route::middleware('role:resepsionis','role:admin')->post('reservasi/filter', 'ReservasiController@filter')->name('reservasi.filter');  

//! Route khusus untuk Resepsionis
// Route::middleware('role:resepsionis')->resource('reservasi', 'ReservasiController');
Route::middleware('role:resepsionis')->get('reservasi', 'ReservasiController@index')->name('reservasi.index');  
Route::middleware('role:resepsionis')->post('reservasi/cari', 'ReservasiController@cari')->name('reservasi.cari');  
Route::middleware('role:resepsionis')->post('reservasi/filter', 'ReservasiController@filter')->name('reservasi.filter');  