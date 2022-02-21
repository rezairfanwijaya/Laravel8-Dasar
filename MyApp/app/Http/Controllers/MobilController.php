<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MobilController extends Controller
{
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

        var_dump($result);
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
    public function hapus(){
        $result = DB::table('mobils')->where('merk', 'angkot')->delete();
        var_dump($result);
    }

}
