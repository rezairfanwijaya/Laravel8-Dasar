@extends('template.index')
@section('konten')
    {{-- @dd($insertSingle) --}}
    <div class="konten mt-3 bg-white rounded shadow-sm p-3">
        <ol>
            <div class="insert">
                <li>Insert</li>
                <div class="single">
                    <ul>
                        <li>
                            Data tunggal <br>
                            <code> $result = DB::table('mobils')->insert(
                                [
                                'merk' => 'Lamborghini',
                                'warna' => 'Hitam',
                                'harga' => 120000,
                                'created_at' => now(),
                                'updated_at' => now()
                                ]
                                );

                                var_dump($result);</code>
                            <br>
                            <a href="/qb/insert">Klik disini</a> untuk menjalankan code
                            @forelse ($insertSingle as $item)
                                <p>id -> {{ $item->id }} merk -> {{ $item->merk }} warna -> {{ $item->warna }} harga
                                    -> {{ $item->harga }} <a href="{{ route('hapus', [$item->id]) }}">(delete)</a>
                                </p>
                            @empty
                            @endforelse
                        </li>

                        <li>Data Jamak <br>
                            <code> $result = DB::table('mobils')->insert([
                                [
                                'merk' => 'Avanza',
                                'warna' => 'Putih',
                                'harga' => 4000,
                                'created_at' => now(),
                                'updated_at' => now()
                                ],
                                [
                                'merk' => 'Mazda',
                                'warna' => 'Hitam',
                                'harga' => 40090,
                                'created_at' => now(),
                                'updated_at' => now()
                                ],
                                [
                                'merk' => 'Mercedes Benz',
                                'warna' => 'Merah',
                                'harga' => 56000,
                                'created_at' => now(),
                                'updated_at' => now()
                                ]
                                ]);</code><br>
                            <a href="{{ url('/qb/insertMany') }}">Klik disini</a> untuk menjalankan code
                            <br>
                            @forelse ($insertJamak as $item)
                                <p>id->{{ $item->id }} merk->{{ $item->merk }} warna {{ $item->warna }} harga
                                    {{ $item->harga }} <a href="{{ route('hapus', [$item->id]) }}">(delete)</a>
                                </p>
                            @empty
                            @endforelse
                        </li>
                    </ul>
                </div>

            </div>

            <div class="update mt-3">
                <li>Update</li>
                <code> $result = DB::table('mobils')->where('merk', 'avanza')->update([
                    'merk' => 'Ferrari',
                    'harga' => 5000
                    ]);</code>
            </div>

            <div class="lilst-mobils mt-3">
                <li>Daftar Mobil</li>
                <ol>
                    @forelse ($all as $item)
                    <li><a href="{{ route('detail', ['merk'=>$item->merk]) }}">{{ $item->merk }}</a></li>
                    
                    @empty
                    @endforelse
                </ol>
            </div>
        </ol>
    </div>
@endsection
