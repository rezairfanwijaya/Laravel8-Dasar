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
            <th>Status</th>
        </tr>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['nim'] }}</td>
                <td>{{ $mhs['jurusan'] }}</td>

                @if ($mhs['nim']%2==0)
                    <td class="bg-success" width="30px"></td>
                @else
                    <td class="bg-danger" width="30px"></td>
                @endif  
                
            </tr>
        @endforeach
    </table>
@endsection
