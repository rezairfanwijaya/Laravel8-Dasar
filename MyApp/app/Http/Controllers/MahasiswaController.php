<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use facade
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function dbFacade (){
        $all = DB::select("SELECT * FROM mahasiswas");
        $show = DB::select("SELECT * FROM mahasiswas WHERE nama = ?", ['abdas']);
        $showprepared = DB::select("SELECT * FROM mahasiswas WHERE nama = ?", ['Reza Adas']);
        $showparameter = DB::select("SELECT * FROM mahasiswas WHERE nama = ?", ['ipang']);
        return view('learning.dbFacade')
        ->with('title', 'DB Facade')
        ->with('data',$show)
        ->with('prepared',$showprepared)
        ->with('parameter',$showparameter)
        ->with('all',$all)
        ;
    }

    // query insert
    public function insertSql(){
        $insert = DB::insert("INSERT INTO mahasiswas(nim,nama,tanggal_lahir) VALUES (88675388, 'abdas', '2000-11-13')");
    // \var_dump($insert);  

        return redirect ('/facade');
    }

    public function insertPrepared(){
        $insert = DB::insert('
        INSERT INTO mahasiswas (nim,nama,tanggal_lahir,ipk,created_at,updated_at)
        VALUES(?,?,?,?,?,?)', [19102149, 'Reza Adas', '2000-11-13', 4.00, now(), now()]
        );
        // var_dump($insert);

        return redirect ('/facade');
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
        // var_dump($result);

        return redirect ('/facade');
    }

    // query update
    public function update(){
        $update = DB::update("UPDATE mahasiswas set nim = '11111111' WHERE nama = ?", ["ipang"]);
        // var_dump($update);

        return redirect ('/facade');
    }

    // query delete
    public function delete($id){
        $delete = DB::delete("DELETE FROM mahasiswas WHERE id = ?", [$id]);
        var_dump($delete);
        return redirect ('/facade');
    }


    // query select
    public function show (){
        $show = DB::select("SELECT * FROM mahasiswas");
    }

    // dan ini adalah dbfacade untuk menjalankan selain query diatas (select, insert, update, delete)
    public function reset(){
        $reset = DB::statement("TRUNCATE mahasiswas");
        return redirect ('/facade');
    }

    
}
