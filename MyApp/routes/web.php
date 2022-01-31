<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\VarDumper;

use function Ramsey\Uuid\v1;

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

 Route::get('/laptop/{a}',function($a){ return "Laptop ke-$a saya";});
 Route::get('/laptop/{b}',function($b){ return "Laptop ke-$b kami";});
 Route::get('/laptop/{c}',function($c){ return "Laptop ke-$c kita";});

//  Debugging -> Pencarian error 
Route::get('/data', function(){

    $data = [
        "nama" => "reza irfan wijaya",
        'kelas' => 'MM4',
        'NIM' => 19102149,
        'alamat' => [
            'desa' => 'hanum',
            'kecamatan' => 'dayeuhluhur',
            'kebupaten' => 'cilacap'
    
        ]
    ];
    
    dd($data);
});


// function compact
Route::get('/mahasiswa/{nama}/{usia}/{alamat}', function($a, $b, $c){
    return view('compact',[
        'nama' => $a,
        'usia' => $b,
        'alamat' => $c,
    ]);
});


//  ===================================================================================
//  ===================================================================================
    // Pengaplikasian 
//  ===================================================================================
//  ===================================================================================
Route::get('/kampus', function(){
    return view('kampus')->with('title', 'Kampus | Belajar');
});

// mahasiswa
Route::get('/mahasiswa', function(){
    
    $all = [
        [
            "nama" => "Reza Irfan Wijaya",
            "nim" => 19102149,
            "jurusan" => "Teknik Informatika"

        ],
        [
            "nama" => "Reza Irfan ",
            "nim" => 19102148,
            "jurusan" => "Teknik Industri"

        ],
        [
            "nama" => "Reza",
            "nim" => 19102143,
            "jurusan" => "Desain Komunikasi Visual"

        ]
    ];
    return view('universitas.mahasiswa')->with('title', "Mahasiswa")->with('mahasiswa', $all);
});

// dosen
Route::get('/dosen', function(){
    $all = [
        [
            'nama' => 'Abdul',
            'nip' => '193029308',
            'keahlian' =>'Infomratika'
        ],
        [
            'nama' => 'Sofyan',
            'nip' => '1369303',
            'keahlian' =>'IOT'
        ],
        [
            'nama' => 'Bellatrix',
            'nip' => '190980805',
            'keahlian' =>'Fisika'
        ],
        [
            'nama' => 'Irfan',
            'nip' => '1990845608',
            'keahlian' =>'Kimia'
        ],
        [
            'nama' => 'Kusuma',
            'nip' => '193878967509',
            'keahlian' =>'Hukum'
        ],
    ];

    return view('universitas.dosen')->with('title', 'Dosen')->with('dosen', $all);
});
// tentang
Route::get('/tentang', function(){
    return view('universitas.tentang')->with('title', 'Tentang');
});

