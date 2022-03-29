<?php

use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeConstroller;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\GuitarController;
use Symfony\Component\VarDumper\VarDumper;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MahasiswaController;

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

Route::redirect('/', '/kampus');




// Route::get('/hello', function(){
//     return "Hello Reza Irfan. Selamat Belajar";
// });




// Route::get('/belajar', function(){
//     echo '<h1 style="text-align:center; margin-top:30px"> Saya Reza Irfan </h1>';
//     echo '<h4 style="text-align:center"> Saya Sedang Belajar Laravel </h4>';
// });



// route parameter (nama)
// Route::get('/mahasiswa/{nama}', function($kamu){
//     return "Profile Mahasiswa $kamu";
// });




// route parameter lebih dari satu (jenis , merek)
// Route::get('/stok/{jenis}/{merek}',function($jenis, $merk){
//     return "Hasil Stok dari barang dengan jenis $jenis dan merek $merk";
// });




// route optional parameter
// jika salah satu parameter tidak diisi maka akan digantikan dengan nilai default yang sudah didefinisikan pada parameter function yaitu $a untuk jenis dan $b untuk merk
// Route::get('/stok/{jenis?}/{merk?}', function($a = "smartphone", $b="samsung"){
//     return "Cek sisa stok untuk $a dengan merk $b";
// });




// route regular expression
/**
 * Route ini akan meminta parameter dengan syarat tertentu, bisa berupa angka saja atau pun kombinasi antar angka dengan huruf. Saya ambil contoh untuk parameter id, saya beri kondisi bahwa id yang dimasukan harus angka saja dari angka 1-9 dengan jumlah digit bebas.TIDAK ADA KARAKTER LAIN SELAIN ANGKA,JIKA ADA MAKA HALAMAN AKAN NOT FOUND
 */
// Route::get('/profile/{id}', function($id){
//     return "Tampilkan user dengan id = $id";
// })->where('id', '[0-9]+');




// masih regular expression, pada contoh kali ini saya akan membuat kondisi parameter dengan kombinasi 2huruf besar lalu dilanjut angka
// Route::get('/detail/{id}', function($undian){
//     return "nomor undian yang menang adalah $undian";
// })->where('undian', '[A-Z]{2}[0-9]+');




// route redirect
// route yang mengalihkan ke route lain
// Route::get('/kontak', function(){
//     return "hubungi kami di nomor 88890";
// });
// ketika route ini kepanggil maka akan di alihkan ke route /kontak
// Route::redirect('/hubungi' , '/kontak');




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
// Route::prefix('/admin')->group(function(){

//     Route::get('/dosen', function(){
//         return "Halaman Dosen";
//     });

//     Route::get('/mahasiswa', function(){
//         return "Halaman Mahasiswa";
//     });

//     Route::get('/karyawan', function(){
//         return "Halaman Karyawan";
//     });

// });




// route fallback
// route yang akan dipanggil jika user memasukan route yang tidak terdaftar
// Route::fallback(function(){
//     echo '<h2 style="text-align:center; margin-top:45px">Alamat tidak diketahui</h2>';
//     echo '<h3 style="text-align:center">Mungkin maksud anda ?</h3>';
//     echo '<h4 style="text-align:center">/hello</h4>';
//     echo '<h4 style="text-align:center">/belajar</h4>';
// });



// route priority
/***
 * Route ini akan memilih prioritas dari route lain dari route yang memiliki nama yang sama
 * contoh :
 *  Route::get('/laptop/1', function(){ return "Laptop ke-1 saya";});
 *  Route::get('/laptop/1', function(){ return "Laptop ke-1 kami";});
 *  Route::get('/laptop/1', function(){ return "Laptop ke-1 kita";});
 *
 * jika tidak mengunakan route priority maka yang akan terpanggil adalah route terakhir yaitu route yang memiliki nilai return "Laptop ke-1 kita".
 */

//  Route::get('/laptop/{a}',function($a){ return "Laptop ke-$a saya";});
//  Route::get('/laptop/{b}',function($b){ return "Laptop ke-$b kami";});
//  Route::get('/laptop/{c}',function($c){ return "Laptop ke-$c kita";});

