@extends('template.index')
@section('konten')
    {{-- mengakses pesan berhasil tambah gitar lewat flash --}}
    @if (session()->has('pesan'))
        <div class="mt-5 alert alert-success">
            {{ session()->get('pesan') }}
        </div>
    @endif

    {{-- mengakses pesan berhasil hapus gitar lewat flash --}}
    @if (session()->has('pesanHapus'))
        <div class="mt-5 alert alert-danger">
            {{ session()->get('pesanHapus') }}
        </div>
    @endif


    <div class="cover mt-5">
        <div class="d-flex justify-content-between align-items-center bg-white p-3 shadow-sm rounded mb-5">
            <div class="fs-2">@lang('formGuitar.head')</div>
            <div class="d-flex">
                <div class="">@lang('formGuitar.bahasa')</div>
                <a href={{ route('guitar.form.en') }} class="ms-3 me-2">En</a>
                <a href={{ route('guitar.form.id') }}>Id</a>
            </div>
        </div>



        {{-- tampil data guitar --}}
        <div class="tampil-data my-4 bg-white p-3 shadow-sm rounded">
            <p class="fs-2 mb-4">Daftar Gitar</p>
            <table class="table text-center ">
                <tr>
                    <th>No</th>
                    <th>Brand</th>
                    <th>Serial Number</th>
                    <th>Action</th>
                </tr>

                @foreach ($guitars as $guitar)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guitar->merk }}</td>
                        <td>{{ $guitar->serial_number }}</td>
                        <td>
                            <a href={{ route('guitar.show', ['guitar' => $guitar->id]) }}>Detail</a>
                        </td>
                    </tr>
                @endforeach


            </table>
        </div>



        <form action={{ route('guitar.store') }} method="post" class="bg-white p-4 shadow-sm rounded">
            <h5 class="mb-4">@lang('formGuitar.judul')</h5>

            @csrf

            <div class="mb-3">
                <label for="merk" class="form-label">@lang('formGuitar.input.merk')</label>
                <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" id="merk"
                    value={{ old('merk') }}>
                @error('merk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_seri" class="form-label">@lang('formGuitar.input.seri')</label>
                <input type="text" name="serial_number" class="form-control @error('noSeri') is-invalid @enderror"
                    id="no_seri" value={{ old('noSeri') }}>
                @error('noSeri')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="warna" class="form-label">@lang('formGuitar.input.warna')</label>
                <input type="text" name="warna" class="form-control @error('warna') is-invalid @enderror" id="warna"
                    value={{ old('warna') }}>
                @error('warna')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">@lang('formGuitar.input.harga')</label>
                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga"
                    value={{ old('harga') }}>
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="jenis" class="form-label">@lang('formGuitar.input.jenis')</label>
                <select name="jenis" id="jenis" class="form-select">

                    <option value="Klasik" {{ old('jenis') === 'Klasik' ? 'selected' : '' }}>
                        @lang('formGuitar.input.pilihan_jenis.klasik')
                    </option>

                    <option value="Bass" {{ old('jenis') === 'Bass' ? 'selected' : '' }}>
                        @lang('formGuitar.input.pilihan_jenis.bass')
                    </option>

                    <option value="Rock" {{ old('jenis') === 'Rock' ? 'selected' : '' }}>
                        @lang('formGuitar.input.pilihan_jenis.rock')
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%">@lang('formGuitar.tombol')</button>
        </form>
    </div>
@endsection
