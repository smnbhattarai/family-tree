@extends('layouts.app', [
    'pageTitle' => __('Login')
])

@section('main_content')

    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">

            <form class="mt-5" method="POST" action="{{ route('login') }}">

                @csrf

                <img class="mb-4" src="{{ config('app.url') . '/assets/images/logo.svg' }}"
                     alt="{{ config('app.name') }}" width="72" height="57">

                <h1 class="h3 mb-3 fw-normal">{{ __('Please sign in') }}</h1>

                <div class="form-floating">
                    <input type="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                           placeholder="name@example.com">
                    <label for="email">{{ __('Email address') }}</label>
                    @error('email')
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>@enderror
                </div>

                <button class="btn btn-primary w-100 py-2 my-3" type="submit">{{ __('Sign in') }}</button>

            </form>

        </div>

        <div class="col-md-4"></div>
    </div>

@endsection
