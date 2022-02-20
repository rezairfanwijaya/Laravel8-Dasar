@extends('template.index')
@section('konten')
    <div class="konten mt-3 bg-white rounded shadow-sm p-3">
        <ol>
            <div class="insert">
                <li>Insert Data</li>
                <div class="list">
                    <ul>
                        <li class="mt-3">Insert Biasa</li>
                        <code>$insert = DB::insert("INSERT INTO mahasiswas(nim,nama,tanggal_lahir) VALUES (88675388,
                            'abdas', '2000-11-13')");</code>
                        <br>
                        {{-- proses insert data --}}
                        <a href="{{ url('./insert-sql') }}">Klik disini</a> untuk menjalankan code

                        {{-- menampilkan hasil insert biasa --}}
                        @forelse ($data as $item)
                            <div class="data">
                                id : {{ $item->id }}, nama : {{ $item->nama }}, nim : {{ $item->nim }}, tanggal
                                lahir : {{ $item->tanggal_lahir }}
                                <a href="{{ route('delete', ['id'=>$item->id] )}}">(delete)</a>
                            </div>
                        @empty
                        @endforelse

                        <li class="mt-3">Insert menggunakan prepared statement</li>
                        <code> $insert = DB::insert('
                            INSERT INTO mahasiswas (nim,nama,tanggal_lahir,ipk,created_at,updated_at)
                            VALUES(?,?,?,?,?,?)', [19102149, ' Reza Adas', '2000-11-13', 4.00, now(), now()]
                            );</code>
                        <br>
                        {{-- proses insert data dengan prepared statement --}}
                        <a href="{{ url('/insert-prepared') }}">Klik disini</a> untuk menjalankan code

                        {{-- hasil insert prepared --}}
                        @forelse ($prepared as $item)
                            <div class="data">
                                id : {{ $item->id }}, nama : {{ $item->nama }}, nim : {{ $item->nim }}, tanggal
                                lahir : {{ $item->tanggal_lahir }}
                                <a href="{{ route('delete', ['id'=>$item->id] )}}">(delete)</a>
                            </div>
                        @empty
                        @endforelse

                        <li class="mt-3">Insert menggunakan named parameter</li>
                        <code>  $result = DB::insert('INSERT INTO mahasiswas (nim,nama,tanggal_lahir,ipk,created_at,updated_at) VALUES (:nim, :nama, :tl, :ipk, :created, :updated)', [
                            'nim' => '19102146',
                            'nama' => 'ipang',
                            'tl' => '2000-11-13',
                            'ipk' => '3.56',
                            'created' => now(),
                            'updated' => now()
                            
                        ]);</code>
                        <br>
                        {{-- proses insert data dengan prepared statement --}}
                        <a href="{{ url('/insert-binding') }}">Klik disini</a> untuk menjalankan code

                        {{-- hasil insert prepared --}}
                        @forelse ($parameter as $item)
                            <div class="data">
                                id : {{ $item->id }}, nama : {{ $item->nama }}, nim : {{ $item->nim }}, tanggal
                                lahir : {{ $item->tanggal_lahir }} 
                                <a href="{{ route('delete', ['id'=>$item->id] )}}">(delete)</a>
                            </div>
                            
                        @empty
                        @endforelse
                    </ul>

                </div>
            </div>

            <div class="update mt-4">
                <li>Update Data</li>
            </div>
        </ol>
    </div>
@endsection
