@extends('layouts.app', [
    'pageTitle' => __('Birthdays')
])

@section('main_content')

    <div class="ft-page-header">
        <span class="ft-eyebrow">{{ __('Birthdays') }}</span>
        <h2>{{ __('Upcoming birthdays') }}</h2>
        <p>{{ __('Every birthday in the family over the next twelve months.') }}</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            @forelse($birthdaysByMonth as $month => $birthdays)
                <section class="card mb-4">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3"><i class="bi bi-calendar-heart me-1"></i> {{ $month }}</h3>
                        <ul class="ft-birthdays">
                            @foreach($birthdays as $birthday)
                                @include('partials.birthday_item', ['birthday' => $birthday])
                            @endforeach
                        </ul>
                    </div>
                </section>
            @empty
                <div class="ft-empty">
                    <i class="bi bi-cake2"></i>
                    <p class="mt-2 mb-0">{{ __('No birthdays recorded yet. Add dates of birth to family members to see them here.') }}</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection
