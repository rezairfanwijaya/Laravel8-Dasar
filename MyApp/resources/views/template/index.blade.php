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
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <title>{{ $title }}</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/kampus">Kampus Belajar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Kampus | Belajar' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('kampus') }}">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Mahasiswa' ? 'active' : '' }}"
                            href="{{ route('mahasiswa') }}">Mahasiswa</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Dosen' ? 'active' : '' }}" href="{{ route('dosen') }}">Dosen</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Tentang' ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Admin | Dashboard' ? 'active' : '' }}" href="{{ route('admin', ['nama'=>'Kampus Belajar']) }}">Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Laravel Mix' ? 'active' : '' }}" href="{{ route('laravel.mix') }}">Laravel Mix</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Laravel UI' ? 'active' : '' }}" href="{{ route('laravel.ui') }}">Laravel UI</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Collection' ? 'active' : '' }}" href="{{ route('laravel.collection') }}">Collection</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'DB Facade' ? 'active' : '' }}" href="{{ route('laravel.dbfacade') }}">DB Facade</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Query Builder' ? 'active' : '' }}" href="{{ route('queryBuilder') }}">Query Builder</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Eloquent ORM' ? 'active' : '' }}" href="{{ route('eloquent') }}">Eloquent ORM</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Form' ? 'active' : '' }}" href="{{ route('form') }}">Form</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('konten')
    </div>

    <div class="footer bg-dark text-white text-center p-3 mt-5">
        <footer>
            Copyright | {{ date('Y') }}
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- js External --}}
    <script src="/js/script.js"></script>

</body>

</html>




