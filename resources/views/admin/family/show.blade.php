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
                                <a href="{{ route('admin.family.show', $family->father->id) }}">{{ $family->father->name() }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Mother') }}</th>
                            <td>
                                @if($family->mother)
                                <a href="{{ route('admin.family.show', $family->mother->id) }}">{{ $family->mother->name() }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{ __('Spouse') }}</th>
                            <td>
                                @if($family->spouses())
                                @foreach($family->spouses() as $spouse)
                                    <a href="{{ route('admin.family.show', $spouse->id) }}">{{ $spouse->name() }}</a><br>
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p class="my-5">
                        <a class="btn btn-info btn-sm" href="{{ route('admin.family.index') }}">{{ __('Back') }}</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.family.edit', $family) }}">{{ __('Edit') }}</a>
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
