<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Guitar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>{{ $gitar->merk }}</h1>
        <hr>
        <ul>
            <li>Serial number : {{ $gitar->serial_number }}</li>
            <li>Warna : {{ $gitar->warna }}</li>
            <li>Harga : Rp {{ number_format($gitar->harga, 0, ',', '.') }}</li>
            <li>Jenis : {{ $gitar->jenis }}</li>
        </ul>

        <a href={{ route('guitar.home') }} class="btn btn-primary">Beranda</a>
    </div>
</body>

</html>
