<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MobilController extends Controller
{
    //insert
    public function tambah(){
        $result = DB::table('mobils')->insert([
            'merk' => 'Lamborghini',
            'warna' => 'Hitam',
            'harga' => 120000,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        var_dump($result);
    }
}
