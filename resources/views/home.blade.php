@extends('layouts.app', [
    'pageTitle' => config('app.name')
])

@section('main_content')

    <section class="ft-hero row align-items-center g-5">

        <div class="col-lg-6 order-2 order-lg-1">
            @auth
                <span class="ft-eyebrow">{{ __('Welcome') }}, {{ auth()->user()->name }}</span>
            @else
                <span class="ft-eyebrow">{{ config('app.name') }}</span>
            @endauth

            <h1 class="mb-3">{{ __('Every branch tells a story.') }}</h1>

            @auth
                <p class="lead mb-4">{{ __('Feel free to reach out if you want to add new information or want to update existing record.') }}</p>
                <div class="d-flex flex-wrap gap-2 mb-5">
                    <a href="{{ route('page.family') }}" class="btn btn-primary btn-lg"><i class="bi bi-diagram-3 me-1"></i> {{ __('Explore the tree') }}</a>
                    <a href="{{ route('page.search.family') }}" class="btn btn-accent btn-lg"><i class="bi bi-search me-1"></i> {{ __('Find a relative') }}</a>
                </div>
            @else
                <p class="lead mb-4">{{ __('A private home for our family history — the people, the places and the connections that bring us together.') }}</p>
                <div class="d-flex flex-wrap gap-2 mb-5">
                    <a href="{{ route('page.sign.in') }}" class="btn btn-primary btn-lg"><i class="bi bi-box-arrow-in-right me-1"></i> {{ __('Sign in to explore') }}</a>
                </div>
            @endauth

            <div class="row g-4">
                <div class="col-sm-4">
                    <div class="ft-feature">
                        <span class="ft-feature-icon"><i class="bi bi-diagram-3"></i></span>
                        <div>
                            <h6>{{ __('Explore') }}</h6>
                            <p>{{ __('Walk through generations.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="ft-feature">
                        <span class="ft-feature-icon is-accent"><i class="bi bi-people"></i></span>
                        <div>
                            <h6>{{ __('Connect') }}</h6>
                            <p>{{ __('See how everyone is related.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="ft-feature">
                        <span class="ft-feature-icon"><i class="bi bi-journal-bookmark"></i></span>
                        <div>
                            <h6>{{ __('Preserve') }}</h6>
                            <p>{{ __('Keep records up to date.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 order-1 order-lg-2">
            <div class="ft-hero-figure">
                <img id="familyTreeFig" src="{{ config('app.url') . '/assets/images/tree.svg' }}" alt="{{ config('app.name') }}"
                     class="img-fluid mx-auto d-block">
            </div>
        </div>

    </section>

    @auth
        @if($stats['total'] > 0)
            <section class="ft-stats mt-5" aria-label="{{ __('Family at a glance') }}">
                <div class="ft-stat">
                    <span class="ft-stat-icon"><i class="bi bi-people"></i></span>
                    <span class="ft-stat-value">{{ number_format($stats['total']) }}</span>
                    <span class="ft-stat-label">{{ trans_choice('Member|Members', $stats['total']) }}</span>
                </div>
                <div class="ft-stat">
                    <span class="ft-stat-icon is-accent"><i class="bi bi-diagram-3"></i></span>
                    <span class="ft-stat-value">{{ $stats['generations'] }}</span>
                    <span class="ft-stat-label">{{ trans_choice('Generation|Generations', $stats['generations']) }}</span>
                </div>
                <div class="ft-stat">
                    <span class="ft-stat-icon"><i class="bi bi-gender-ambiguous"></i></span>
                    <span class="ft-stat-value">
                        <span class="ft-stat-male">{{ $stats['male'] }}</span><span class="ft-stat-divider">/</span><span class="ft-stat-female">{{ $stats['female'] }}</span>
                    </span>
                    <span class="ft-stat-label">{{ __('Male / Female') }}</span>
                </div>
                @if($stats['common_surname'] !== null)
                    <div class="ft-stat">
                        <span class="ft-stat-icon is-accent"><i class="bi bi-person-badge"></i></span>
                        <span class="ft-stat-value text-truncate">{{ $stats['common_surname'] }}</span>
                        <span class="ft-stat-label">{{ __('Most common surname (:count)', ['count' => $stats['common_surname_count']]) }}</span>
                    </div>
                @endif
            </section>
        @endif

        <section class="card ft-birthdays-card mt-5">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <h2 class="h5 mb-0"><i class="bi bi-cake2 me-1"></i> {{ __('Birthdays in the next 30 days') }}</h2>
                    <a href="{{ route('page.birthdays') }}" class="btn btn-outline-secondary btn-sm">{{ __('All birthdays') }} <i class="bi bi-arrow-right"></i></a>
                </div>
                @if($birthdays->isEmpty())
                    <p class="text-body-secondary mb-0">{{ __('No birthdays coming up in the next 30 days.') }}</p>
                @else
                    <ul class="ft-birthdays">
                        @foreach($birthdays as $birthday)
                            @include('partials.birthday_item', ['birthday' => $birthday])
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endauth

@endsection
