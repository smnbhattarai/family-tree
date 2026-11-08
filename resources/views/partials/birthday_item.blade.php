@php
    /** @var array{member: \App\Models\Family, date: \Carbon\CarbonImmutable, days_away: int, turning: int} $birthday */
@endphp
<li class="ft-birthday {{ $birthday['days_away'] === 0 ? 'is-today' : '' }}">
    <span class="ft-birthday-date">
        <span class="ft-birthday-day">{{ $birthday['date']->format('j') }}</span>
        <span class="ft-birthday-month">{{ $birthday['date']->format('M') }}</span>
    </span>
    <img src="{{ $birthday['member']->thumbnailPath() }}" alt="" class="ft-birthday-photo">
    <span class="ft-birthday-body">
        <a href="{{ route('page.family.show', $birthday['member']) }}" class="ft-birthday-name">{{ $birthday['member']->name() }}</a>
        <span class="ft-birthday-meta">
            {{ __('Turns :age', ['age' => $birthday['turning']]) }} &middot; {{ $birthday['date']->format('l') }}
        </span>
    </span>
    <span class="ft-birthday-when">
        @if($birthday['days_away'] === 0)
            <span class="badge rounded-pill text-bg-warning"><i class="bi bi-cake2"></i> {{ __('Today') }}</span>
        @elseif($birthday['days_away'] === 1)
            {{ __('Tomorrow') }}
        @else
            {{ __('In :days days', ['days' => $birthday['days_away']]) }}
        @endif
    </span>
</li>
