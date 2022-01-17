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




// route regular expression
/**
 * Route ini akan meminta parameter dengan syarat tertentu, bisa berupa angka saja atau pun kombinasi antar angka dengan huruf. Saya ambil contoh untuk parameter id, saya beri kondisi bahwa id yang dimasukan harus angka saja dari angka 1-9 dengan jumlah digit bebas.TIDAK ADA KARAKTER LAIN SELAIN ANGKA,JIKA ADA MAKA HALAMAN AKAN NOT FOUND
 */
Route::get('/profile/{id}', function($id){
    return "Tampilkan user dengan id = $id";
})->where('id', '[0-9]+');




// masih regular expression, pada contoh kali ini saya akan membuat kondisi parameter dengan kombinasi 2huruf besar lalu dilanjut angka
Route::get('/detail/{id}', function($undian){
    return "nomor undian yang menang adalah $undian";
})->where('undian', '[A-Z]{2}[0-9]+');




// route redirect
// route yang mengalihkan ke route lain
Route::get('/kontak', function(){
    return "hubungi kami di nomor 88890";
});
// ketika route ini kepanggil maka akan di alihkan ke route /kontak
Route::redirect('/hubungi' , '/kontak');




// route group
/**
 * route group akan sangat membantu jika awalan route memiliki tujuan yang  sama
 * contoh :
 * Route::get('/admin/dosen', function(){return "Halaman Dosen};);
 * Route::get('/admin/mahasiswa', function(){return "Halaman Mahasiswa};);
 * Route::get('/admin/karyawan', function(){return "Halaman Karyawan};);
 * 
 * Akan lebih efektif jika menggunakan route group seperti dibawah
 */
Route::prefix('/admin')->group(function(){

    Route::get('/dosen', function(){
        return "Halaman Dosen";
    });

    Route::get('/mahasiswa', function(){
        return "Halaman Mahasiswa";
    });

    Route::get('/karyawan', function(){
        return "Halaman Karyawan";
    });

});




// route fallback
// route yang akan dipanggil jika user memasukan route yang tidak terdaftar
Route::fallback(function(){
    echo '<h2 style="text-align:center; margin-top:45px">Alamat tidak diketahui</h2>';
    echo '<h3 style="text-align:center">Mungkin maksud anda ?</h3>';
    echo '<h4 style="text-align:center">/hello</h4>';
    echo '<h4 style="text-align:center">/belajar</h4>';
});
