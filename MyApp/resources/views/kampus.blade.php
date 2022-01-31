@extends('template.index')
@section('konten')
    <div class="main mt-5">
        <div class="row">

            <div class="col-12 col-lg-6">
                <a href="/mahasiswa" class="text-decoration-none text-dark">
                    <div class="card p-4" style="width:100%;">
                        <div class="icon">
                            <i class="fas fa-user-graduate" style="font-size: 5rem"></i>
                        </div>
                        <div class="title mt-3">
                            <h2>100 Mahasiswa</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-lg-6">
                <a href="/dosen" class="text-decoration-none text-dark">
                    <div class="card p-4" style="width:100%;">
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher" style="font-size: 5rem"></i>
                        </div>
                        <div class="title mt-3">
                            <h2>600 Dosen</h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
