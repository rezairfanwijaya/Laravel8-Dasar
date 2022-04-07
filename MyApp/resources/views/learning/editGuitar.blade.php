@extends('template.index')

@section('konten')
    {{-- @dd($gitar) --}}
    <form action={{ route('guitar.update',['id' => $gitar->id]) }} method="post" class="bg-white p-4 mt-4 shadow-sm rounded">
        <h5 class="mb-4">Edit Data Gitar</h5>
        @method('PATCH')
        @csrf

        <div class="mb-3">
            <label for="merk" class="form-label">@lang('formGuitar.input.merk')</label>
            <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" id="merk"
                value={{ old('merk') ?? $gitar->merk}}>
            @error('merk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_seri" class="form-label">@lang('formGuitar.input.seri')</label>
            <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror"
                id="no_seri" value={{ old('serial_number') ?? $gitar->serial_number}}>
            @error('serial_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="warna" class="form-label">@lang('formGuitar.input.warna')</label>
            <input type="text" name="warna" class="form-control @error('warna') is-invalid @enderror" id="warna"
                value={{ old('warna') ?? $gitar->warna}}>
            @error('warna')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">@lang('formGuitar.input.harga')</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga"
                value={{ old('harga') ?? $gitar->harga }}>
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="jenis" class="form-label">@lang('formGuitar.input.jenis')</label>
            <select name="jenis" id="jenis" class="form-select">

                <option value="Klasik" {{ (old('jenis') ?? $gitar->jenis) == 'Klasik' ? 'selected' : ''}}>
                    @lang('formGuitar.input.pilihan_jenis.klasik')
                </option>

                <option value="Bass" {{ (old('jenis') ?? $gitar->jenis) == 'Bass' ? 'selected' : '' }}>
                    @lang('formGuitar.input.pilihan_jenis.bass')
                </option>

                <option value="Rock" {{ (old('jenis') ?? $gitar->jenis) == 'Rock' ? 'selected' : '' }}>
                    @lang('formGuitar.input.pilihan_jenis.rock')
                </option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%">@lang('formGuitar.tombol')</button>
    </form>
@endsection