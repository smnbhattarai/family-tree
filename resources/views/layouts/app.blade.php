<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1f3d30">

    <title>{{ $pageTitle ?? config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @yield('style')
    @yield('headerScript')

</head>
<body>

@include('layouts.navbar')

<!--Main layout-->
<main class="ft-main @yield('mainClass')">
    <div class="@hasSection('containerClass')@yield('containerClass')@else container @endif">

        @if(session('success') || session('error') || session('info'))
            @include('partials.alert')
        @endif

        @yield('main_content')

    </div>
</main>
<!--Main layout-->

<footer class="ft-footer">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <span>&copy; {{ now()->year }} {{ config('app.name') }}</span>
        <span>{{ __('Keeping our roots connected') }} <i class="bi bi-heart-fill"></i></span>
    </div>
</footer>

@yield('footerScript')

@auth
    <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
        @csrf
        <button type="submit" class="btn btn-link text-light">Logout</button>
    </form>
@endauth

</body>
</html>
