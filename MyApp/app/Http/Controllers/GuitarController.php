<?php

namespace App\Http\Controllers;

use App\Models\Guitar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class GuitarController extends Controller
{
    public function index(){
        return view('learning.localization')
        ->with('title', 'Localization');
    }

    public function store(Request $req){
        $validasi  =[
            'merk' => 'required|min:3',
            'no_seri' => 'required|size:5',
            'warna' => 'required',
            'harga' =>'required',
            'jenis' => 'required',
        ];
        $err = [
            // 'required' => 'Kolom :attribute harus diisi',
            // 'min' => 'Kolom :attribute minimal berisi :min karakter',
            // 'size' => 'Kolom :attribute harus berisi :size',
        ];

        $data = Validator::make($req->all(), $validasi, $err);
        
        if ($data->fails()){
            return redirect()->route('localization.index')->withErrors($data)->withInput();
        }

        @dd($data);
    }

    // function untuk mengubah form menjadi bahasa indonesia
    function formId(){
        // ubah locale di file App.php menggunakan ini agar dinamis
        App::setLocale('id');
        return view('learning.localization')->with('title', 'Localization');
    }

    // function untuk mengubah form menjadi bahasa inggris
    function formEn(){
        // ubah locale di file App.php menggunakan ini agar dinamis
        App::setLocale('en');
        return view('learning.localization')->with('title', 'Localization');
    }


    // FUNCTION HANDLE CRUD
    public function home(){
        return view('learning.guitar')
        ->with('title', 'Guitar');
    }

    public function formGuitarId(){
        App::setLocale('id');
        return view('learning.guitar')->with('title', 'Guitar');
    }

    public function formGuitarEn(){
        App::setLocale('en');
        return view('learning.guitar')->with('title', 'Guitar');
    }

    public function storeGuitar(Request $req){

        $filter = [
            'merk' => 'required|min:3',
            'noSeri' => 'required|size:5',
            'warna' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
        ];

        $err = [
            'required' => 'kolom :attribute harus diisi',
            'min' => 'kolom :attribute minimal terdiri dari :min karakter',
            'size' => "kolom :attribute harus terdiri dari :size karakter"
        ];

        $data = Validator::make($req->all(), $filter, $err);
        
        if ($data->fails()){
            return redirect()->route('guitar.home')->withErrors($data)->withInput();
        }

        $gitar = new Guitar();
        $gitar->merk = $req['merk'];
        $gitar->serial_number = $req['noSeri'];
        $gitar->warna = $req['warna'];
        $gitar->harga = $req['harga'];
        $gitar->jenis = $req['jenis'];

        $gitar->save();

        return "Data Berhasil disimpan";
    }
}

