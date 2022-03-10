<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class KaryawanController extends Controller
{
    public function index(){
        return view('learning.form')->with('title', 'Form');
    }

    public function formProcess (Request $req){

        // validasi data
        // validasi ini menggunakan methode validate()
        // kekurangnnya adalah pessan error pada filed dari form tidak bisa kita edit (memakai default)
        $karyawan = $req->validate([
            'nama' => 'required|min:2|max:20',
            'idKaryawan' => 'required|size:4',
            'telpon' => 'required|max:12',
            'alamat' => 'required',
            'usia' => 'required',
            'domisili' => 'required',
            'posisi' => 'required',
            'jenisKelamin' => 'required',
        ]);

        // return redirect()->route('form');


        echo "Data yang anda input";
        echo "<br>";
        echo $req->nama;
        echo "<br>";
        echo $req->idKaryawan;
        echo "<br>";
        echo $req->telpon;
        echo "<br>";
        echo $req->alamat;
        echo "<br>";
        echo $req->usia;
        echo "<br>";
        echo $req->domisili;
        echo "<br>";
        echo $req->posisi;
        echo "<br>";
        echo $req->jenisKelamin;
    }

    // disini validasi data menggunakan class validator agar memilki akses penuh terhadap pesan error yang akan ditampilkan
    public function formProcessValidator(Request $req){
        // validaror ini memiliki 3 argument
        //  1. data yang diinput dari form
        //  2. syarat data (validasi/seleksi data)
        //  3. pesan error

        // $karyawan = Validator::make(
        //     // argument pertama
        //     $req->all(),

        //     // argument kedua
        //     [
        //         'nama' => 'required|min:2|max:20',
        //         'idKaryawan' => 'required|size:4',
        //         'telpon' => 'required|size:12',
        //         'alamat' => 'required',
        //         'usia' => 'required',
        //         'domisili' => 'required',
        //         'posisi' => 'required',
        //         'jenisKelamin' => 'required',
        //     ],

        //     // argument ketiga
        //     [
        //         'required' => 'Kolom :attribute wajib diisi',
        //         'min' => 'Karakter minimal :min karakter',
        //         'max' => 'Karakter maksimal :max karakter',
        //         'size' => 'Panjang karakter harus :size karakter',
        //     ]
        // );


        // validasi diatas bisa diganti bentuk jadi seperti ini
        $checkData = [
            'nama' => 'required|min:2|max:20',
            'idKaryawan' => 'required|size:4',
            'telpon' => 'required|size:12',
            'alamat' => 'required',
            'usia' => 'required',
            'domisili' => 'required',
            'posisi' => 'required',
            'jenisKelamin' => 'required',
        ];

        $errorMessage = [
            'required' => 'Kolom :attribute wajib diisi',
            'min' => 'Karakter minimal :min karakter',
            'max' => 'Karakter maksimal :max karakter',
            'size' => 'Panjang karakter harus :size karakter',
        ];

        $karyawan = Validator::make($req->all(), $checkData, $errorMessage);


        // jika ada data yang tidak lolos seleksi maka karyawan->fails() akan bernilai true dan kita redirect kehalaman form nya dengan membawa error dari $karyawan (agar bisa akses $errors nantinya) dan juga membawa inputan (agar bisa akses old() nantinya)
        if ($karyawan->fails()){
            return redirect()->route('form')->withErrors($karyawan)->withInput();
        }

        // jika berhasil lolos semua data nya, maka tampilkan
        echo "Data yang anda input";
        echo "<br>";
        echo $req->nama;
        echo "<br>";
        echo $req->idKaryawan;
        echo "<br>";
        echo $req->telpon;
        echo "<br>";
        echo $req->alamat;
        echo "<br>";
        echo $req->usia;
        echo "<br>";
        echo $req->domisili;
        echo "<br>";
        echo $req->posisi;
        echo "<br>";
        echo $req->jenisKelamin;
        

    }
}
