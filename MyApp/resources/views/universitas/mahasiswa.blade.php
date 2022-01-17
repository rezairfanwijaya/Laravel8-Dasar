@extends('template.index')

@section('konten')
    <h3 class="mt-5 text-center">Selamat Datang Admin</h3>
    <h5 class="my-5">Daftar Mahasiswa</h5>

    <table class="table table-stiped text-center my-3">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
        </tr>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['nim'] }}</td>
                <td>{{ $mhs['jurusan'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
