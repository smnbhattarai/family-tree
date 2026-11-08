@extends('layouts.app', [
    'pageTitle' => __('Relationship Finder')
])

@section('main_content')

    <div class="ft-page-header">
        <span class="ft-eyebrow">{{ __('Relationship') }}</span>
        <h2>{{ __('How are we related?') }}</h2>
        <p>{{ __('Pick two family members to see how they are connected.') }}</p>
    </div>

    <div class="row justify-content-center g-4">
        <div class="col-lg-10 col-xl-8">

            <form method="get" action="{{ route('page.relationship') }}" class="ft-surface ft-relationship-form mb-4">
                <div class="row g-3 align-items-end">
                    <div class="col-md">
                        @include('partials.form.select_input', [
                            'label' => __('Family member'),
                            'name' => 'from',
                            'options' => $members,
                            'selected' => $subject?->id,
                        ])
                    </div>
                    <div class="col-md-auto text-center mb-3">
                        <button type="button" class="btn btn-outline-secondary btn-icon" id="swapMembers" title="{{ __('Swap') }}" aria-label="{{ __('Swap') }}">
                            <i class="bi bi-arrow-left-right"></i>
                        </button>
                    </div>
                    <div class="col-md">
                        @include('partials.form.select_input', [
                            'label' => __('Related to'),
                            'name' => 'to',
                            'options' => $members,
                            'selected' => $relative?->id,
                        ])
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-diagram-2 me-1"></i> {{ __('Find relationship') }}</button>
                </div>
            </form>

            @if($subject && $relative)
                <div class="card ft-relationship-result">
                    <div class="card-body p-4 text-center">
                        @if($result === null)
                            <p class="h5 mb-0">
                                {{ __('No connection was found between :subject and :relative.', ['subject' => $subject->name(), 'relative' => $relative->name()]) }}
                            </p>
                        @elseif($subject->is($relative))
                            <p class="h5 mb-0">{{ __('You picked the same person twice.') }}</p>
                        @else
                            <p class="h4 mb-4">
                                <strong>{{ $subject->name() }}</strong>
                                {{ __('is') }}
                                <strong>{{ $relative->name() }}</strong>{{ __("'s") }}
                                <span class="badge rounded-pill text-bg-success fs-6 align-middle">{{ __($result['label']) }}</span>
                            </p>

                            <div class="ft-relatives justify-content-center align-items-center">
                                @foreach($result['path'] as $step)
                                    @if($step['relation'])
                                        <span class="small text-body-secondary">
                                            <i class="bi bi-arrow-right"></i> {{ __($step['relation']) }} <i class="bi bi-arrow-right"></i>
                                        </span>
                                    @endif
                                    @include('partials.relative_chip', ['relative' => $step['member'], 'route' => 'page.family.show'])
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection

@section('footerScript')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const renderMember = (size) => function (data, escape) {
                return `<div class="d-flex align-items-center">
                    <img alt="" src="${escape(data.image)}" width="${size}" height="${size}" style="border-radius:50%; margin-right:8px;">
                    <span>${escape(data.text)}</span>
                </div>`;
            };

            const selects = ['#from', '#to'].map((selector) => new TomSelect(selector, {
                render: {option: renderMember(30), item: renderMember(25)},
                maxItems: 1,
            }));

            document.querySelector('#swapMembers').addEventListener('click', function () {
                const [from, to] = selects.map((select) => select.getValue());
                selects[0].setValue(to);
                selects[1].setValue(from);
            });
        });
    </script>
@endsection
