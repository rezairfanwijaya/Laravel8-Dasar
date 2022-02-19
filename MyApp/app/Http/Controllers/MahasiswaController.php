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
}
