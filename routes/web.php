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
})->name('welcome');
Route::get('/lengkap', function () {
    return view('fasilitas.semua');
})->name('lengkap');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dash', 'CobaController@index')->name('dash');
Route::middleware('auth')->get('/tamu', 'TamuController@index')->name('tamu');
Route::post('/tamu/pesan', 'TamuController@pesan')->name('tamu.pesan');
Route::get('/tamu/pesanan', 'TamuController@pesanan')->name('tamu.pesanan');
Route::post('/tamu/reservasi', 'TamuController@reservasi')->name('tamu.reservasi');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//! Route untuk Tamu
Route::post('/tamu/cetak/{id_reservasi}', 'TamuController@cetak')->name('tamu.cetak');
Route::get('/tamu/hotel', 'LihatController@hotel')->name('tamu.hotel');
Route::get('/tamu/superior', 'LihatController@superior')->name('tamu.superior');
Route::get('/tamu/deluxe', 'LihatController@deluxe')->name('tamu.deluxe');
Route::delete('tamu/destroy/{reservasi}', 'TamuController@destroy')->name('tamu.destroy');  

//! Route khusus untuk Admin
Route::middleware('role:admin')->resource('kamar', 'KamarController');  
Route::middleware('role:admin')->resource('fkamar', 'FkamarController');  
Route::middleware('role:admin')->resource('fhotel', 'FhotelController');
Route::middleware('role:admin')->resource('admin', 'AdminController');
Route::middleware('role:admin')->resource('resepsionis', 'ResepsionisController');

//! Route khusus untuk Resepsionis
Route::middleware('role:resepsionis')->get('reservasi', 'ReservasiController@index')->name('reservasi.index');  
Route::middleware('role:resepsionis')->post('reservasi/cari', 'ReservasiController@cari')->name('reservasi.cari');  
Route::middleware('role:resepsionis')->post('reservasi/filter', 'ReservasiController@filter')->name('reservasi.filter');  
Route::middleware('role:resepsionis')->delete('reservasi/destroy/{reservasi}', 'ReservasiController@destroy')->name('reservasi.destroy');  

Route::middleware('role:resepsionis')->get('reservasi/cari2', 'ReservasiController@cari2')->name('reservasi.cari2');  
Route::middleware('role:resepsionis')->post('reservasi/cari3', 'ReservasiController@cari3')->name('reservasi.cari3');  