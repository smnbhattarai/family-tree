@extends('layouts.app', [
    'pageTitle' => __('Family List')
])

@section('main_content')

    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless table-hover">
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
                        <tr>
                            <th scope="row">{{ __('Father') }}</th>
                            <td>
                                @if($family->father)
                                <a href="{{ route('page.family.show', $family->father->id) }}">{{ $family->father->name() }}</a>
                                    @if($family->father->gender == 'M')
                                        <sup class="btn-male"><i class="bi bi-gender-male"></i></sup>
                                    @else
                                        <sup class="btn-female"><i class="bi bi-gender-female"></i></sup>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Mother') }}</th>
                            <td>
                                @if($family->mother)
                                <a href="{{ route('page.family.show', $family->mother->id) }}">{{ $family->mother->name() }}</a>
                                    @if($family->mother->gender == 'M')
                                        <sup class="btn-male"><i class="bi bi-gender-male"></i></sup>
                                    @else
                                        <sup class="btn-female"><i class="bi bi-gender-female"></i></sup>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Spouse') }}</th>
                            <td>
                                @if($spouses = $family->spouses())
                                @foreach($spouses as $spouse)
                                    <a href="{{ route('page.family.show', $spouse->id) }}">{{ $spouse->name() }}</a>
                                    @if($spouse->gender == 'M')
                                        <sup class="btn-male"><i class="bi bi-gender-male"></i></sup>
                                    @else
                                        <sup class="btn-female"><i class="bi bi-gender-female"></i></sup>
                                    @endif
                                    <br>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Children(s)') }}</th>
                            <td>
                                @if($childrens = $family->childrens())
                                @foreach($childrens as $children)
                                    <a href="{{ route('page.family.show', $children->id) }}">{{ $children->name() }}</a>
                                    @if($children->gender == 'M')
                                        <sup class="btn-male"><i class="bi bi-gender-male"></i></sup>
                                    @else
                                        <sup class="btn-female"><i class="bi bi-gender-female"></i></sup>
                                    @endif
                                    <br>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Sibling(s)') }}</th>
                            <td>
                                @if($siblings = $family->siblings())
                                @foreach($siblings as $sibling)
                                    <a href="{{ route('page.family.show', $sibling->id) }}">{{ $sibling->name() }}</a>
                                    @if($sibling->gender == 'M')
                                        <sup class="btn-male"><i class="bi bi-gender-male"></i></sup>
                                    @else
                                        <sup class="btn-female"><i class="bi bi-gender-female"></i></sup>
                                    @endif
                                    <br>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p class="my-5">
                        <a class="btn btn-info btn-sm" href="{{ route('page.search.family') }}">{{ __('Back') }}</a>
                        @if(auth()->user()->isAdmin())
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.family.edit', $family) }}">{{ __('Edit') }}</a>
                        @else
                            @can('update', $family)
                                <a class="btn btn-primary btn-sm" href="{{ route('page.family.edit', $family) }}">{{ __('Edit') }}</a>
                            @endcan
                        @endif
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            @if($family->avatar)
            <div class="card">
                <img src="{{ asset($family->avatar) }}" class="card-img-top" alt="{{ $family->first_name }}">
            </div>
            @endif
        </div>

    </div>

@endsection
