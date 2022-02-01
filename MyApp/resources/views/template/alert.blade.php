<div class="alert alert-{{ $class }} alert-dismissible fade show" role="alert">
    <h4>{{ $judul }}</h4>
    {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>