//  Debugging -> Pencarian error
// Route::get('/data', function(){

//     $data = [
//         "nama" => "reza irfan wijaya",
//         'kelas' => 'MM4',
//         'NIM' => 19102149,
//         'alamat' => [
//             'desa' => 'hanum',
//             'kecamatan' => 'dayeuhluhur',
//             'kebupaten' => 'cilacap'

//         ]
//     ];

//     dd($data);
// });


// function compact
// Route::get('/mahasiswa/{nama}/{usia}/{alamat}', function($a, $b, $c){
//     return view('compact',[
//         'nama' => $a,
//         'usia' => $b,
//         'alamat' => $c,
//     ]);
// });


//  ===================================================================================
//  ===================================================================================
    // Pengaplikasian
//  ===================================================================================
//  ===================================================================================

// // admin
// Route::get('/administrator/{nama}', function($nama){
//     return view('universitas.admin')->with('title', 'Admin | Dashboards')->with('nama', $nama);
// })->name('admin');
// diubah menggunakan controller
Route::get('/administrator/{nama?}', [HomeConstroller::class, 'admin'])->name('admin');


// Route::get('/kampus', function(){
//     return view('kampus')->with('title', 'Kampus | Belajar');
// })->name('kampus');
// diubah menggunakan controller
Route::get('/kampus', [HomeConstroller::class, 'index'])->name('kampus');


// mahasiswa
// Route::get('/mahasiswa', function(){

//     $all = [
//         [
//             "nama" => "Reza Irfan Wijaya",
//             "nim" => 19102149,
//             "jurusan" => "Teknik Informatika"

//         ],
//         [
//             "nama" => "Reza Irfan ",
//             "nim" => 19102148,
//             "jurusan" => "Teknik Industri"

//         ],
//         [
//             "nama" => "Reza",
//             "nim" => 19102143,
//             "jurusan" => "Desain Komunikasi Visual"

//         ]
//     ];
//     return view('universitas.mahasiswa')->with('title', "Mahasiswa")->with('mahasiswa', $all);
// })->name('mahasiswa');
// diubah menggunakan controller
Route::get('/mahasiswa', [HomeConstroller::class, 'mahasiswa'])->name('mahasiswa');

// dosen
// Route::get('/dosen', function(){
//     $all = [
//         [
//             'nama' => 'Abdul',
//             'nip' => '193029308',
//             'keahlian' =>'Infomratika'
//         ],
//         [
//             'nama' => 'Sofyan',
//             'nip' => '1369303',
//             'keahlian' =>'IOT'
//         ],
//         [
//             'nama' => 'Bellatrix',
//             'nip' => '190980805',
//             'keahlian' =>'Fisika'
//         ],
//         [
//             'nama' => 'Irfan',
//             'nip' => '1990845608',
//             'keahlian' =>'Kimia'
//         ],
//         [
//             'nama' => 'Kusuma',
//             'nip' => '193878967509',
//             'keahlian' =>'Hukum'
//         ],
//     ];

//     return view('universitas.dosen')->with('title', 'Dosen')->with('dosen', $all);
// })->name('dosen');
// diubah menggunakan controller
Route::get('/dosen', [HomeConstroller::class, 'dosen'])->name('dosen');


// tentang
// Route::get('/tentang', function(){
//     return view('universitas.tentang')->with('title', 'Tentang');
// })->name('tentang');
// diubah menggunakan controller
Route::get('/tentang', [HomeConstroller::class, 'tentang'])->name('tentang');


// laravel mix
// Route::get('/laravel-mix', function(){
// return view('learning.laramix')->with('title', 'Laravel Mix');
// });
// diubah menggunakan controller
Route::get('/laravel-mix', [HomeConstroller::class, 'laravelMix'])->name('laravel.mix');


// laravel Ui
Route::get('/laravel-ui', [HomeConstroller::class, 'laravelUi'])->name('laravel.ui');

// collection
Route::get('/collection', [HomeConstroller::class, 'collection'])->name('laravel.collection');


// dbfacade
Route::get('/facade', [MahasiswaController::class, 'dbFacade'])->name('laravel.dbfacade');

