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

}
