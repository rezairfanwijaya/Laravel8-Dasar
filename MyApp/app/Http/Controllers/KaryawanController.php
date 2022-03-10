<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class KaryawanController extends Controller
{
    public function index(){
        return view('learning.form')->with('title', 'Form');
    }

    public function formProcess (Request $req){

        // validasi data
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
}
