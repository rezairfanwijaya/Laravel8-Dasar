<h1>Data Mobil {{ $detail->merk }}</h1>
<h2>Merk : {{ $detail->merk }}</h2>
<h2>Warna : {{ $detail->warna }}</h2>
<h2>Harga : Rp  {{ number_format($detail->harga, 0,  ',', '.')  }}</h2>

<a href="{{ route('queryBuilder') }}" >Kembali ke beranda</a>