<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- CSS External --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>Admin | Dashboard</title>
</head>

<body>

    <div class="container">
        <div class="main bg-white p-4 mt-5 shadow-sm">
            <h3 class="text-center mb-5">Halaman Admin</h3>

            @component('template.alert')
            @slot('class')
                warning
            @endslot
            @slot('judul')
                Client
            @endslot
                100 data mahasiswa harus diupdate
            @endcomponent


            @component('template.alert', ['class'=>'danger', 'judul'=>'Server'])
                Terdapat kebocoran data pada server
            @endcomponent
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- js External --}}
    <script src="/js/script.js"></script>

</body>

</html>
