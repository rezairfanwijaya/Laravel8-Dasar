<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $dosen4 = Dosen::create(
            [
                'nama'          => 'Eza',
                'pengampu'      => 'Informatika',
                'nip'           => '123',
                'gaji'          => 341879,
                'tanggal_lahir' => '2000-08-10'
            ]
        );
        $dosen5 = Dosen::create(
            [
                'nama'          => 'Ipang',
                'pengampu'      => 'Kimia',
                'nip'           => '8757',
                'gaji'          => 341879,
                'tanggal_lahir' => '2000-08-10'
            ]
        );
        $dosen6 = Dosen::create(
            [
                'nama'          => 'Ede Ifan',
                'pengampu'      => 'DKV',
                'nip'           => '83267',
                'gaji'          => 341879,
                'tanggal_lahir' => '2000-08-10'
            ]
        );

       return "Input berhasil";
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

    // function show all data
    public function show(){
        $dosen = Dosen::all();
        foreach ($dosen as $item) {
            echo $item->id;
            echo "<br>";
            echo $item->nama;
            echo "<br>";
            echo $item->nip;
            echo "<br>";
            echo $item->pengampu;
            echo "<br>";
            echo $item->gaji;
            echo "<br>";
            echo $item->tanggal_lahir;
            echo "<hr>";
        }
    }

    // soft delete 
    // data seolah2 dihapus padahal masih ada di database
    public function softDelete($id){
        $dosen = Dosen::where('id', $id);
        $dosen->delete();

        // ini akan memanggil semua data di database kecuali data yg terhapus
        $all = Dosen::all();

        // ini akan memanggil semua data di database berserta data yang sudah terhapus
        // $all = Dosen::withTrashed()->get();

        // jika menggunakan query builder atau DB facade maka semua data akan terpanggil tanpa terkecuali
        // $all = DB::table('dosens')->select()->first();
        // $all = DB::select('select * from dosens');
        return $all;
  }

    //   restore 
    //  ini dugunakan untuk mengembalikan data yang sudah terhapus sebelumnya melalui softdelete
    public function restoreData(){
        $restore = Dosen::withTrashed()
        ->where('id', 1)
        ->restore();

        $all = Dosen::all();
        return $all;
    }

    public function method(){
        $dosen = Dosen::where('nama' ,'like', '%eza%')
        ->skip(1)->take(3)
        ->get();
        return $dosen;

        
    }

}
