@extends('layouts.app', [
    'pageTitle' => __('Family List')
])

@section('main_content')

    <div class="row">
        <div class="col-md-12"></div>

        <div class="col-md-12">
            <table class="table table-hover table-bordered border-secondary-subtle">
                <thead>
                <tr>
                    <th scope="col">{{ __('S.No.') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Email') }}</th>
                    <th scope="col">{{ __('Tel') }}</th>
                    <th scope="col">{{ __('Address') }}</th>
                    <th scope="col">{{ __('Father') }}</th>
                    <th scope="col">{{ __('Mother') }}</th>
                    <th scope="col">{{ __('Spouse') }}</th>
                    <th scope="col">{{ __('Gender') }}</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($families as $family)
                    <tr>
                        <td>{{ $family->id }}</td>
                        <td>
                            @if($family->avatar)
                                <img src="{{ $family->avatar }}" alt="Avatar" width="30" height="30"> &nbsp;&nbsp;
                            @endif
                            {{ $family->name() }}
                        </td>
                        <td>{{ $family->email }}</td>
                        <td>{{ $family->phone }}</td>
                        <td>{{ $family->address }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            @if($family->gender == 'M')
                            <button class="btn btn-male btn-sm"><i class="bi bi-gender-male"></i></button>
                            @else
                            <button class="btn btn-female btn-sm"><i class="bi bi-gender-female"></i></button>
                                @endif
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.family.show', $family->id) }}" role="button"><i class="bi bi-eye-fill"></i></a>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.family.edit', $family->id) }}" role="button"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-danger btn-sm" href="#" role="button"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $families->links() }}

        </div>
    </div>

@endsection
