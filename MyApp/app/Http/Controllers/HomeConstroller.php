<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeConstroller extends Controller
{
    // beranda
    public function index(){
        return view('kampus')->with('title', 'Kampus | Belajar');
    }


    // mahasiswa
    public function mahasiswa (){
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
        return view('universitas.mahasiswa')->with('mahasiswa', $all)->with('title', 'Mahasiswa');
    }


    // dosen
    public function dosen(){
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
            ]
        ];
        return view('universitas.dosen')->with('dosen', $all)->with('title', 'Dosen');
    }


    // tentang
    public function tentang (){
        return view('universitas.tentang')
        ->with('title', 'Tentang');
    }


    // laravelmix
    public function laravelMix(){
        return view('learning.laramix')
        ->with('title', 'Laravel Mix');
    }


    // admin
    public function admin($nama = 'Pengguna'){
        return view('universitas.admin')
        ->with('title', 'Admin')
        ->with('nama', $nama);
    }

    // laravel ui
    public function laravelUi(){
        return view('learning.laravelui')
        ->with('title', 'Laravel UI');
    }
}