// route untuk dbfacade
Route::get('/insert-sql', [MahasiswaController::class,'insertSql']);
Route::get('/insert-timestamp',[MahasiswaController::class,'insertTimestamp']);
Route::get('/insert-prepared', [MahasiswaController::class,'insertPrepared']);
Route::get('/insert-binding', [MahasiswaController::class,'insertBinding']);
Route::get('/update', [MahasiswaController::class,'update']);
Route::get('/delete/{id}', [MahasiswaController::class,'delete'])->name('delete');
Route::get('/select', [MahasiswaController::class,'show']);
Route::get('/select-tampil', [MahasiswaController::class,'selectTampil']);
Route::get('/select-view', [MahasiswaController::class,'selectView']);
Route::get('/select-where', [MahasiswaController::class,'selectWhere']);
Route::get('/statement', [MahasiswaController::class,'reset']);


// route untuk query builder
Route::get('/query-builder', [MobilController::class, 'index'])->name('queryBuilder');
Route::prefix('/qb')->group(function(){
    Route::get('/insert', [MobilController::class, 'tambah']);
    Route::get('/insertMany', [MobilController::class, 'tambahMany']);
    Route::get('/update', [MobilController::class, 'update']);
    Route::get('/updateor', [MobilController::class, 'updateAtauInsert']);
    Route::get('/hapus/{id}', [MobilController::class, 'hapus'])->name('hapus');
    Route::get('/tampil', [MobilController::class, 'tampil']);
    Route::get('/getWhere', [MobilController::class, 'getWhere']);
    Route::get('/select', [MobilController::class, 'select']);
    Route::get('/takeSkip', [MobilController::class, 'takeSkip']);
    Route::get('/first', [MobilController::class, 'first']);
    Route::get('/find', [MobilController::class, 'find']);
    Route::get('/raw', [MobilController::class, 'selectRaw']);
    Route::get('/detail/{merk}', [MobilController::class, 'detailMobil'])->name('detail');
});


// route untuk eloquent orm
Route::get('/eloquent', [DosenController::class, 'index'] )->name('eloquent');
Route::prefix('/orm')->group(function(){
    Route::get('/insert', [DosenController::class, 'insert']);
    Route::get('/mass-asignment', [DosenController::class, 'massAsignment']);
    Route::get('/update/{id}', [DosenController::class, 'update']);
    Route::get('/update-where/{keahlian}', [DosenController::class, 'updateWhere']);
    Route::get('/update-mass/{keahlian}', [DosenController::class, 'updateMass']);
    Route::get('/delete/{nip}', [DosenController::class, 'hapus']);
    Route::get('/all', [DosenController::class, 'show']);
    Route::get('/soft-delete/{id}', [DosenController::class, 'softDelete']);
    Route::get('/restore', [DosenController::class, 'restoreData']);
    Route::get('/methode', [DosenController::class, 'method']);
});



// form
Route::get('/form', [KaryawanController::class, 'index'])->name('form');
Route::post('/form-process-method-validate', [KaryawanController::class, 'formProcess'])->name('form-process');
Route::post('/form-process-class-validate', [KaryawanController::class, 'formProcessValidator'])->name('form-process-validator');


// localization
Route::get('/localization', [GuitarController::class, 'index'])->name('localization.index');

// form dalam bahasa indonesia
Route::get('/localization/id', [GuitarController::class, 'formId'])->name('localization.id');

// form dalam bahasa inggris
Route::get('/localization/en', [GuitarController::class, 'formEn'])->name('localization.en');

// store data dari form
Route::post('/localization/process', [GuitarController::class, 'store'])->name('localization.store');


// crud
Route::get('/guitar', [GuitarController::class, 'home'])->name('guitar.home');
Route::get('/guitar/id', [GuitarController::class, 'formGuitarId'])->name('guitar.form.id');
Route::get('/guitar/en', [GuitarController::class, 'formGuitarEn'])->name('guitar.form.en');
Route::post('/guitar/create', [GuitarController::class, 'storeGuitar'])->name('guitar.store');
Route::get('/guitar/{guitar}', [GuitarController::class, 'showGuitar'])->name('guitar.show');
Route::delete('/guitar/{guitar}', [GuitarController::class, 'deleteGuitar'])->name('guitar.delete');
