<nav class="navbar ft-navbar navbar-expand-lg sticky-top" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ config('app.url') . '/assets/images/logo.svg' }}" alt="{{ config('app.name') }}">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleButton"
                aria-controls="navbarToggleButton" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggleButton">
            <ul class="navbar-nav me-auto my-2 my-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                       href="{{ route('home') }}"><i class="bi bi-house-heart"></i> {{ __('Home') }}</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('page.family') ? 'active' : '' }}"
                           href="{{ route('page.family') }}"><i class="bi bi-diagram-3"></i> {{ __('Explore') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('page.relationship') ? 'active' : '' }}"
                           href="{{ route('page.relationship') }}"><i class="bi bi-diagram-2"></i> {{ __('Relationship') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('page.birthdays') ? 'active' : '' }}"
                           href="{{ route('page.birthdays') }}"><i class="bi bi-cake2"></i> {{ __('Birthdays') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('page.search.family') ? 'active' : '' }}"
                           href="{{ route('page.search.family') }}"><i class="bi bi-search"></i> {{ __('Search') }}</a>
                    </li>
                @endauth
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">
                @auth
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.family.create') ? 'active' : '' }}" href="{{ route('admin.family.create') }}"><i class="bi bi-person-plus"></i> {{ __('Add') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.family.index') ? 'active' : '' }}" href="{{ route('admin.family.index') }}"><i class="bi bi-people"></i> {{ __('List') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.page.users') ? 'active' : '' }}" href="{{ route('admin.page.users') }}"><i class="bi bi-person-gear"></i> {{ __('Users') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link ft-nav-cta" href="javascript:void(0)"
                           onclick="document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}</a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link ft-nav-cta {{ request()->routeIs('page.sign.in') ? 'active' : '' }}"
                           href="{{ route('page.sign.in') }}"><i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
