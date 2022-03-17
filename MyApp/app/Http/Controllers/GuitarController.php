<?php

namespace App\Http\Controllers;

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
}

