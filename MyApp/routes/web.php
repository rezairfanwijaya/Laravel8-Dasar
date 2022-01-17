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

Route::get('/hello', function(){
    return "Hello Reza Irfan. Selamat Belajar";
});

Route::get('/belajar', function(){
    echo '<h1 style="text-align:center; margin-top:30px"> Saya Reza Irfan </h1>';
    echo '<h4 style="text-align:center"> Saya Sedang Belajar Laravel </h4>';
});

Route::get('/mahasiswa/reza', function(){
    echo '<h1 style="text-align:center"> Reza adalah seorang mahasiswa </h1>';
});

// route parameter (nama)
Route::get('/mahasiswa/{nama}', function($kamu){
    return "Profile Mahasiswa $kamu";
});

// route parameter lebih dari satu (jenis , merek)
Route::get('/stok/{jenis}/{merek}',function($jenis, $merk){
    return "Hasil Stok dari barang dengan jenis $jenis dan merek $merk";
});

// route optional parameter
// jika salah satu parameter tidak diisi maka akan digantikan dengan nilai default yang sudah didefinisikan pada parameter function yaitu $a untuk jenis dan $b untuk merk
Route::get('/stok/{jenis?}/{merk?}', function($a = "smartphone", $b="samsung"){
    return "Cek sisa stok untuk $a dengan merk $b";
});