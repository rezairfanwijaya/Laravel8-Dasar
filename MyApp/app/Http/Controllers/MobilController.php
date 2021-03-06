<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MobilController extends Controller
{
    // halaman awal
    public function index(){
        // tampil data untuk yang insert tunggal (mengambil data yang hanya memilki merk lamborghini)
        $showSingle = DB::table('mobils')->where('merk', 'lamborghini')->get();

        // tampil data untuk yang insert jamak untuk mengambil data selain merk lamborghini
        $showJamak = DB::table('mobils')->where('merk', '<>', 'lamborghini')->get();

        $showAll = DB::table('mobils')->get();

        

        return view ('learning.queryBuilder')
        ->with('title', 'Query Builder')
        ->with('all', $showAll)
        ->with('insertSingle', $showSingle)        
        ->with('insertJamak', $showJamak)        
        ;
    }


    // tampilkan semua data
    public function tampil(){
        $result = DB::table('mobils')->get();

    }


    //insert
    public function tambah(){
        $result = DB::table('mobils')->insert(
            [
            'merk' => 'Lamborghini',
            'warna' => 'Hitam',
            'harga' => 120000,
            'created_at' => now(),
            'updated_at' => now()
            ]
        );  
        
        return redirect()->route('queryBuilder');
    }

    // insert banyak
    public function tambahMany(){
        $result = DB::table('mobils')->insert([
            [
                'merk' => 'Avanza',
                'warna' => 'Putih',
                'harga' => 4000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'merk' => 'Mazda',
                'warna' => 'Hitam',
                'harga' => 40090,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'merk' => 'Mercedes Benz',
                'warna' => 'Merah',
                'harga' => 56000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        var_dump($result);

        return redirect()->route('queryBuilder');
    }

    // update
    public function update(){
        $result = DB::table('mobils')->where('merk', 'avanza')->update([
            'merk' => 'Ferrari',
            'harga' => 5000
        ]);
        var_dump ($result);
    }

    // updateOrInsert
    // ini adalah method dari query builder yang memungkinkan kita untuk melakukan update maupun insert dalam satu function. Artinya jika ada data maka akan diupdate jika tidak ada data maka akan diinsert
    // syntax -----> updateOrInsert([kondisi where], [data yang akan diinsert])
    public function updateAtauInsert(){
        $result = DB::table('mobils')->updateOrInsert(
            [
                'merk' => 'Angkot',
            ],
            [
                'warna' => 'kuning',
                'harga' => 900,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        var_dump($result);
    }

    // hapus
    public function hapus($id){
        $result = DB::table('mobils')->where('id', $id)->delete();
        var_dump($result);

        return redirect()->route('queryBuilder');
    }


    // memilih data tertentu dan mengurutkan nya (DESC/ASC)
    public function getWhere(){
        $result = DB::table('mobils')
        ->where('merk', '<>', 'lamborghini')
        ->orderBy('harga', 'desc')
        ->get()
        ;
        
        $jumlah = $result->count();

        echo "Jumlah data = $jumlah";
        echo "<br>";
        foreach ($result as $item) {
            echo "<p> $item->id $item->merk $item->warna $item->harga  </p>";
        }

        return $item;
        
    }

    // menyeleksi kolom apasaja yang akan ditampilkan menggunakan method select
    public function select (){
        $result = DB::table('mobils')
        ->where('merk', 'lamborghini')
        ->select('harga')
        ->get();

        $jumlah = $result->count();

        echo $jumlah;
        echo "<br>";
        var_dump($result[0]->harga);
    }

    // men-skip data , sama seperti limit dan biasa nya dipakai untuk pagination
    public function takeSkip(){
        $result = DB::table('mobils')
        ->skip(1)
        ->take(2)
        ->get()
        ;

        @dd($result);
    }

    // method first akan mengmbil data pertama yang ia jumpai walaupun data itu ada lebih dari satu
    public function first(){
        $result = DB::table('mobils')
        ->where('warna', 'hitam')
        ->first()
        ;

        @dd($result);
    }


    // method find ini khusus untuk mencari kolom id saja, jika ingin mencari kolom selain id kita bisa menggunakan klausa where
    public function find(){
        $result = DB::table('mobils')
        ->find(21)
        ;

        @dd($result);
    }


    // kita juga bisa menggabungkan db facade (sql biasa) dengan query builder yaitu mengguakan selectRaw
    public function selectRaw(){
        $result = DB::table('mobils')
        ->selectRaw("COUNT(id) as jumlah")
        ->get()
        ;
        echo $result[0]->jumlah;
        @dd($result);

    }


    // detailMobil
    public function detailMobil($merk){
        $detail = DB::table('mobils')
        ->where('merk', $merk)
        ->get()
        ;

        return view('learning.detailMobil')
        ->with('detail', $detail[0]);
    }   

    
}
