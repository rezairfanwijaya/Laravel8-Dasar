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
        $guitars = Guitar::all();
        return view('learning.guitar')
        ->with('title', 'Guitar')
        ->with('guitars', $guitars);
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

        $validateData = $req->validate([
            'merk' => 'required|min:3',
            'serial_number' => 'required|size:5|unique:guitars',
            'warna' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
        ]);

        // $err = [
        //     'required' => 'kolom :attribute harus diisi',
        //     'min' => 'kolom :attribute minimal terdiri dari :min karakter',
        //     'size' => "kolom :attribute harus terdiri dari :size karakter"
        // ];

        Guitar::create($validateData);
        // $data = Validator::make($req->all(), $filter, $err);
        
        // if ($data->fails()){
        //     return redirect()->route('guitar.home')->withErrors($data)->withInput();
        // }

        // ini cara biasa
        // $gitar = new Guitar();
        // $gitar->merk = $req['merk'];
        // $gitar->serial_number = $req['noSeri'];
        // $gitar->warna = $req['warna'];
        // $gitar->harga = $req['harga'];
        // $gitar->jenis = $req['jenis'];

        // $gitar->save();
        // @dd($req->all());


        // ini cara mass assignment
        // Guitar::create($req->all());

        // flash data
        // flash data adalah pesan yang disimpan dalam sebuah session
        $req->session()->flash('pesan', "Data {$req->merk} berhasil ditambahkan");
        return redirect()->route('guitar.home');
    }

    public function showGuitar(Guitar $guitar){
        // $gitar = Guitar::findOrFail($guitar);
        return view ('learning.detailGuitar')->with('gitar', $guitar);

    }  

    // function untuk mengedit guitar
    public function editGuitar(Guitar $id){
        return view('learning.editGuitar')->with('gitar', $id)->with('title', 'Edit Guitar');
    }

    // function untuk mengupdate gitar setelah berhasil di edit
    public function updateGuitar(Request $req, Guitar $id){
        // validasi data
        $validasi = $req->validate([
            'merk' => '|min:3',
            'serial_number' => '|size:5|unique:guitars,serial_number,'.$id->id, // ini akan mengabaikan data yang sama
            'warna' => '',
            'harga' => '',
            'jenis' => '',
        ]);

        // update data
        $id->update($validasi);

        // flash data
        session()->flash('pesanUpdate', "Data {$req->merk} berhasil diubah");

        // redirect ke halaman detail gitar
        return redirect()->route('guitar.show', $id->id);
        
    }
    
    // fuctions untuk menghapus data
    public function deleteGuitar(Guitar $guitar){
        $guitar->delete();
        // flash data
        session()->flash('pesanHapus', "Data {$guitar->merk} berhasil dihapus");
        return redirect()->route('guitar.home');
    }
}
