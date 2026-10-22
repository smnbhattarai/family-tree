@extends('layouts.app', [
    'pageTitle' => __('Login')
])

@section('main_content')

    <div class="card ft-auth-card">

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <img class="ft-auth-logo" src="{{ config('app.url') . '/assets/images/logo.svg' }}"
                 alt="{{ config('app.name') }}">

            <h1 class="h3 mb-1">{{ __('Please sign in') }}</h1>
            <p class="text-body-secondary mb-4">{{ __('We will email you a secure link to sign in.') }}</p>

            <div class="form-floating text-start">
                <input type="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                       placeholder="name@example.com">
                <label for="email">{{ __('Email address') }}</label>
                @error('email')
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>@enderror
            </div>

            <button class="btn btn-primary btn-lg w-100 mt-4" type="submit">{{ __('Sign in') }}</button>

        </form>

    </div>

@endsection
