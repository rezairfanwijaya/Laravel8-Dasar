@extends('template.index')

@section('konten')
    
    <h5 class="my-5">Daftar Mahasiswa</h5>

    <table class="table table-stiped text-center my-3">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Status</th>
        </tr>
       @forelse ($mahasiswa as $mhs)
           <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $mhs['nama'] }}</td>
               <td>{{ $mhs['nim'] }}</td>
               <td>{{ $mhs['jurusan'] }}</td>
               <td>
                   @if ($mhs['nim']%2==0)
                       <div class="bg-danger p-3 mx-auto" style="width: 20px"></div>
                    @else
                    <div class="bg-success p-3 mx-auto" style="width: 20px"></div>
                   @endif
               </td>
           </tr>
       @empty
           <div class="bg-danger p-3 text-white text-center">Data Kosong</div>
       @endforelse
    </table>
@endsection
