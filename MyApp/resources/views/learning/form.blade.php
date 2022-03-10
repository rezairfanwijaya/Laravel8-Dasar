@extends('template.index')
@section('konten')
    {{-- @dump($errors) --}}
    <div class="cover bg-white p-5 my-5 rounded shadow-sm">
        <form action="{{ route('form-process-validator') }}" method="POST">
            @csrf
            <p class="text-center mb-5 fs-4 ">Form Registrasi Karyawan</p>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value={{ old('nama') }}>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id" class="form-label">No ID Karyawan</label>
                <input type="text" class="form-control @error('idKaryawan') is-invalid @enderror" id="id" name="idKaryawan"
                    value={{ old('idKaryawan') }}>
                @error('idKaryawan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telpon" class="form-label">No Telepon</label>
                <input type="text" class="form-control @error('telpon') is-invalid @enderror " id="telpon" name="telpon"
                    value={{ old('telpon') }}>
                @error('telpon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror " id="alamat" name="alamat"
                    value={{ old('alamat') }}>
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" min="20" max="35" class="form-control @error('usia') is-invalid @enderror" id="usia"
                    name="usia" value={{ old('usia') }}>
                @error('usia')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="d-flex align-items-center">
                    <input type="radio" name="jenisKelamin" value="L" class="me-1"
                        {{ old('jenisKelamin') == 'L' ? 'checked' : '' }}>Laki-Laki

                    <input type="radio" name="jenisKelamin" value="P" class="ms-3 me-1"
                        {{ old('jenisKelamin') == 'P' ? 'checked' : '' }}>Perempuan
                </div>
                @error('jenisKelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="domisili" class="form-label">Domisili</label>
                <input type="text" class="form-control @error('domisili') is-invalid @enderror" id="domisili"
                    name="domisili" value={{ old('domisili') }}>
                @error('domisili')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <select name="posisi" id="posisi" class="form-control">
                    <option value="Office Boy" {{ old('posisi') == 'Office Boy' ? 'selected' : '' }}>
                        Office Boy
                    </option>

                    <option value="Waiters" {{ old('posisi') == 'Waiters' ? 'selected' : '' }}>
                        Waiters
                    </option>

                    <option value="Web Developer" {{ old('posisi') == 'Web Developer' ? 'selected' : '' }}>
                        Web Developer
                    </option>

                    <option value="Mobile Developer" {{ old('posisi') == 'Mobile Developer' ? 'selected' : '' }}>
                        Mobile Developer
                    </option>

                    <option value="Quality Engineers" {{ old('posisi') == 'Quality Engineers' ? 'selected' : '' }}>
                        Quality Engineers
                    </option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-4" style="width: 100%">Daftar</button>
        </form>
    </div>
@endsection
