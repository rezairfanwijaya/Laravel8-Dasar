<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuitarController extends Controller
{
    public function store(Request $req){
        $validasi  =[
            'merk' => 'required|min:3',
            'no_seri' => 'required|size:5',
            'warna' => 'required',
            'harga' =>'required',
            'jenis' => 'required',
        ];
        $err = [
            'required' => 'Kolom :attribute harus diisi',
            'min' => 'Kolom :attribute minimal berisi :min karakter',
            'size' => 'Kolom :attribute harus berisi :size',
        ];

        $data = Validator::make($req->all(), $validasi, $err);
        
        if ($data->fails()){
            return redirect()->route('localization')->withErrors($data)->withInput();
        }

        @dd($data);
    }
}

