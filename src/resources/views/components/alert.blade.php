@if ($session)
    <div class="alert alert-{{ $type }}"></div>
    {{ $session }}
@endif
