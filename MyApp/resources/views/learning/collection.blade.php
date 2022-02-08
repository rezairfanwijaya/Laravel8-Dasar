@extends('template.index')
@section('konten')

    <div class="main my-4">
        <div class="num bg-white mb-4 shadow-sm p-4">
            <h5>Collection string dengan output array numeric</h5>
            {{ $collectNUM }}
            <hr>
            <h6>Method min()</h6>
            {{ $minNama }}

            <hr>
            <h6>Method max()</h6>
            {{ $maxNama }}

            <hr>
            <h6>Method random()</h6>
            {{ $ranNama }}

            <hr>
            <h6>Method concat()</h6>
            {{ $concNama }}

            <hr>
            <h6>Method first()</h6>
            {{ $firstNama }}

            <hr>
            <h6>Method last()</h6>
            {{ $lastNama }}

        </div>

        <div class="num bg-white mb-4 p-4 shadow-sm">
            <h5>Collection angka dengan output array</h5>
            {{ $angka }}
            <hr>
            <h6>Method min()</h6>
            {{ $minAngka }}

            <hr>
            <h6>Method max()</h6>
            {{ $maxAngka }}

            <hr>
            <h6>Method sum()</h6>
            {{ $sumAngka }}

            <hr>
            <h6>Method avg()</h6>
            {{ $avgAngka }}

            <hr>
            <h6>Method median()</h6>
            {{ $medAngka }}

            <hr>
            <h6>Method random()</h6>
            {{ $ranAngka }}

            <hr>
            <h6>Method concat()</h6>
            {{ $concAngka }}

            <hr>
            <h6>Method first()</h6>
            {{ $firstAngka }}

            <hr>
            <h6>Method last()</h6>
            {{ $lastAngka }}
        </div>

        <div class="num bg-white mb-4 p-4 shadow-sm">
            <h5>Collection dengan output JSON/Object</h5>
            {{ $collectJSON }}
        </div>

    </div>
@endsection
