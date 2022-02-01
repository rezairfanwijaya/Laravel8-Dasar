@extends('template.index')

@section('konten')
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
@endsection

 