@extends('template.index')

@section('konten')

<link rel="stylesheet" href="{{ asset('sass/sass.css') }}">

    <div class="row konten">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1566837945700-30057527ade0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Gambar Pertama</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk
                        of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1537884944318-390069bb8665?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Gambar Kedua</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="https://images.unsplash.com/photo-1617042375876-a13e36732a04?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Gambar Ketiga</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection
