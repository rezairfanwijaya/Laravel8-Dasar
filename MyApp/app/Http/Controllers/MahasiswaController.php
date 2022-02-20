<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use facade
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function dbFacade (){
        return view('learning.dbFacade')->with('title', 'DB Facade');
    }

    public function insertSql(){
        $insert = DB::insert("INSERT INTO mahasiswas(nim,nama,tanggal_lahir) VALUES (88675388, 'abdas', '2000-11-13')");
    \var_dump($insert);
    }

    public function insertPrepared(){
        $insert = DB::insert('
        INSERT INTO mahasiswas (nim,nama,tanggal_lahir,ipk,created_at,updated_at)
        VALUES(?,?,?,?,?,?)', [19102149, ' Reza Adas', '2000-11-13', 4.00, now(), now()]
        );

        var_dump($insert);
    }

    public function insertBinding(){
        $result = DB::insert('INSERT INTO mahasiswas (nim,nama,tanggal_lahir,ipk,created_at,updated_at) VALUES (:nim, :nama, :tl, :ipk, :created, :updated)', [
            'nim' => '19102146',
            'nama' => 'ipang',
            'tl' => '2000-11-13',
            'ipk' => '3.56',
            'created' => now(),
            'updated' => now()
            
        ]);
        var_dump($result);
    }

    public function update(){
        $update = DB::update("UPDATE mahasiswas set nim = '11111111' WHERE id = ?", [4]);
        var_dump($update);
    }
}
