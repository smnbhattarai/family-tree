<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $pageTitle ?? config('app.name') }}</title>

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
<main class="mt-4">
    <div class="container-fluid">

        @if(session('success') || session('error') || session('info'))
            <section>
                <div class="row">
                    <div class="col-md-12">
                        @include('partials.alert')
                    </div>
                </div>
            </section>
        @endif

        @yield('main_content')

    </div>
</main>
<!--Main layout-->

@yield('footerScript')

@auth
    <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
        @csrf
        <button type="submit" class="btn btn-link text-light">Logout</button>
    </form>
@endauth

</body>
</html>
