@extends('template.index')
@section('konten')

    <div class="main my-4">
        <div class="num bg-white mb-4 shadow-sm p-4">
            <h5>Collection dengan output array numeric</h5>
            {{ $collectNUM }}
        </div>

        <div class="json">
            <div class="num bg-white mb-4 p-4 shadow-sm">
                <h5>Collection dengan output JSON/Object</h5>
                {{ $collectJSON }}
            </div>
        </div>
    </div>
@endsection
