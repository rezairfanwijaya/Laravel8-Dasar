@extends('template.index')
@section('konten')
    {{-- memunculkan kata dari localization di folder resources/lang/en/auth --}}
    {{-- dengan syntax __('namaFile.key') --}}
    <h4 class="mt-5">{{ __('test.judul') }}</h4>

    {{-- bisa juga seperti ini --}}
    <h1 class="mt-5">@lang('test.judul')</h1>

    {{-- akses dari nested array --}}
    <p class="text-primary">Ini warna @lang('test.home.warna')</p>
    <p class="text-danger">Sekarang hari @lang('test.home.hari')</p>

    {{-- membuat form dalam 2 versi bahasa --}}
    <div class="cover bg-white p-5 my-5 rounded shadow-sm">
        <form action="{{ route('localization.store') }}" method="POST">
            @csrf
            <p class="text-center mb-5 fs-4 ">@lang('form.judul')</p>
            <div class="mb-3">
                <label for="merk" class="form-label">@lang('form.input.merk')</label>
                <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk"
                    value={{ old('merk') }}>
                @error('merk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id" class="form-label">@lang('form.input.no_seri')</label>
                <input type="text" class="form-control @error('no_seri') is-invalid @enderror" id="id" name="no_seri"
                    value={{ old('no_seri') }}>
                @error('no_seri')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="warna" class="form-label">@lang('form.input.warna')</label>
                <input type="text" class="form-control @error('warna') is-invalid @enderror " id="warna" name="warna"
                    value={{ old('warna') }}>
                @error('warna')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">@lang('form.input.harga')</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                    value={{ old('harga') }}>
                @error('harga')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">@lang('form.input.jenis')</label>
                <select name="jenis" id="jenis" class="form-select">
                    <option value="Electric" {{ old('jenis') == 'Electric' ? 'selected' : '' }}>
                        @lang('form.input.pilihan_jenis.elektrik')
                    </option>

                    <option value="Bass" {{ old('jenis') == 'Bass' ? 'selected' : '' }}>
                        @lang('form.input.pilihan_jenis.bass')
                    </option>

                    <option value="Classic" {{ old('jenis') == 'Classic' ? 'selected' : '' }}>
                        @lang('form.input.pilihan_jenis.klasik')
                    </option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-4" style="width: 100%">{{ __('form.tombol') }}</button>
        </form>
    </div>
@endsection
