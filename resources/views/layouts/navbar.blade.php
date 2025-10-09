<nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ config('app.url') . '/assets/images/logo.svg' }}" alt="{{ config('app.name') }}" width="30"
                 height="24" class="d-inline-block align-text-top">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleButton"
                aria-controls="navbarToggleButton" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggleButton">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('page.family') ? 'active' : '' }}"
                           href="{{ route('page.family') }}">{{ __('Explore Family') }}</a>
                    </li>
                @endauth
            </ul>

            <ul class="navbar-nav d-flex flex-row">
                @auth
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link {{ request()->routeIs('admin.family.create') ? 'active' : '' }}" href="{{ route('admin.family.create') }}">{{ __('Add Family') }}</a>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link {{ request()->routeIs('admin.family.index') ? 'active' : '' }}" href="{{ route('admin.family.index') }}">{{ __('Family List') }}</a>
                        </li>
                    @endif
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="javascript:void(0)"
                           onclick="document.getElementById('logout-form').submit()">{{ __('Logout') }}</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link {{ request()->routeIs('page.sign.in') ? 'active' : '' }}"
                           href="{{ route('page.sign.in') }}">{{ __('Login') }}</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
