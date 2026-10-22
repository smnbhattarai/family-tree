<a class="ft-relative-chip" href="{{ route($route, $relative->id) }}">
    {{ $relative->name() }}
    @if($relative->gender == 'M')
        <sup class="btn-male"><i class="bi bi-gender-male"></i></sup>
    @else
        <sup class="btn-female"><i class="bi bi-gender-female"></i></sup>
    @endif
</a>
