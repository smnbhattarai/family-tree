@extends('layouts.app', [
    'pageTitle' => __('Family List')
])

@section('main_content')

    <div class="row g-4">

        <div class="col-lg-4">
            <div class="card ft-profile-card">
                <div class="ft-profile-banner"></div>
                <div class="card-body pt-0 pb-4">
                    @if($family->avatar)
                        <img src="{{ asset($family->avatar) }}" class="ft-profile-photo" alt="{{ $family->first_name }}">
                    @else
                        <div class="ft-profile-initial">{{ mb_substr($family->first_name, 0, 1) }}</div>
                    @endif
                    <h2 class="h3 mt-3 mb-2">{{ $family->name() }}</h2>
                    @if($family->gender == 'M')
                        <span class="ft-gender-badge is-male"><i class="bi bi-gender-male"></i> {{ __('Male') }}</span>
                    @else
                        <span class="ft-gender-badge is-female"><i class="bi bi-gender-female"></i> {{ __('Female') }}</span>
                    @endif

                    <div class="d-flex justify-content-center flex-wrap gap-2 mt-4">
                        <a class="btn btn-info btn-sm" href="{{ route('page.search.family') }}"><i class="bi bi-arrow-left"></i> {{ __('Back') }}</a>
                        @if(auth()->user()->isAdmin())
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.family.edit', $family) }}"><i class="bi bi-pencil"></i> {{ __('Edit') }}</a>
                        @else
                            @can('update', $family)
                                <a class="btn btn-primary btn-sm" href="{{ route('page.family.edit', $family) }}"><i class="bi bi-pencil"></i> {{ __('Edit') }}</a>
                            @endcan
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 mb-3"><i class="bi bi-person-vcard me-1"></i> {{ __('Personal Detail') }}</h3>
                    <table class="table table-borderless ft-detail-table mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">{{ __('First Name') }}</th>
                            <td>{{ $family->first_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Middle Name') }}</th>
                            <td>{{ $family->middle_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Last Name') }}</th>
                            <td>{{ $family->last_name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Date of Birth') }}</th>
                            <td>{{ $family->dob }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Gender') }}</th>
                            <td>{{ $family->gender }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Email') }}</th>
                            <td>{{ $family->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Phone') }}</th>
                            <td>{{ $family->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Address') }}</th>
                            <td>{{ $family->address }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    <h3 class="h5 mb-3"><i class="bi bi-people me-1"></i> {{ __('Family Detail') }}</h3>
                    <table class="table table-borderless ft-detail-table mb-0">
                        <tbody>
                        <tr>
                            <th scope="row">{{ __('Father') }}</th>
                            <td>
                                @if($family->father)
                                    <div class="ft-relatives">
                                        @include('partials.relative_chip', ['relative' => $family->father, 'route' => 'page.family.show'])
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Mother') }}</th>
                            <td>
                                @if($family->mother)
                                    <div class="ft-relatives">
                                        @include('partials.relative_chip', ['relative' => $family->mother, 'route' => 'page.family.show'])
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Spouse') }}</th>
                            <td>
                                @if($spouses = $family->spouses())
                                    <div class="ft-relatives">
                                        @foreach($spouses as $spouse)
                                            @include('partials.relative_chip', ['relative' => $spouse, 'route' => 'page.family.show'])
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Children(s)') }}</th>
                            <td>
                                @if($childrens = $family->childrens())
                                    <div class="ft-relatives">
                                        @foreach($childrens as $children)
                                            @include('partials.relative_chip', ['relative' => $children, 'route' => 'page.family.show'])
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Sibling(s)') }}</th>
                            <td>
                                @if(($siblings = $family->siblings())->isNotEmpty())
                                    <div class="ft-relatives">
                                        @foreach($siblings as $sibling)
                                            @include('partials.relative_chip', ['relative' => $sibling, 'route' => 'page.family.show'])
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
