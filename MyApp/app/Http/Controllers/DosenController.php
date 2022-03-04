<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DosenController extends Controller
{
    public function index(){
        return view('learning.eloquent')
        ->with('title', 'Eloquent ORM');
    }

    // insert data
    public function insert (){
        $dosen = new Dosen();
        $dosen->nama    = "Reza Irfan";
        $dosen->nip     = "196318";
        $dosen->gaji    = 4560;
        $dosen->pengampu= "Data Science";
        $dosen->tanggal_lahir = "2000-11-13";
        $dosen->save();

@dd($dosen);
    }

    // mass-assignment (insert data lebih dari satu)
    public function massAsignment(){
        $dosen1 = Dosen::create(
            
            [
                'nama'          => 'Reza',
                'pengampu'      => 'Biologi',
                'nip'           => '12345',
                'gaji'          => 123456,
                'tanggal_lahir' => '2000-11-10'
            ]
            
        );

        $dosen2 = Dosen::create(
            [
                'nama'          => 'Reza Wijaya',
                'pengampu'      => 'Fisika',
                'nip'           => '12495',
                'gaji'          => 341879,
                'tanggal_lahir' => '2000-08-10'
            ]
        );

        $dosen3 = Dosen::create(
            [
                'nama'          => 'Reza Wijaya Kusuma',
                'pengampu'      => 'Biologi',
                'nip'           => '12495',
                'gaji'          => 341879,
                'tanggal_lahir' => '2000-08-10'
            ]
        );

        @dd($dosen1);
        @dd($dosen2);
        @dd($dosen3);
    }

    // function update biasa
    public function update($id){
        $dosen = Dosen::find($id);
        $dosen -> nama = "Ifan";
        $dosen->save();
        @dd($dosen);
    }

    // function untuk update menggunakan where
    public function updateWhere($keahlian){
        $dosen = Dosen::where('pengampu', $keahlian)->first();
        $dosen->nip = "324323";
        $dosen->nama = "Eza";
        $dosen->save();
        @dd($dosen); 
    }

    // function untuk update menggunakan mass-update
    public function updateMass($keahlian){
        $dosen = Dosen::where('pengampu', $keahlian)->first()->update([
            "nip" => "45688",
            "nama" => "Aduuuuah"
        ]);

         @dd($dosen);
    }


    // function untuk menghapus data
    public function hapus($nip){
        $dosen = Dosen::where('nip', $nip);
        $dosen->delete();
        
        // $dosen = Dosen::find($id);
        // @dd($dosen);
    }

}
