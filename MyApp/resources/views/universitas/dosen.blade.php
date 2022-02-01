@extends('template.index')
@section('konten')

    <div class="main bg-white p-3 mt-5 shadow rounded">
        <h5 class="">Daftar Dosen</h5>
        <table class="table table-stiped text-center table-bordered my-2">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Keahlian</th>
                <th>Status</th>
            </tr>
            @forelse ($dosen as $dsn)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dsn['nama'] }}</td>
                    <td>{{ $dsn['nip'] }}</td>
                    <td>{{ $dsn['keahlian'] }}</td>
                    <td>
                        @if ($dsn['nip'] % 2 == 0)
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
    </div>
@endsection
