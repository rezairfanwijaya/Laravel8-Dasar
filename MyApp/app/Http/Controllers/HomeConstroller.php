<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// facade
use Illuminate\Support\Str;
// class external
use App\Models\Laptop;
class HomeConstroller extends Controller
{
    // beranda
    public function index(){
        // facade
        $snake = Str::snake('HalloSayaReza');
        $kebab = Str::kebab('HalloSayaReza');
        // akses class external
        $class = new Laptop();
        $laptop = $class->nama();

        return view('kampus')
        ->with('title', 'Kampus | Belajar')
        ->with('snake', $snake)
        ->with('kebab', $kebab)
        ->with('external', $laptop)

        ;
        
        
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

    // Collection
    public function collection(){

        // data collection dengan output array numerik
        $nama = collect(['Reza', 'Irfan', 'Wijaya', 'Abdas', 'Ipin', 
        'Ipang', 'Tupong']);

        $angka = collect([1,354,6,324,89,3131,6,3,90,2]);

        // data collection dengan output object (JSON)
        $kabupaten = collect([
            'jawa tengah'=>'Cilacap',
            'jawa barat'=>'Banjar Patroman',
            'jawa timur'=>'Malang'
        ]);

        // method collection
        $minNama = $nama->min();
        $maxNama = $nama->max();
        $ranNama = $nama->random();
        // menambah elemnt ke collection
        $concNama = $nama->concat(['ipangipin', 'ede']);
        $firstNama = $nama->first();
        $lastNama = $nama->last();
        

        $minAngka = $angka->min();
        $maxAngka = $angka->max();
        $sumAngka = $angka->sum();
        $avgAngka = $angka->avg();
        $medAngka = $angka->median();
        $ranAngka = $angka->random();
        // menambah elemnt ke collect
        $concAngka = $angka->concat([76847584,847958]);
        $firstAngka = $angka->first();
        $lastAngka = $angka->last();
        

        return view('learning.collection')
        ->with('title', 'Collection')
        ->with('collectNUM', $nama)
        ->with('angka', $angka)
        ->with('collectJSON', $kabupaten)
        ->with('minNama', $minNama)
        ->with('maxNama', $maxNama)
        ->with('ranNama', $ranNama)
        ->with('concNama', $concNama)
        ->with('firstNama', $firstNama)
        ->with('lastNama', $lastNama)
        ->with('minAngka', $minAngka)
        ->with('maxAngka', $maxAngka)
        ->with('sumAngka', $sumAngka)
        ->with('avgAngka', $avgAngka)
        ->with('medAngka', $medAngka)
        ->with('ranAngka', $ranAngka)
        ->with('concAngka', $concAngka)
        ->with('firstAngka', $firstAngka)
        ->with('lastAngka', $lastAngka)
        ;
    }

}
