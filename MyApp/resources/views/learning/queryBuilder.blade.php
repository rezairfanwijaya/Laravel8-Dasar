@extends('template.index')
@section('konten')
{{-- @dd($insertSingle) --}}
    <div class="konten mt-3 bg-white rounded shadow-sm p-3">
        <ol>
            <div class="insert">
                <li>Insert</li>
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
                    <p>id -> {{ $item->id }}  merk -> {{ $item->merk }}  warna -> {{ $item->warna }}  harga -> {{ $item->harga }}  <a href="{{ route('hapus', [$item->id]) }}">(delete)</a> 
                     </p>
                @empty
                    
                @endforelse
            </div>
        </ol>
    </div>
@endsection
